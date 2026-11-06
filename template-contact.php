<?php
/**
 * Template Name: Contact Us
 * 
 * Steel Villa Contact Us Template
 */

get_header();

$page_meta = get_post_meta(get_the_ID(), '_steelvilla_page_meta', true);
if (!is_array($page_meta)) $page_meta = array();

$contact_title = $page_meta['contact_title'] ?? 'Let’s Build Something Extraordinary Together';
$contact_desc  = $page_meta['contact_desc'] ?? 'Have an industrial or commercial project in mind? Our certified structural engineering team is available for comprehensive technical consultations and transparent cost estimates.';

$phone1 = steelvilla_get_contact('phone_1');
$phone2 = steelvilla_get_contact('phone_2');
$email  = steelvilla_get_contact('email');
$addr   = steelvilla_get_contact('address');
$maps   = steelvilla_get_contact('maps_embed');
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html($contact_desc); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="section">
    <div class="container">
      <div class="contact-grid">
        <!-- Contact Information Cards -->
        <div>
          <span class="badge badge-accent" style="margin-bottom: 0.75rem;"><?php _e('Get in Touch', 'steelvilla'); ?></span>
          <h2><?php echo esc_html($contact_title); ?></h2>
          <p style="margin-bottom: 2rem;"><?php echo esc_html($contact_desc); ?></p>

          <div class="contact-info-card">
            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
            <div>
              <h4 style="margin-bottom: 0.25rem;"><?php _e('Direct Phone Lines', 'steelvilla'); ?></h4>
              <p style="margin: 0;">
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" style="color: var(--color-primary); font-weight: 500;"><?php echo esc_html($phone1); ?></a>
                <?php if ($phone2) : ?>
                  <br><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone2)); ?>" style="color: var(--color-primary); font-weight: 500;"><?php echo esc_html($phone2); ?></a>
                <?php endif; ?>
              </p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <div>
              <h4 style="margin-bottom: 0.25rem;"><?php _e('Corporate Email', 'steelvilla'); ?></h4>
              <p style="margin: 0;">
                <a href="mailto:<?php echo esc_attr($email); ?>" style="color: var(--color-primary); font-weight: 500;"><?php echo esc_html($email); ?></a>
              </p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <h4 style="margin-bottom: 0.25rem;"><?php _e('Corporate Office', 'steelvilla'); ?></h4>
              <p style="margin: 0; color: var(--color-primary); font-weight: 500;">
                <?php echo esc_html($addr); ?>
              </p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="contact-icon"><i class="fa-solid fa-clock"></i></div>
            <div>
              <h4 style="margin-bottom: 0.25rem;"><?php _e('Working Hours', 'steelvilla'); ?></h4>
              <p style="margin: 0; color: var(--color-text);">
                <?php _e('Saturday – Thursday: 9:00 AM – 6:00 PM', 'steelvilla'); ?><br>
                <?php _e('Friday: Closed (Emergency Site Support Active)', 'steelvilla'); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Interactive Inquiry Form -->
        <div style="background-color: var(--color-soft-blue); padding: 2.5rem; border-radius: var(--radius-md); border: 1px solid #e0e4f0;">
          <h3 style="margin-bottom: 0.5rem; color: var(--color-primary);"><?php _e('Send a Project Inquiry', 'steelvilla'); ?></h3>
          <p style="margin-bottom: 1.5rem; font-size: 0.95rem; color: var(--color-text);"><?php _e('Fill out the form below. An engineering representative will contact you within 24 business hours.', 'steelvilla'); ?></p>

          <form id="contact-form" class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
            <input type="hidden" name="action" value="steelvilla_contact_submit">
            <?php wp_nonce_field('steelvilla_contact_action', 'contact_nonce'); ?>

            <div class="form-group">
              <label for="contact-name"><?php _e('Your Full Name *', 'steelvilla'); ?></label>
              <input type="text" id="contact-name" name="name" class="form-control" placeholder="Md. Arif Hossain" required>
            </div>

            <div class="form-group">
              <label for="contact-phone"><?php _e('Phone Number *', 'steelvilla'); ?></label>
              <input type="tel" id="contact-phone" name="phone" class="form-control" placeholder="+880 1700 000000" required>
            </div>

            <div class="form-group">
              <label for="contact-email"><?php _e('Email Address', 'steelvilla'); ?></label>
              <input type="email" id="contact-email" name="email" class="form-control" placeholder="name@company.com">
            </div>

            <div class="form-group">
              <label for="contact-message"><?php _e('Project Details / Scope *', 'steelvilla'); ?></label>
              <textarea id="contact-message" name="message" class="form-control" rows="4" placeholder="Type of building (Warehouse, Factory, Shed), estimated dimensions, location..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.85rem; font-size: 1rem;">
              <i class="fa-solid fa-paper-plane" style="margin-right: 6px;"></i> <?php _e('Send Project Inquiry', 'steelvilla'); ?>
            </button>
            <div id="form-feedback" style="display: none; margin-top: 1rem; padding: 0.75rem; border-radius: var(--radius-sm); text-align: center;"></div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Google Maps Interactive Embed Section -->
  <section style="line-height: 0;">
    <iframe 
      src="<?php echo esc_url($maps); ?>" 
      width="100%" 
      height="450" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade"
      title="Steel Villa LTD. Office Location Map">
    </iframe>
  </section>

<?php get_footer(); ?>
