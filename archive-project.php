<?php
/**
 * Projects Archive & Taxonomy Template
 */

get_header();

$title = post_type_archive_title('', false);
if (is_tax()) {
    $term  = get_queried_object();
    $title = $term->name;
}
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php echo esc_html($title ?: __('Projects Archive', 'steelvilla')); ?></h1>
      <p><?php _e('Pre-Engineered Building Portfolios and Worksites', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <span><?php echo esc_html($title); ?></span>
      </div>
    </div>
  </section>

  <!-- Projects Grid -->
  <section class="section">
    <div class="container">
      <div class="projects-grid">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); 
            $client = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
            $loc    = get_post_meta(get_the_ID(), '_steelvilla_project_location', true);
            $img    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop');
          ?>
            <div class="project-card">
              <div class="project-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
              </div>
              <div class="project-body">
                <span class="project-status-tag"><?php echo esc_html($client ?: 'PEB Structure'); ?></span>
                <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="project-loc"><i class="fa-solid fa-location-dot" style="margin-right: 4px; color: var(--color-accent);"></i> <?php echo esc_html($loc ?: 'Bangladesh'); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php _e('No projects found in this archive.', 'steelvilla'); ?></p>
        <?php endif; ?>
      </div>

      <div style="margin-top: 3rem; text-align: center;">
        <?php the_posts_pagination(array('prev_text' => '&larr;', 'next_text' => '&rarr;')); ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
