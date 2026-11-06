<?php
/**
 * Steel Villa Theme Footer Template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
  <!-- Global Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <!-- Col 1: Bio & Social -->
        <div class="footer-col">
          <div class="brand-name" style="color: var(--color-white); font-size: 1.4rem;"><?php bloginfo('name'); ?></div>
          <div class="brand-tagline"><?php echo esc_html(steelvilla_get_option('tagline', 'Smartest Steel Building Company')); ?></div>
          <p class="footer-desc">
            <?php echo esc_html(steelvilla_get_option('bio', 'At Steel Villa LTD, we specialize in delivering high-quality steel building solutions that combine durability, innovation, and precision across industrial and commercial sectors in Bangladesh.')); ?>
          </p>
          <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
            <?php if ($fb = steelvilla_get_contact('facebook')) : ?>
              <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="badge badge-accent"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
            <?php endif; ?>
            <?php if ($yt = steelvilla_get_contact('youtube')) : ?>
              <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener" class="badge badge-accent"><i class="fa-brands fa-youtube"></i> YouTube</a>
            <?php endif; ?>
            <?php if ($wa = steelvilla_get_contact('whatsapp')) : ?>
              <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $wa)); ?>" target="_blank" rel="noopener" class="badge badge-accent"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            <?php endif; ?>
          </div>
        </div>

        <!-- Col 2: Navigation Links -->
        <div class="footer-col">
          <h4><?php _e('Pages', 'steelvilla'); ?></h4>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Home', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('about-us', home_url('/about-us/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('About Us', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('services', home_url('/services/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Services', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Projects Hub', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('complete-projects', home_url('/complete-projects/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Complete Projects', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('ongoing-projects', home_url('/ongoing-projects/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Ongoing Projects', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('products', home_url('/products/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Steel Products', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Contact', 'steelvilla'); ?></a></li>
          </ul>
        </div>

        <!-- Col 3: Sister Companies -->
        <div class="footer-col">
          <h4><?php _e('Sister Companies', 'steelvilla'); ?></h4>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url(steelvilla_get_option('sister_url', 'https://www.generalsteel.com.bd/')); ?>" target="_blank" rel="noopener"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php echo esc_html(steelvilla_get_option('sister_name', 'General Steel Buildings')); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('complete-projects', home_url('/complete-projects/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Completed Portfolios', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('ongoing-projects', home_url('/ongoing-projects/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Worksites Across BD', 'steelvilla'); ?></a></li>
            <li><a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('products', home_url('/products/'))); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin-right: 5px; color: var(--color-accent);"></i> <?php _e('Technical Raw Materials', 'steelvilla'); ?></a></li>
          </ul>
        </div>

        <!-- Col 4: Headquarters -->
        <div class="footer-col">
          <h4><?php _e('Headquarters', 'steelvilla'); ?></h4>
          <p style="font-size: 0.9rem; margin-bottom: 0.75rem;">
            <strong><?php bloginfo('name'); ?></strong><br>
            <?php echo esc_html(steelvilla_get_contact('address')); ?>
          </p>
          <p style="font-size: 0.9rem; margin-bottom: 0.5rem;">
            <strong><?php _e('Phone:', 'steelvilla'); ?></strong> 
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', steelvilla_get_contact('phone_1'))); ?>"><?php echo esc_html(steelvilla_get_contact('phone_1')); ?></a>
            <?php if ($p2 = steelvilla_get_contact('phone_2')) : ?>
              / <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $p2)); ?>"><?php echo esc_html($p2); ?></a>
            <?php endif; ?>
          </p>
          <p style="font-size: 0.9rem;">
            <strong><?php _e('Email:', 'steelvilla'); ?></strong> 
            <a href="mailto:<?php echo esc_attr(steelvilla_get_contact('email')); ?>"><?php echo esc_html(steelvilla_get_contact('email')); ?></a>
          </p>
        </div>
      </div>

      <div class="footer-bottom">
        <div><?php echo esc_html(steelvilla_get_option('copyright_text', 'All rights reserved by Steelvilla.com.bd')); ?></div>
        <div><?php echo esc_html(steelvilla_get_option('craft_text', 'Crafted with precision engineering by innopxnova.com')); ?></div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
