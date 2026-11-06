<?php
/**
 * Steel Villa GitHub Theme Updater
 * 
 * Provides seamless WordPress native updates from the public GitHub repository:
 * https://github.com/shahriarnayem/steelvilla-theme
 * 
 * Supports both manual "Update Now" clicks in Dashboard > Updates and
 * WordPress automatic background updates.
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
        $this->theme_slug      = $theme_slug;
        $this->version         = $version;
        $this->github_username = $github_username;
        $this->github_repo     = $github_repo;
        $this->github_api_url  = "https://api.github.com/repos/{$github_username}/{$github_repo}/releases/latest";

        // Hook into theme update transients
        add_filter('pre_set_site_transient_update_themes', array($this, 'check_for_update'));
        add_filter('site_transient_update_themes', array($this, 'check_for_update'));

        // Hook into theme details modal (View version details)
        add_filter('themes_api', array($this, 'theme_api_call'), 10, 3);

        // Rename extracted folder from GitHub zipball to match theme slug
        add_filter('upgrader_source_selection', array($this, 'rename_github_zip_folder'), 10, 4);

        // Enable auto-updates support
        add_filter('auto_update_theme', array($this, 'maybe_auto_update'), 10, 2);
    }

    /**
     * Fetch latest release information from GitHub API
     */
    private function get_latest_release() {
        $transient_key = 'steelvilla_gh_latest_release';

        // Invalidate cache on manual check in Dashboard > Updates or admin
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
            'timeout' => 10
        );

        $response = wp_remote_get($this->github_api_url, $args);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (!empty($data) && isset($data['tag_name'])) {
            // Cache for 6 hours
            set_transient($transient_key, $data, 6 * HOUR_IN_SECONDS);
            return $data;
        }

        return false;
    }

    /**
     * Check GitHub for a new version and inject into update transients
     */
    public function check_for_update($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }

        $release = $this->get_latest_release();
        if (!$release) {
            return $transient;
        }

        // Clean version tag (strip 'v' prefix if present: v1.0.1 -> 1.0.1)
        $new_version = ltrim($release['tag_name'], 'v');

        if (version_compare($this->version, $new_version, '<')) {
            // Determine zipball package url
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

            $transient->response[$this->theme_slug] = $update_data;
        }

        return $transient;
    }

    /**
     * Provide theme information for WordPress modal popup
     */
    public function theme_api_call($result, $action, $args) {
        if ($action !== 'theme_information' || !isset($args->slug) || $args->slug !== $this->theme_slug) {
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
                'changelog'   => nl2br(esc_html($release['body'] ?? 'Performance improvements and fixes.'))
            )
        );
    }

    /**
     * Fix extracted folder name from GitHub zipball
     * GitHub names extracted folders like "shahriarnayem-steelvilla-theme-98abc12"
     * WordPress requires it to match theme slug "steelvilla-theme"
     */
    public function rename_github_zip_folder($source, $remote_source, $upgrader, $hook_extra = null) {
        global $wp_filesystem;

        if (isset($hook_extra['theme']) && $hook_extra['theme'] === $this->theme_slug) {
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
        if (isset($item->theme) && $item->theme === $this->theme_slug) {
            $auto_update_enabled = get_theme_mod('steelvilla_auto_update', true);
            if ($auto_update_enabled) {
                return true;
            }
        }
        return $update;
    }
}
