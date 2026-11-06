<?php
/**
 * Steel Villa Custom Meta Boxes for Pages & Custom Post Types
 * Dynamic template fields that show/hide based on the selected Page Template
 */

if (!defined('ABSPATH')) {
    exit;
}

// -------------------------------------------------------------
// Register Meta Boxes
// -------------------------------------------------------------
function steelvilla_add_meta_boxes() {
    // Page Template Meta Boxes
    add_meta_box(
        'steelvilla_page_template_meta',
        __('Page Template Custom Content', 'steelvilla'),
        'steelvilla_render_page_template_meta_box',
        'page',
        'normal',
        'high'
    );

    // Project Details Meta Box
    add_meta_box(
        'steelvilla_project_meta',
        __('Project Details & Gallery', 'steelvilla'),
        'steelvilla_render_project_meta_box',
        'project',
        'normal',
        'high'
    );

    // Service Details Meta Box
    add_meta_box(
        'steelvilla_service_meta',
        __('Service Icon & Highlights', 'steelvilla'),
        'steelvilla_render_service_meta_box',
        'service',
        'side',
        'default'
    );

    // Product Details Meta Box
    add_meta_box(
        'steelvilla_product_meta',
        __('Product Specifications', 'steelvilla'),
        'steelvilla_render_product_meta_box',
        'product',
        'normal',
        'high'
    );

    // Hero Slide Tagline Meta Box
    add_meta_box(
        'steelvilla_hero_meta',
        __('Hero Slide Tagline', 'steelvilla'),
        'steelvilla_render_hero_meta_box',
        'hero',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'steelvilla_add_meta_boxes');

// -------------------------------------------------------------
// Render Page Template Meta Box (With JS show/hide by template)
// -------------------------------------------------------------
function steelvilla_render_page_template_meta_box($post) {
    wp_nonce_field('steelvilla_save_meta_nonce', 'steelvilla_meta_nonce');

    // Retrieve saved meta
    $meta = get_post_meta($post->ID, '_steelvilla_page_meta', true);
    if (!is_array($meta)) $meta = array();

    // Default values
    $about_subtitle = $meta['about_subtitle'] ?? 'Building the Future with Strength and Precision';
    $about_story_1  = $meta['about_story_1'] ?? 'Steel Villa LTD. is a premier structural engineering and Pre-Engineered Steel Building (PEB) construction firm established in Bangladesh. With comprehensive in-house design, cutting-edge fabrication facilities, and certified civil erection capabilities, we engineer industrial spaces that endure.';
    $about_story_2  = $meta['about_story_2'] ?? 'From sprawling industrial warehouses and heavy manufacturing factories to complex multi-storey commercial complexes, our expert engineers adhere to international BNBC, AISC, and AWS welding standards.';
    $about_mission  = $meta['about_mission'] ?? 'Built to Last. Designed to Lead. We deliver uncompromised structural engineering solutions that empower Bangladeshi industries to thrive with safety, sustainability, and technological precision.';
    $about_vision   = $meta['about_vision'] ?? 'To be the most trusted, innovative, and sustainable Pre-Engineered Steel Building and civil construction powerhouse in South Asia.';

    $exec_1_name = $meta['exec_1_name'] ?? 'Md Arif Hossain';
    $exec_1_role = $meta['exec_1_role'] ?? 'Chairman';
    $exec_1_img  = $meta['exec_1_img'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600&auto=format&fit=crop';

    $exec_2_name = $meta['exec_2_name'] ?? 'Md Tufique';
    $exec_2_role = $meta['exec_2_role'] ?? 'Managing Director';
    $exec_2_img  = $meta['exec_2_img'] ?? 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=600&auto=format&fit=crop';

    $exec_3_name = $meta['exec_3_name'] ?? 'Md Mamun';
    $exec_3_role = $meta['exec_3_role'] ?? 'Director';
    $exec_3_img  = $meta['exec_3_img'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop';

    $home_welcome_title = $meta['home_welcome_title'] ?? 'Welcome to Steel Villa';
    $home_welcome_sub   = $meta['home_welcome_sub'] ?? 'Your Trusted Partner in Pre-Engineered Steel Buildings and Civil Construction';
    $home_welcome_desc  = $meta['home_welcome_desc'] ?? 'With over 15 years of industry excellence, Steel Villa LTD. stands as an innovator in industrial steel structures. Our integrated engineering approach seamlessly combines architectural design, structural analysis, modern fabrication, and turnkey on-site assembly.';

    $contact_title = $meta['contact_title'] ?? 'Let’s Build Something Extraordinary Together';
    $contact_desc  = $meta['contact_desc'] ?? 'Have an industrial or commercial project in mind? Our certified structural engineering team is available for comprehensive technical consultations and transparent cost estimates.';
    ?>

    <!-- ABOUT US FIELDS -->
    <div id="meta-section-about" class="steelvilla-template-fields" style="display:none; padding: 10px 0;">
        <h3 style="border-bottom: 2px solid #B27638; padding-bottom: 6px;"><?php _e('About Us Content Settings', 'steelvilla'); ?></h3>
        <p>
            <label><strong><?php _e('Hero Subtitle / Tagline:', 'steelvilla'); ?></strong></label><br>
            <input type="text" name="steelvilla_page_meta[about_subtitle]" value="<?php echo esc_attr($about_subtitle); ?>" class="large-text">
        </p>
        <p>
            <label><strong><?php _e('Company Story - Paragraph 1:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[about_story_1]" rows="3" class="large-text"><?php echo esc_textarea($about_story_1); ?></textarea>
        </p>
        <p>
            <label><strong><?php _e('Company Story - Paragraph 2:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[about_story_2]" rows="3" class="large-text"><?php echo esc_textarea($about_story_2); ?></textarea>
        </p>
        <p>
            <label><strong><?php _e('Mission Statement:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[about_mission]" rows="2" class="large-text"><?php echo esc_textarea($about_mission); ?></textarea>
        </p>
        <p>
            <label><strong><?php _e('Vision Statement:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[about_vision]" rows="2" class="large-text"><?php echo esc_textarea($about_vision); ?></textarea>
        </p>

        <h4><?php _e('Executive Leadership Team', 'steelvilla'); ?></h4>
        <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
            <div style="background: #f8f9fa; padding: 12px; border: 1px solid #ddd; border-radius: 4px;">
                <strong>Leader 1:</strong><br>
                <input type="text" name="steelvilla_page_meta[exec_1_name]" value="<?php echo esc_attr($exec_1_name); ?>" placeholder="Name" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_1_role]" value="<?php echo esc_attr($exec_1_role); ?>" placeholder="Role" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_1_img]" value="<?php echo esc_attr($exec_1_img); ?>" placeholder="Photo URL" style="width:100%;">
            </div>
            <div style="background: #f8f9fa; padding: 12px; border: 1px solid #ddd; border-radius: 4px;">
                <strong>Leader 2:</strong><br>
                <input type="text" name="steelvilla_page_meta[exec_2_name]" value="<?php echo esc_attr($exec_2_name); ?>" placeholder="Name" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_2_role]" value="<?php echo esc_attr($exec_2_role); ?>" placeholder="Role" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_2_img]" value="<?php echo esc_attr($exec_2_img); ?>" placeholder="Photo URL" style="width:100%;">
            </div>
            <div style="background: #f8f9fa; padding: 12px; border: 1px solid #ddd; border-radius: 4px;">
                <strong>Leader 3:</strong><br>
                <input type="text" name="steelvilla_page_meta[exec_3_name]" value="<?php echo esc_attr($exec_3_name); ?>" placeholder="Name" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_3_role]" value="<?php echo esc_attr($exec_3_role); ?>" placeholder="Role" style="width:100%; margin-bottom:5px;">
                <input type="text" name="steelvilla_page_meta[exec_3_img]" value="<?php echo esc_attr($exec_3_img); ?>" placeholder="Photo URL" style="width:100%;">
            </div>
        </div>
    </div>

    <!-- HOME PAGE FIELDS -->
    <div id="meta-section-home" class="steelvilla-template-fields" style="display:none; padding: 10px 0;">
        <h3 style="border-bottom: 2px solid #B27638; padding-bottom: 6px;"><?php _e('Home Page Welcome Section', 'steelvilla'); ?></h3>
        <p>
            <label><strong><?php _e('Welcome Title:', 'steelvilla'); ?></strong></label><br>
            <input type="text" name="steelvilla_page_meta[home_welcome_title]" value="<?php echo esc_attr($home_welcome_title); ?>" class="large-text">
        </p>
        <p>
            <label><strong><?php _e('Welcome Subtitle:', 'steelvilla'); ?></strong></label><br>
            <input type="text" name="steelvilla_page_meta[home_welcome_sub]" value="<?php echo esc_attr($home_welcome_sub); ?>" class="large-text">
        </p>
        <p>
            <label><strong><?php _e('Welcome Story Description:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[home_welcome_desc]" rows="3" class="large-text"><?php echo esc_textarea($home_welcome_desc); ?></textarea>
        </p>
    </div>

    <!-- CONTACT PAGE FIELDS -->
    <div id="meta-section-contact" class="steelvilla-template-fields" style="display:none; padding: 10px 0;">
        <h3 style="border-bottom: 2px solid #B27638; padding-bottom: 6px;"><?php _e('Contact Page Header Banner', 'steelvilla'); ?></h3>
        <p>
            <label><strong><?php _e('Contact Heading:', 'steelvilla'); ?></strong></label><br>
            <input type="text" name="steelvilla_page_meta[contact_title]" value="<?php echo esc_attr($contact_title); ?>" class="large-text">
        </p>
        <p>
            <label><strong><?php _e('Contact Subtitle / Description:', 'steelvilla'); ?></strong></label><br>
            <textarea name="steelvilla_page_meta[contact_desc]" rows="2" class="large-text"><?php echo esc_textarea($contact_desc); ?></textarea>
        </p>
    </div>

    <div id="meta-section-default" class="steelvilla-template-fields" style="color: #666; font-style: italic;">
        <?php _e('Select a Page Template (About Us, Services, Contact, etc.) from the Page Attributes box to display its editable content fields.', 'steelvilla'); ?>
    </div>

    <script>
    (function($) {
        function checkTemplate() {
            var template = $('#page_template').val() || $('select[name="page_template"]').val() || '';
            $('.steelvilla-template-fields').hide();

            if (template === 'template-about.php') {
                $('#meta-section-about').show();
            } else if (template === 'template-contact.php') {
                $('#meta-section-contact').show();
            } else if (template === 'front-page.php' || template === 'template-home.php' || $('body').hasClass('page-template-front-page')) {
                $('#meta-section-home').show();
            } else {
                $('#meta-section-default').show();
            }
        }
        $(document).ready(checkTemplate);
        $(document).on('change', '#page_template, select[name="page_template"]', checkTemplate);
    })(jQuery);
    </script>
    <?php
}

// -------------------------------------------------------------
// Render Project Meta Box (Client, Location, Lightbox Gallery)
// -------------------------------------------------------------
function steelvilla_render_project_meta_box($post) {
    wp_nonce_field('steelvilla_save_meta_nonce', 'steelvilla_meta_nonce');

    $client   = get_post_meta($post->ID, '_steelvilla_project_client', true);
    $location = get_post_meta($post->ID, '_steelvilla_project_location', true);
    $gallery  = get_post_meta($post->ID, '_steelvilla_project_gallery', true);
    ?>
    <p>
        <label><strong><?php _e('Client Name:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_project_client" value="<?php echo esc_attr($client); ?>" placeholder="e.g. Spain Bangla Agro Industries Ltd" class="large-text">
    </p>
    <p>
        <label><strong><?php _e('Project Location / Site:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_project_location" value="<?php echo esc_attr($location); ?>" placeholder="e.g. Sunamgonj, Bangladesh" class="large-text">
    </p>
    <p>
        <label><strong><?php _e('Interactive Lightbox Gallery Images (URLs, one per line):', 'steelvilla'); ?></strong></label><br>
        <textarea name="steelvilla_project_gallery" rows="4" class="large-text" placeholder="https://example.com/img1.jpg&#10;https://example.com/img2.jpg"><?php echo esc_textarea($gallery); ?></textarea>
        <span class="description"><?php _e('These images will be displayed in the minimal lightbox gallery popup when this project is clicked.', 'steelvilla'); ?></span>
    </p>
    <?php
}

// -------------------------------------------------------------
// Render Service Meta Box (Font Awesome Icon)
// -------------------------------------------------------------
function steelvilla_render_service_meta_box($post) {
    wp_nonce_field('steelvilla_save_meta_nonce', 'steelvilla_meta_nonce');

    $icon = get_post_meta($post->ID, '_steelvilla_service_icon', true);
    if (!$icon) $icon = 'fa-solid fa-industry';
    ?>
    <p>
        <label><strong><?php _e('Font Awesome Icon Class:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_service_icon" value="<?php echo esc_attr($icon); ?>" style="width: 100%;">
        <span class="description"><?php _e('e.g. fa-solid fa-drafting-compass, fa-solid fa-industry, fa-solid fa-building-wheat', 'steelvilla'); ?></span>
    </p>
    <?php
}

// -------------------------------------------------------------
// Render Product Meta Box (Grade, Specs)
// -------------------------------------------------------------
function steelvilla_render_product_meta_box($post) {
    wp_nonce_field('steelvilla_save_meta_nonce', 'steelvilla_meta_nonce');

    $grade    = get_post_meta($post->ID, '_steelvilla_product_grade', true);
    $standard = get_post_meta($post->ID, '_steelvilla_product_standard', true);
    $specs    = get_post_meta($post->ID, '_steelvilla_product_specs', true);
    ?>
    <p>
        <label><strong><?php _e('Steel Grade:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_product_grade" value="<?php echo esc_attr($grade); ?>" placeholder="e.g. Q235B, Q345B, SS304" class="regular-text">
    </p>
    <p>
        <label><strong><?php _e('Manufacturing Standard:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_product_standard" value="<?php echo esc_attr($standard); ?>" placeholder="e.g. ASTM A36, JIS G3101, EN 10025" class="regular-text">
    </p>
    <p>
        <label><strong><?php _e('Technical Specifications / Specs Notes:', 'steelvilla'); ?></strong></label><br>
        <textarea name="steelvilla_product_specs" rows="3" class="large-text"><?php echo esc_textarea($specs); ?></textarea>
    </p>
    <?php
}

// -------------------------------------------------------------
// Render Hero Meta Box (Slide Tagline)
// -------------------------------------------------------------
function steelvilla_render_hero_meta_box($post) {
    wp_nonce_field('steelvilla_save_meta_nonce', 'steelvilla_meta_nonce');

    $tagline = get_post_meta($post->ID, '_steelvilla_hero_tagline', true);
    ?>
    <p>
        <label><strong><?php _e('Slide Tagline / Badge:', 'steelvilla'); ?></strong></label><br>
        <input type="text" name="steelvilla_hero_tagline" value="<?php echo esc_attr($tagline); ?>" placeholder="e.g. Certified PEB Engineering" style="width:100%;">
    </p>
    <?php
}

// -------------------------------------------------------------
// Save Meta Data
// -------------------------------------------------------------
function steelvilla_save_meta_boxes($post_id) {
    if (!isset($_POST['steelvilla_meta_nonce']) || !wp_verify_nonce($_POST['steelvilla_meta_nonce'], 'steelvilla_save_meta_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Page Template Meta
    if (isset($_POST['steelvilla_page_meta']) && is_array($_POST['steelvilla_page_meta'])) {
        $clean_meta = array_map('sanitize_text_field', $_POST['steelvilla_page_meta']);
        update_post_meta($post_id, '_steelvilla_page_meta', $clean_meta);
    }

    // Project Meta
    if (isset($_POST['steelvilla_project_client'])) {
        update_post_meta($post_id, '_steelvilla_project_client', sanitize_text_field($_POST['steelvilla_project_client']));
    }
    if (isset($_POST['steelvilla_project_location'])) {
        update_post_meta($post_id, '_steelvilla_project_location', sanitize_text_field($_POST['steelvilla_project_location']));
    }
    if (isset($_POST['steelvilla_project_gallery'])) {
        update_post_meta($post_id, '_steelvilla_project_gallery', sanitize_textarea_field($_POST['steelvilla_project_gallery']));
    }

    // Service Meta
    if (isset($_POST['steelvilla_service_icon'])) {
        update_post_meta($post_id, '_steelvilla_service_icon', sanitize_text_field($_POST['steelvilla_service_icon']));
    }

    // Product Meta
    if (isset($_POST['steelvilla_product_grade'])) {
        update_post_meta($post_id, '_steelvilla_product_grade', sanitize_text_field($_POST['steelvilla_product_grade']));
    }
    if (isset($_POST['steelvilla_product_standard'])) {
        update_post_meta($post_id, '_steelvilla_product_standard', sanitize_text_field($_POST['steelvilla_product_standard']));
    }
    if (isset($_POST['steelvilla_product_specs'])) {
        update_post_meta($post_id, '_steelvilla_product_specs', sanitize_textarea_field($_POST['steelvilla_product_specs']));
    }

    // Hero Meta
    if (isset($_POST['steelvilla_hero_tagline'])) {
        update_post_meta($post_id, '_steelvilla_hero_tagline', sanitize_text_field($_POST['steelvilla_hero_tagline']));
    }
}
add_action('save_post', 'steelvilla_save_meta_boxes');
