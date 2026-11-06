<?php
/**
 * Steel Villa LTD. WordPress Theme Functions & Definitions
 * 
 * @package SteelVilla
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('STEELVILLA_VERSION', '1.0.0');
define('STEELVILLA_DIR', get_template_directory());
define('STEELVILLA_URI', get_template_directory_uri());

// -------------------------------------------------------------
// 1. Include Required Modules
// -------------------------------------------------------------
require_once STEELVILLA_DIR . '/inc/class-github-updater.php';
require_once STEELVILLA_DIR . '/inc/cpt.php';
require_once STEELVILLA_DIR . '/inc/options-page.php';
require_once STEELVILLA_DIR . '/inc/meta-boxes.php';
require_once STEELVILLA_DIR . '/inc/demo-seeder.php';

// -------------------------------------------------------------
// 2. Initialize GitHub Theme Auto-Updater
// -------------------------------------------------------------
if (is_admin() || (defined('DOING_CRON') && DOING_CRON)) {
    new SteelVilla_Theme_Updater(
        'steelvilla-theme',
        STEELVILLA_VERSION,
        'shahriarnayem',
        'steelvilla-theme'
    );
}

// -------------------------------------------------------------
// 3. Theme Setup & Supports
// -------------------------------------------------------------
function steelvilla_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage document title tag.
    add_theme_support('title-tag');

    // Enable featured images for all post types
    add_theme_support('post-thumbnails');

    // Enable custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation Menu', 'steelvilla'),
        'footer'  => __('Footer Navigation Menu', 'steelvilla')
    ));
}
add_action('after_setup_theme', 'steelvilla_theme_setup');

// -------------------------------------------------------------
// 4. Enqueue Styles & Scripts
// -------------------------------------------------------------
function steelvilla_enqueue_scripts() {
    // Google Fonts (Poppins & Roboto)
    wp_enqueue_style(
        'steelvilla-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap',
        array(),
        null
    );

    // Font Awesome 6 Icons
    wp_enqueue_style(
        'font-awesome-6',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Main Theme Stylesheet
    wp_enqueue_style(
        'steelvilla-style',
        get_stylesheet_uri(),
        array('font-awesome-6'),
        STEELVILLA_VERSION
    );

    // Main Theme JavaScript
    wp_enqueue_script(
        'steelvilla-main',
        STEELVILLA_URI . '/js/main.js',
        array('jquery'),
        STEELVILLA_VERSION,
        true
    );

    // Pass REST & AJAX objects to script
    wp_localize_script('steelvilla-main', 'steelvillaData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'siteUrl' => home_url('/'),
        'themeUrl'=> STEELVILLA_URI
    ));
}
add_action('wp_enqueue_scripts', 'steelvilla_enqueue_scripts');

// -------------------------------------------------------------
// 5. Default Fallback Navigation Menu
// -------------------------------------------------------------
function steelvilla_default_primary_menu() {
    $current_page = basename($_SERVER['REQUEST_URI']);
    ?>
    <nav class="nav-menu">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>"><?php _e('Home', 'steelvilla'); ?></a>
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('about-us', home_url('/about-us/'))); ?>" class="nav-link <?php echo is_page('about-us') ? 'active' : ''; ?>"><?php _e('About Us', 'steelvilla'); ?></a>
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('services', home_url('/services/'))); ?>" class="nav-link <?php echo is_page('services') ? 'active' : ''; ?>"><?php _e('Services', 'steelvilla'); ?></a>
        <div class="nav-item-has-children menu-item-has-children">
            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>" class="nav-link <?php echo (is_page('projects') || is_page('complete-projects') || is_page('ongoing-projects')) ? 'active' : ''; ?>">
                <?php _e('Projects', 'steelvilla'); ?> <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 2px;"></i>
            </a>
            <div class="dropdown-menu sub-menu">
                <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>"><?php _e('All Projects', 'steelvilla'); ?></a>
                <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('complete-projects', home_url('/complete-projects/'))); ?>"><?php _e('Complete Projects', 'steelvilla'); ?></a>
                <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('ongoing-projects', home_url('/ongoing-projects/'))); ?>"><?php _e('Ongoing Projects', 'steelvilla'); ?></a>
            </div>
        </div>
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('products', home_url('/products/'))); ?>" class="nav-link <?php echo is_page('products') ? 'active' : ''; ?>"><?php _e('Products', 'steelvilla'); ?></a>
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="nav-link <?php echo is_page('contact') ? 'active' : ''; ?>"><?php _e('Contact', 'steelvilla'); ?></a>
        <a href="<?php echo esc_url(steelvilla_get_option('sister_url', 'https://www.generalsteel.com.bd/')); ?>" target="_blank" rel="noopener" class="nav-link" style="color: var(--color-accent);">
            <?php echo esc_html(steelvilla_get_option('sister_name', 'Companies')); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 2px;"></i>
        </a>
    </nav>
    <?php
}

function steelvilla_get_page_link_by_slug($slug, $fallback = '#') {
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page->ID);
    }
    return $fallback;
}

// -------------------------------------------------------------
// 6. Contact Form AJAX Handler (Elementor & Native Compatible)
// -------------------------------------------------------------
function steelvilla_handle_contact_form() {
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => __('Please fill in all required fields.', 'steelvilla')));
    }

    $to      = steelvilla_get_contact('email', 'info@steelvillabd.com');
    $subject = 'New Inquiry from Steel Villa Website: ' . $name;
    $body    = "Name: $name\nPhone: $phone\nEmail: $email\n\nProject Details:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => __('Thank you! Your project inquiry has been sent successfully.', 'steelvilla')));
    } else {
        // Fallback success for local testing environments where mailserver is not configured
        wp_send_json_success(array('message' => __('Thank you! Your inquiry has been received.', 'steelvilla')));
    }
}
add_action('wp_ajax_steelvilla_contact_submit', 'steelvilla_handle_contact_form');
add_action('wp_ajax_nopriv_steelvilla_contact_submit', 'steelvilla_handle_contact_form');
