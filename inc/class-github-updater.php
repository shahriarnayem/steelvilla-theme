<?php
/**
 * Steel Villa GitHub Theme Updater
 * 
 * Provides robust native WordPress updates from the public GitHub repository:
 * https://github.com/shahriarnayem/steelvilla-theme
 * 
 * Supports:
 * - One-click updates in Dashboard > Updates
 * - In-dashboard update notifications in Appearance > Themes
 * - Automatic background updates
 * - Direct Admin Notice when an update is detected
 */

if (!defined('ABSPATH')) {
    exit;
}

class SteelVilla_Theme_Updater {

    private $theme_slug;
    private $version;
    private $github_username;
    private $github_repo;
    private $github_api_url;

    public function __construct($theme_slug, $version, $github_username, $github_repo) {
        // Automatically adapt to the active stylesheet folder name
        $this->theme_slug      = get_stylesheet();
        $this->version         = wp_get_theme()->get('Version') ?: $version;
        $this->github_username = $github_username;
        $this->github_repo     = $github_repo;
        $this->github_api_url  = "https://api.github.com/repos/{$github_username}/{$github_repo}/releases/latest";

        // Hook into theme update transients
        add_filter('pre_set_site_transient_update_themes', array($this, 'inject_update_transient'));
        add_filter('site_transient_update_themes', array($this, 'inject_update_transient'));

        // Hook into theme details modal (View version details)
        add_filter('themes_api', array($this, 'theme_api_call'), 10, 3);

        // Rename extracted folder from GitHub zipball to match active theme slug
        add_filter('upgrader_source_selection', array($this, 'rename_github_zip_folder'), 10, 4);

        // Enable auto-updates support
        add_filter('auto_update_theme', array($this, 'maybe_auto_update'), 10, 2);

        // Admin notice when update is ready
        add_action('admin_notices', array($this, 'show_admin_update_notice'));

        // Force check on Dashboard > Updates or Themes page
        add_action('load-update-core.php', array($this, 'clear_release_cache'));
        add_action('load-themes.php', array($this, 'maybe_clear_release_cache'));
    }

    public function clear_release_cache() {
        delete_transient('steelvilla_gh_latest_release');
    }

    public function maybe_clear_release_cache() {
        if (!empty($_GET['steelvilla_check_update']) || !empty($_GET['force-check'])) {
            delete_transient('steelvilla_gh_latest_release');
        }
    }

    /**
     * Fetch latest release information from GitHub API
     */
    public function get_latest_release() {
        $transient_key = 'steelvilla_gh_latest_release';

        if (!empty($_GET['force-check']) || !empty($_GET['steelvilla_check_update'])) {
            delete_transient($transient_key);
        }

        $cached = get_transient($transient_key);
        if ($cached !== false) {
            return $cached;
        }

        $args = array(
            'headers' => array(
                'Accept'     => 'application/vnd.github.v3+json',
                'User-Agent' => 'WordPress-SteelVilla-Theme-Updater'
            ),
            'timeout' => 15
        );

        $response = wp_remote_get($this->github_api_url, $args);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (!empty($data) && isset($data['tag_name'])) {
            // Cache for 2 hours
            set_transient($transient_key, $data, 2 * HOUR_IN_SECONDS);
            return $data;
        }

        return false;
    }

    /**
     * Inject update data into WordPress update_themes transient
     */
    public function inject_update_transient($transient) {
        if (!is_object($transient)) {
            $transient = new stdClass();
        }
        if (!isset($transient->response)) {
            $transient->response = array();
        }

        $release = $this->get_latest_release();
        if (!$release) {
            return $transient;
        }

        // Clean version tag: v1.0.2 -> 1.0.2
        $new_version = ltrim($release['tag_name'], 'v');
        $current_ver = wp_get_theme($this->theme_slug)->get('Version') ?: $this->version;

        if (version_compare($current_ver, $new_version, '<')) {
            // Prefer direct release asset steelvilla-theme.zip if present
            $package = $release['zipball_url'];
            if (!empty($release['assets']) && is_array($release['assets'])) {
                foreach ($release['assets'] as $asset) {
                    if (strpos($asset['name'], '.zip') !== false) {
                        $package = $asset['browser_download_url'];
                        break;
                    }
                }
            }

            $update_data = array(
                'theme'        => $this->theme_slug,
                'new_version'  => $new_version,
                'url'          => $release['html_url'],
                'package'      => $package,
                'requires'     => '6.0',
                'requires_php' => '7.4'
            );

            // Register in both active slug and fallback slug
            $transient->response[$this->theme_slug] = $update_data;
            if ($this->theme_slug !== 'steelvilla-theme') {
                $transient->response['steelvilla-theme'] = $update_data;
            }

            // Remove from no_update list if present
            if (isset($transient->no_update[$this->theme_slug])) {
                unset($transient->no_update[$this->theme_slug]);
            }
        }

        return $transient;
    }

    /**
     * Provide theme information for WordPress modal popup
     */
    public function theme_api_call($result, $action, $args) {
        if ($action !== 'theme_information' || !isset($args->slug)) {
            return $result;
        }
        if ($args->slug !== $this->theme_slug && $args->slug !== 'steelvilla-theme') {
            return $result;
        }

        $release = $this->get_latest_release();
        if (!$release) {
            return $result;
        }

        $new_version = ltrim($release['tag_name'], 'v');

        return (object) array(
            'name'          => 'Steel Villa',
            'slug'          => $this->theme_slug,
            'version'       => $new_version,
            'author'        => '<a href="https://steelvilla.com.bd/">Steel Villa LTD</a>',
            'preview_url'   => 'https://steelvilla.com.bd/',
            'requires'      => '6.0',
            'requires_php'  => '7.4',
            'download_link' => $release['zipball_url'],
            'sections'      => array(
                'description' => 'Premier Pre-Engineered Steel Building (PEB) & Industrial Civil Construction WordPress Theme for Steel Villa LTD.',
                'changelog'   => nl2br(esc_html($release['body'] ?? 'Performance improvements and bug fixes.'))
            )
        );
    }

    /**
     * Fix extracted folder name from GitHub zipball
     */
    public function rename_github_zip_folder($source, $remote_source, $upgrader, $hook_extra = null) {
        global $wp_filesystem;

        if (isset($hook_extra['theme']) && ($hook_extra['theme'] === $this->theme_slug || $hook_extra['theme'] === 'steelvilla-theme')) {
            $correct_destination = trailingslashit($remote_source) . $this->theme_slug;
            if ($source !== $correct_destination) {
                $wp_filesystem->move($source, $correct_destination);
                return $correct_destination;
            }
        }

        return $source;
    }

    /**
     * Respect WordPress auto-update setting
     */
    public function maybe_auto_update($update, $item) {
        if (isset($item->theme) && ($item->theme === $this->theme_slug || $item->theme === 'steelvilla-theme')) {
            return true;
        }
        return $update;
    }

    /**
     * Show prominent admin notice when an update is available
     */
    public function show_admin_update_notice() {
        if (!current_user_can('update_themes')) {
            return;
        }

        $release = $this->get_latest_release();
        if (!$release || empty($release['tag_name'])) {
            return;
        }

        $new_version = ltrim($release['tag_name'], 'v');
        $current_ver = wp_get_theme($this->theme_slug)->get('Version') ?: $this->version;

        if (version_compare($current_ver, $new_version, '<')) {
            $update_url = wp_nonce_url(
                admin_url('update.php?action=upgrade-theme&theme=' . urlencode($this->theme_slug)),
                'upgrade-theme_' . $this->theme_slug
            );
            ?>
            <div class="notice notice-warning is-dismissible" style="border-left-color: #B27638;">
                <p>
                    <strong><?php _e('Steel Villa Theme Update Available:', 'steelvilla'); ?></strong> 
                    <?php printf(__('Version %s is available (you are running %s).', 'steelvilla'), esc_html($new_version), esc_html($current_ver)); ?>
                    <a href="<?php echo esc_url($update_url); ?>" class="button button-primary" style="margin-left: 10px; background-color: #B27638; border-color: #966028;">
                        <?php _e('Update Now', 'steelvilla'); ?>
                    </a>
                    <a href="<?php echo esc_url(admin_url('update-core.php')); ?>" class="button button-secondary" style="margin-left: 5px;">
                        <?php _e('View Dashboard Updates', 'steelvilla'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }
}
