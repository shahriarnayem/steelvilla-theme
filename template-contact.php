<?php
/**
 * Template Name: Contact Us
 * 
 * Steel Villa Contact Us Template - 100% Pixel-Perfect Match
 */

get_header();

$phone1 = steelvilla_get_contact('phone_1');
$phone2 = steelvilla_get_contact('phone_2');
$email  = steelvilla_get_contact('email');
$addr   = steelvilla_get_contact('address');
$maps   = steelvilla_get_contact('maps_embed');
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-accent" style="margin-bottom: 1rem;"><?php _e('Direct Engineering Desk', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Let’s Build Something Extraordinary Together', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php _e('Need a pre-engineered steel building or industrial infrastructure? Contact our engineering team today to discuss your site dimensions and specifications.', 'steelvilla'); ?></p>
    </div>
  </section>

  <!-- Contact Form & Info Grid -->
  <section class="section-padding">
    <div class="container">
      <div class="contact-grid">
        
        <!-- Left: Contact Details Cards -->
        <div class="contact-info-panel">
          <div>
            <span class="section-subtitle"><?php _e('Reach Out Directly', 'steelvilla'); ?></span>
            <h2 class="section-title"><?php _e('Get in Touch', 'steelvilla'); ?></h2>
            <p><?php _e('Our head office in Mohammadpur, Dhaka is staffed with certified structural engineers ready to review your architectural drafts, land plots, and fabrication tenders.', 'steelvilla'); ?></p>
          </div>

          <!-- Office Address Card -->
          <div class="contact-card-box">
            <div class="contact-card-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div class="contact-card-text">
              <h4><?php _e('Corporate Headquarters', 'steelvilla'); ?></h4>
              <p><?php echo esc_html($addr); ?></p>
            </div>
          </div>

          <!-- Phone Numbers Card -->
          <div class="contact-card-box">
            <div class="contact-card-icon"><i class="fa-solid fa-phone-volume"></i></div>
            <div class="contact-card-text">
              <h4><?php _e('Direct Telephone Lines', 'steelvilla'); ?></h4>
              <p>
                Primary: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" style="color: var(--color-accent); font-weight: 600;"><?php echo esc_html($phone1); ?></a><br>
                <?php if ($phone2) : ?>
                  Secondary: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone2)); ?>" style="color: var(--color-accent); font-weight: 600;"><?php echo esc_html($phone2); ?></a>
                <?php endif; ?>
              </p>
            </div>
          </div>

          <!-- Email Address Card -->
          <div class="contact-card-box">
            <div class="contact-card-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
            <div class="contact-card-text">
              <h4><?php _e('Official Email', 'steelvilla'); ?></h4>
              <p>
                Inquiries & Tenders: <a href="mailto:<?php echo esc_attr($email); ?>" style="color: var(--color-accent); font-weight: 600;"><?php echo esc_html($email); ?></a>
              </p>
            </div>
          </div>

          <!-- Working Hours Card -->
          <div class="contact-card-box">
            <div class="contact-card-icon"><i class="fa-solid fa-clock"></i></div>
            <div class="contact-card-text">
              <h4><?php _e('Business Hours', 'steelvilla'); ?></h4>
              <p><?php _e('Sunday – Thursday: 9:00 AM – 6:00 PM', 'steelvilla'); ?><br><?php _e('Friday & Saturday: By Appointment', 'steelvilla'); ?></p>
            </div>
          </div>
        </div>

        <!-- Right: Interactive Lead Capture Form (Elementor Pro form) -->
        <div class="contact-form-panel">
          <h3 style="margin-bottom: 0.5rem; font-size: 1.5rem;"><?php _e('Send Your Project Inquiry', 'steelvilla'); ?></h3>
          <p style="font-size: 0.95rem; color: var(--color-text); margin-bottom: 2rem;"><?php _e('Fill out this form and our technical estimators will contact you within 24 hours.', 'steelvilla'); ?></p>

          <form id="steelvilla-contact-form">
            <!-- Full Name -->
            <div class="form-group">
              <label for="full_name"><?php _e('Full Name *', 'steelvilla'); ?></label>
              <input type="text" id="full_name" name="form_fields[name]" class="form-control" placeholder="e.g. Engr. Tanvir Ahmed" required>
            </div>

            <!-- Phone Number -->
            <div class="form-group">
              <label for="phone_number"><?php _e('Phone Number *', 'steelvilla'); ?></label>
              <input type="tel" id="phone_number" name="form_fields[field_5bc510a]" class="form-control" placeholder="e.g. +88017XXXXXXXX" required>
            </div>

            <!-- Email Address -->
            <div class="form-group">
              <label for="email_address"><?php _e('Corporate / Personal Email *', 'steelvilla'); ?></label>
              <input type="email" id="email_address" name="form_fields[email]" class="form-control" placeholder="e.g. tanvir@company.com" required>
            </div>

            <!-- Message / Scope -->
            <div class="form-group">
              <label for="project_message"><?php _e('Project Details / Estimated Area (SQFT) *', 'steelvilla'); ?></label>
              <textarea id="project_message" name="form_fields[message]" class="form-control" placeholder="Describe your structural requirements, site location, desired clear-span, and timeline..." required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.05rem;">
              <i class="fa-solid fa-paper-plane" style="margin-right: 6px;"></i> <?php _e('Send Project Inquiry', 'steelvilla'); ?>
            </button>
            <div id="form-feedback" style="display: none;"></div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- Responsive Embedded Google Map (Mohammadpur, Dhaka) -->
  <section class="section-padding-sm bg-gray">
    <div class="container">
      <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); height: 420px; width: 100%;">
        <iframe 
          title="Steel Villa LTD Location"
          src="<?php echo esc_url($maps); ?>" 
          width="100%" 
          height="100%" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
