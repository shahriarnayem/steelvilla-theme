<?php
/**
 * Steel Villa Theme Header Template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="container top-bar-inner">
      <div class="top-bar-contact">
        <?php 
        $phone1 = steelvilla_get_contact('phone_1');
        $phone2 = steelvilla_get_contact('phone_2');
        $email  = steelvilla_get_contact('email');
        $addr   = steelvilla_get_contact('address');
        ?>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>">
          <i class="fa-solid fa-phone" style="color: var(--color-accent); margin-right: 4px;"></i>
          <?php echo esc_html($phone1); ?><?php if ($phone2) echo ' / ' . esc_html($phone2); ?>
        </a>
        <a href="mailto:<?php echo esc_attr($email); ?>">
          <i class="fa-solid fa-envelope" style="color: var(--color-accent); margin-right: 4px;"></i>
          <?php echo esc_html($email); ?>
        </a>
        <span>
          <i class="fa-solid fa-location-dot" style="color: var(--color-accent); margin-right: 4px;"></i>
          <?php echo esc_html($addr); ?>
        </span>
      </div>
      <div class="top-bar-social">
        <?php if ($fb = steelvilla_get_contact('facebook')) : ?>
          <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <?php endif; ?>
        <?php if ($yt = steelvilla_get_contact('youtube')) : ?>
          <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        <?php endif; ?>
        <?php if ($li = steelvilla_get_contact('linkedin')) : ?>
          <a href="<?php echo esc_url($li); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        <?php endif; ?>
        <?php if ($wa = steelvilla_get_contact('whatsapp')) : ?>
          <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $wa)); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Main Site Header -->
  <header class="site-header">
    <div class="container header-inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <div class="brand-logo-icon">SV</div>
          <div>
            <div class="brand-name"><?php bloginfo('name'); ?></div>
            <div class="brand-tagline"><?php echo esc_html(steelvilla_get_option('tagline', get_bloginfo('description'))); ?></div>
          </div>
        <?php endif; ?>
      </a>

      <!-- Desktop & Mobile Navigation -->
      <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu(array(
              'theme_location' => 'primary',
              'container'      => 'nav',
              'container_class'=> 'nav-menu',
              'menu_class'     => '',
              'fallback_cb'    => 'steelvilla_default_primary_menu'
          ));
      } else {
          steelvilla_default_primary_menu();
      }
      ?>

      <div style="display: flex; align-items: center; gap: 1rem;">
        <?php
        $cta_text = steelvilla_get_option('cta_text', 'Get a Free Quote');
        $contact_url = steelvilla_get_page_link_by_slug('contact', home_url('/contact/'));
        ?>
        <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary" style="padding: 0.65rem 1.35rem; font-size: 0.9rem;">
          <?php echo esc_html($cta_text); ?>
        </a>
        <button class="mobile-toggle" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
      </div>
    </div>
  </header>
