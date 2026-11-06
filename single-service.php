<?php
/**
 * Single Service Detail Template
 */

get_header();

while (have_posts()) : the_post();
    $icon = get_post_meta(get_the_ID(), '_steelvilla_service_icon', true) ?: 'fa-solid fa-industry';
    $img  = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&auto=format&fit=crop');
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html(get_the_excerpt()); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('services', home_url('/services/'))); ?>"><?php _e('Services', 'steelvilla'); ?></a> / 
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Service Details Section -->
  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: flex-start; flex-wrap: wrap;">
        <div>
          <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
            <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; max-height: 480px; object-fit: cover; display: block;">
          </div>

          <div class="post-content">
            <?php the_content(); ?>
          </div>
        </div>

        <div>
          <div class="card" style="padding: 2rem; border-top: 4px solid var(--color-accent); margin-bottom: 2rem;">
            <div style="font-size: 2.2rem; color: var(--color-accent); margin-bottom: 1rem;"><i class="<?php echo esc_attr($icon); ?>"></i></div>
            <h3 style="margin-bottom: 1rem; color: var(--color-primary);"><?php _e('Service Highlights', 'steelvilla'); ?></h3>
            <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem; line-height: 1.8;">
              <li><i class="fa-solid fa-check" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('Certified Civil & Structural Engineers', 'steelvilla'); ?></li>
              <li><i class="fa-solid fa-check" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('3D TEKLA Detailing & Analysis', 'steelvilla'); ?></li>
              <li><i class="fa-solid fa-check" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('In-House Heavy Fabrication Plant', 'steelvilla'); ?></li>
              <li><i class="fa-solid fa-check" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('Strict BNBC Code Compliance', 'steelvilla'); ?></li>
            </ul>

            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
              <?php _e('Inquire About This Service', 'steelvilla'); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
