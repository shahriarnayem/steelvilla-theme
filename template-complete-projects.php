<?php
/**
 * Template Name: Complete Projects
 * 
 * Steel Villa Complete Projects Template
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

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Successfully Handed Over Pre-Engineered Structures & Infrastructure', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>"><?php _e('Projects', 'steelvilla'); ?></a> / 
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Complete Projects Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Delivered Landmarks', 'steelvilla'); ?></span>
        <h2><?php _e('100% Completed & Commissioned Projects', 'steelvilla'); ?></h2>
        <p><?php _e('Explore our executed industrial buildings, heavy boiler sheds, and storage godowns across Bangladesh. Click to view image gallery.', 'steelvilla'); ?></p>
      </div>

      <div class="projects-grid">
        <?php if ($complete_query->have_posts()) : ?>
          <?php while ($complete_query->have_posts()) : $complete_query->the_post(); 
            $client   = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
            $loc      = get_post_meta(get_the_ID(), '_steelvilla_project_location', true);
            $img      = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop');
          ?>
            <div class="project-card">
              <div class="project-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
              </div>
              <div class="project-body">
                <span class="project-status-tag" style="background-color: #e7f5ea; color: #2e7d32;">
                  <i class="fa-solid fa-check-circle" style="margin-right: 4px;"></i> <?php _e('Completed', 'steelvilla'); ?>
                </span>
                <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p style="font-size: 0.9rem; color: var(--color-primary); font-weight: 500; margin-bottom: 0.25rem;">
                  <?php echo esc_html($client); ?>
                </p>
                <p class="project-loc"><i class="fa-solid fa-location-dot" style="margin-right: 4px; color: var(--color-accent);"></i> <?php echo esc_html($loc ?: 'Bangladesh'); ?></p>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="container cta-inner">
      <div>
        <h2><?php _e('Experience Quality That Stands the Test of Time', 'steelvilla'); ?></h2>
        <p><?php _e('Get in touch with our team to tour one of our completed facilities or discuss your upcoming requirements.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Contact Us', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
