<?php
/**
 * Template Name: Complete Projects
 * 
 * Steel Villa Complete Projects Template - 100% Pixel-Perfect Match
 */

get_header();

$complete_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'project-status',
            'field'    => 'slug',
            'terms'    => 'completed-projects'
        )
    ),
    'orderby'        => 'date',
    'order'          => 'DESC'
));
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-completed" style="margin-bottom: 1rem; color: #065F46; background-color: #D1FAE5;"><?php _e('Taxonomy: Completed Projects (10)', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Completed Projects', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php _e('Explore our successfully delivered industrial steel structures, agro-processing plants, and manufacturing buildings handed over on time and on budget.', 'steelvilla'); ?></p>
    </div>
  </section>

  <!-- Completed Projects Loop (Template #3536) -->
  <section class="section-padding">
    <div class="container">
      <div class="projects-grid">
        <?php if ($complete_query->have_posts()) : ?>
          <?php while ($complete_query->have_posts()) : $complete_query->the_post(); 
            $client = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
            $img    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=600&auto=format&fit=crop');
          ?>
            <div class="project-card">
              <div class="project-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                <span class="badge badge-completed project-status-tag"><i class="fa-solid fa-circle-check"></i> <?php _e('Completed', 'steelvilla'); ?></span>
              </div>
              <div class="project-info">
                <h3 class="project-title"><?php the_title(); ?></h3>
                <div class="project-client-name"><i class="fa-solid fa-building" style="margin-right: 4px; font-size: 0.8rem;"></i> <?php echo esc_html($client ?: get_the_title()); ?></div>
                <p style="font-size: 0.85rem; color: var(--color-text); margin-top: 0.5rem;"><?php echo esc_html(get_the_excerpt()); ?></p>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="container">
      <h2><?php _e('Ready to Build Your Dream Project?', 'steelvilla'); ?></h2>
      <p><?php _e('Let’s collaborate to create something extraordinary. Contact our engineering team today for consultation, structural analysis, and transparent quotation.', 'steelvilla'); ?></p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Contact Engineers', 'steelvilla'); ?></a>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', steelvilla_get_contact('phone_1'))); ?>" class="btn btn-outline">
          <i class="fa-solid fa-phone" style="margin-right: 6px;"></i> <?php _e('Call:', 'steelvilla'); ?> <?php echo esc_html(steelvilla_get_contact('phone_1')); ?>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
