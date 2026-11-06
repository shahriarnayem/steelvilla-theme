<?php
/**
 * Steel Villa Options Pages
 * Dedicated Contact Information page and Theme Settings page
 */

if (!defined('ABSPATH')) {
    exit;
}

// -------------------------------------------------------------
// Register Admin Menu & Submenus
// -------------------------------------------------------------
function steelvilla_register_admin_menus() {
    add_menu_page(
        __('Steel Villa Settings', 'steelvilla'),
        __('Steel Villa', 'steelvilla'),
        'manage_options',
        'steelvilla-settings',
        'steelvilla_render_theme_settings_page',
        'dashicons-building',
        30
    );

    add_submenu_page(
        'steelvilla-settings',
        __('Theme Settings', 'steelvilla'),
        __('Theme Settings', 'steelvilla'),
        'manage_options',
        'steelvilla-settings',
        'steelvilla_render_theme_settings_page'
    );

    add_submenu_page(
        'steelvilla-settings',
        __('Contact Information', 'steelvilla'),
        __('Contact Information', 'steelvilla'),
        'manage_options',
        'steelvilla-contact-info',
        'steelvilla_render_contact_info_page'
    );
}
add_action('admin_menu', 'steelvilla_register_admin_menus');

// -------------------------------------------------------------
// Register Settings via WordPress Settings API
// -------------------------------------------------------------
function steelvilla_register_custom_settings() {
    // Contact Info Options
    register_setting('steelvilla_contact_group', 'steelvilla_contact_options');

    // Theme Settings Options
    register_setting('steelvilla_theme_group', 'steelvilla_theme_options');
}
add_action('admin_init', 'steelvilla_register_custom_settings');

// -------------------------------------------------------------
// Helper: Get Contact Info with Default Fallback
// -------------------------------------------------------------
function steelvilla_get_contact($key, $default = '') {
    $defaults = array(
        'phone_1'      => '+8801721237381',
        'phone_2'      => '+8801712951990',
        'email'        => 'info@steelvillabd.com',
        'address'      => 'House 8/19, Sir Sayed Road, Mohammadpur, Dhaka-1207, Bangladesh',
        'whatsapp'     => '+8801721237381',
        'facebook'     => 'https://facebook.com',
        'youtube'      => 'https://youtube.com',
        'linkedin'     => 'https://linkedin.com',
        'maps_embed'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9024443907797!2d90.35824937589635!3d23.75085608875567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5160d77f27%3A0xc3c544837dc83446!2sSir%20Syed%20Rd%2C%20Dhaka%201207!5e0!3m2!1sen!2sbd!4v1714500000000!5m2!1sen!2sbd'
    );

    $options = get_option('steelvilla_contact_options', array());
    if (isset($options[$key]) && trim($options[$key]) !== '') {
        return $options[$key];
    }
    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

// -------------------------------------------------------------
// Helper: Get Theme Option with Default Fallback
// -------------------------------------------------------------
function steelvilla_get_option($key, $default = '') {
    $defaults = array(
        'tagline'        => 'Smartest Steel Building Company',
        'bio'            => 'At Steel Villa LTD, we specialize in delivering high-quality steel building solutions that combine durability, innovation, and precision across industrial and commercial sectors in Bangladesh.',
        'cta_text'       => 'Get a Free Quote',
        'cta_url'        => '',
        'stat_1_num'     => '15+',
        'stat_1_lbl'     => 'Years Experience',
        'stat_2_num'     => '120+',
        'stat_2_lbl'     => 'Completed Projects',
        'stat_3_num'     => '500k+',
        'stat_3_lbl'     => 'Square Feet Built',
        'stat_4_num'     => '100%',
        'stat_4_lbl'     => 'Client Satisfaction',
        'sister_name'    => 'General Steel Buildings',
        'sister_url'     => 'https://www.generalsteel.com.bd/',
        'copyright_text' => 'All rights reserved by Steelvilla.com.bd',
        'craft_text'     => 'Crafted with precision engineering by innopxnova.com'
    );

    $options = get_option('steelvilla_theme_options', array());
    if (isset($options[$key]) && trim($options[$key]) !== '') {
        return $options[$key];
    }
    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

// -------------------------------------------------------------
// Render Contact Info Page
// -------------------------------------------------------------
function steelvilla_render_contact_info_page() {
    $options = get_option('steelvilla_contact_options', array());
    ?>
    <div class="wrap" style="max-width: 900px;">
        <h1 style="display: flex; align-items: center; gap: 8px;">
            <span class="dashicons dashicons-phone" style="font-size: 28px; width: 28px; height: 28px;"></span>
            <?php _e('Steel Villa - Contact Information', 'steelvilla'); ?>
        </h1>
        <p><?php _e('Update your corporate phone lines, official email, physical office address, and social channels here. These update automatically across the site header, footer, and contact page.', 'steelvilla'); ?></p>
        <hr>

        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php settings_fields('steelvilla_contact_group'); ?>

            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="phone_1"><?php _e('Primary Phone', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[phone_1]" type="text" id="phone_1" value="<?php echo esc_attr(steelvilla_get_contact('phone_1')); ?>" class="regular-text">
                        <p class="description"><?php _e('e.g. +8801721237381', 'steelvilla'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone_2"><?php _e('Secondary Phone', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[phone_2]" type="text" id="phone_2" value="<?php echo esc_attr(steelvilla_get_contact('phone_2')); ?>" class="regular-text">
                        <p class="description"><?php _e('e.g. +8801712951990', 'steelvilla'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email"><?php _e('Official Email Address', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[email]" type="email" id="email" value="<?php echo esc_attr(steelvilla_get_contact('email')); ?>" class="regular-text">
                        <p class="description"><?php _e('e.g. info@steelvillabd.com', 'steelvilla'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="address"><?php _e('Physical Office Address', 'steelvilla'); ?></label></th>
                    <td>
                        <textarea name="steelvilla_contact_options[address]" id="address" rows="3" class="large-text"><?php echo esc_textarea(steelvilla_get_contact('address')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="whatsapp"><?php _e('WhatsApp Number / Link', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[whatsapp]" type="text" id="whatsapp" value="<?php echo esc_attr(steelvilla_get_contact('whatsapp')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="facebook"><?php _e('Facebook URL', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[facebook]" type="url" id="facebook" value="<?php echo esc_attr(steelvilla_get_contact('facebook')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="youtube"><?php _e('YouTube URL', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[youtube]" type="url" id="youtube" value="<?php echo esc_attr(steelvilla_get_contact('youtube')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="linkedin"><?php _e('LinkedIn URL', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_contact_options[linkedin]" type="url" id="linkedin" value="<?php echo esc_attr(steelvilla_get_contact('linkedin')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="maps_embed"><?php _e('Google Maps Embed URL', 'steelvilla'); ?></label></th>
                    <td>
                        <textarea name="steelvilla_contact_options[maps_embed]" id="maps_embed" rows="3" class="large-text"><?php echo esc_textarea(steelvilla_get_contact('maps_embed')); ?></textarea>
                        <p class="description"><?php _e('Paste the Google Maps iframe embed src URL.', 'steelvilla'); ?></p>
                    </td>
                </tr>
            </table>

            <?php submit_button(__('Save Contact Information', 'steelvilla')); ?>
        </form>
    </div>
    <?php
}

// -------------------------------------------------------------
// Render Theme Settings Page
// -------------------------------------------------------------
function steelvilla_render_theme_settings_page() {
    $options = get_option('steelvilla_theme_options', array());
    ?>
    <div class="wrap" style="max-width: 900px;">
        <h1 style="display: flex; align-items: center; gap: 8px;">
            <span class="dashicons dashicons-admin-generic" style="font-size: 28px; width: 28px; height: 28px;"></span>
            <?php _e('Steel Villa - Theme Settings', 'steelvilla'); ?>
        </h1>
        <p><?php _e('Configure global brand settings, statistics counter numbers, CTA banner links, and GitHub update preferences.', 'steelvilla'); ?></p>
        <hr>

        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php settings_fields('steelvilla_theme_group'); ?>

            <h2><?php _e('Brand & Tagline', 'steelvilla'); ?></h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="tagline"><?php _e('Company Tagline', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_theme_options[tagline]" type="text" id="tagline" value="<?php echo esc_attr(steelvilla_get_option('tagline')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="bio"><?php _e('Footer Corporate Bio', 'steelvilla'); ?></label></th>
                    <td>
                        <textarea name="steelvilla_theme_options[bio]" id="bio" rows="3" class="large-text"><?php echo esc_textarea(steelvilla_get_option('bio')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="cta_text"><?php _e('Header CTA Button Label', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_theme_options[cta_text]" type="text" id="cta_text" value="<?php echo esc_attr(steelvilla_get_option('cta_text')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="sister_name"><?php _e('Sister Company Name', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_theme_options[sister_name]" type="text" id="sister_name" value="<?php echo esc_attr(steelvilla_get_option('sister_name')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="sister_url"><?php _e('Sister Company URL', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_theme_options[sister_url]" type="url" id="sister_url" value="<?php echo esc_attr(steelvilla_get_option('sister_url')); ?>" class="regular-text">
                    </td>
                </tr>
            </table>

            <h2><?php _e('Statistics Counter Showcase', 'steelvilla'); ?></h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><?php _e('Counter 1', 'steelvilla'); ?></th>
                    <td>
                        <input name="steelvilla_theme_options[stat_1_num]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_1_num')); ?>" placeholder="15+" style="width: 100px;">
                        <input name="steelvilla_theme_options[stat_1_lbl]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_1_lbl')); ?>" placeholder="Years Experience" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Counter 2', 'steelvilla'); ?></th>
                    <td>
                        <input name="steelvilla_theme_options[stat_2_num]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_2_num')); ?>" placeholder="120+" style="width: 100px;">
                        <input name="steelvilla_theme_options[stat_2_lbl]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_2_lbl')); ?>" placeholder="Completed Projects" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Counter 3', 'steelvilla'); ?></th>
                    <td>
                        <input name="steelvilla_theme_options[stat_3_num]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_3_num')); ?>" placeholder="500k+" style="width: 100px;">
                        <input name="steelvilla_theme_options[stat_3_lbl]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_3_lbl')); ?>" placeholder="Square Feet Built" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Counter 4', 'steelvilla'); ?></th>
                    <td>
                        <input name="steelvilla_theme_options[stat_4_num]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_4_num')); ?>" placeholder="100%" style="width: 100px;">
                        <input name="steelvilla_theme_options[stat_4_lbl]" type="text" value="<?php echo esc_attr(steelvilla_get_option('stat_4_lbl')); ?>" placeholder="Client Satisfaction" class="regular-text">
                    </td>
                </tr>
            </table>

            <h2><?php _e('Footer & Legal', 'steelvilla'); ?></h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="copyright_text"><?php _e('Copyright Bar Text', 'steelvilla'); ?></label></th>
                    <td>
                        <input name="steelvilla_theme_options[copyright_text]" type="text" id="copyright_text" value="<?php echo esc_attr(steelvilla_get_option('copyright_text')); ?>" class="large-text">
                    </td>
                </tr>
            </table>

            <h2><?php _e('GitHub Theme Updates', 'steelvilla'); ?></h2>
            <p><?php _e('This theme connects directly to GitHub repository <code>https://github.com/shahriarnayem/steelvilla-theme</code> for instant updates.', 'steelvilla'); ?></p>
            <div style="background: #e7f5ea; border-left: 4px solid #46b450; padding: 12px 16px; margin: 10px 0;">
                <p style="margin: 0 0 6px;"><strong><?php _e('Installed Theme Version:', 'steelvilla'); ?></strong> <code><?php echo esc_html(defined('STEELVILLA_VERSION') ? STEELVILLA_VERSION : '1.0.1'); ?></code></p>
                <p style="margin: 0 0 6px;"><strong><?php _e('GitHub Updater Active:', 'steelvilla'); ?></strong> <?php _e('When you push a new release tag to GitHub, WordPress will show an "Update Available" notification and support automatic background updates.', 'steelvilla'); ?></p>
                <p style="margin: 8px 0 0;">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=steelvilla-settings&steelvilla_check_update=1')); ?>" class="button button-secondary">
                        <span class="dashicons dashicons-update" style="vertical-align: middle; margin-right: 4px;"></span>
                        <?php _e('Check for Updates Now', 'steelvilla'); ?>
                    </a>
                    <a href="<?php echo esc_url(admin_url('update-core.php')); ?>" class="button button-link" style="margin-left: 10px;">
                        <?php _e('Go to WordPress Updates Page', 'steelvilla'); ?> &rarr;
                    </a>
                </p>
            </div>

            <?php submit_button(__('Save Theme Settings', 'steelvilla')); ?>
        </form>
    </div>
    <?php
}
