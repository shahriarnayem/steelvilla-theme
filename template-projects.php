<?php
/**
 * Template Name: All Projects
 * 
 * Steel Villa Projects Portfolio Hub Template
 */

get_header();

$projects_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC'
));
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Landmark Pre-Engineered Steel Structures Across Bangladesh', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Projects Hub Section with Interactive Filter Tabs -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Proven Track Record', 'steelvilla'); ?></span>
        <h2><?php _e('Industrial & Commercial Project Portfolio', 'steelvilla'); ?></h2>
        <p><?php _e('Filter by status or category. Click on any project card to open the minimal photo gallery.', 'steelvilla'); ?></p>
      </div>

      <!-- Filter Controls -->
      <div class="filter-controls">
        <button class="filter-btn active" data-filter="all"><?php _e('All Projects', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="completed-projects"><?php _e('Completed', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="ongoing-projects"><?php _e('Ongoing', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="factory"><?php _e('Factories', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="warehouse"><?php _e('Warehouses', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="infrastructure"><?php _e('Infrastructure', 'steelvilla'); ?></button>
        <button class="filter-btn" data-filter="commercial"><?php _e('Commercial', 'steelvilla'); ?></button>
      </div>

      <!-- Projects Grid -->
      <div class="projects-grid">
        <?php if ($projects_query->have_posts()) : ?>
          <?php while ($projects_query->have_posts()) : $projects_query->the_post(); 
            $client   = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
            $loc      = get_post_meta(get_the_ID(), '_steelvilla_project_location', true);
            $img      = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop');
            
            // Gather term slugs for filter data attribute
            $status_terms = wp_get_post_terms(get_the_ID(), 'project-status', array('fields' => 'slugs'));
            $cat_terms    = wp_get_post_terms(get_the_ID(), 'project-category-', array('fields' => 'slugs'));
            $all_terms    = array_merge($status_terms, $cat_terms);
            $terms_str    = implode(' ', $all_terms);
          ?>
            <div class="project-card" data-category="<?php echo esc_attr($terms_str); ?>">
              <div class="project-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
              </div>
              <div class="project-body">
                <span class="project-status-tag"><?php echo esc_html($client ?: 'Steel Villa Project'); ?></span>
                <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
        <h2><?php _e('Have a Structural Project to Build?', 'steelvilla'); ?></h2>
        <p><?php _e('Let our certified engineers assist you with customized designs and cost feasibility.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Consult an Engineer', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
