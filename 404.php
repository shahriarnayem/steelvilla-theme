<?php
/**
 * 404 Not Found Template
 */

get_header();
?>

  <section class="section" style="padding: 7rem 0; text-align: center;">
    <div class="container" style="max-width: 600px;">
      <div style="font-size: 5rem; font-weight: 700; color: var(--color-accent); line-height: 1; margin-bottom: 1rem;">404</div>
      <h2 style="margin-bottom: 1rem;"><?php _e('Page Not Found', 'steelvilla'); ?></h2>
      <p style="margin-bottom: 2rem; color: var(--color-text);">
        <?php _e('The page you are looking for might have been moved, renamed, or is temporarily unavailable.', 'steelvilla'); ?>
      </p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
        <i class="fa-solid fa-house" style="margin-right: 6px;"></i> <?php _e('Return to Home', 'steelvilla'); ?>
      </a>
    </div>
  </section>

<?php get_footer(); ?>
