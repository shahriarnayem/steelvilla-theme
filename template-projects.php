<?php
/**
 * Template Name: All Projects
 * 
 * Steel Villa Projects Portfolio Hub Template - 100% Pixel-Perfect Match
 */

get_header();

$projects_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC'
));
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-accent" style="margin-bottom: 1rem;"><?php _e('Engineering Portfolios', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Our Industrial Projects', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php _e('Explore our landmark pre-engineered steel buildings, industrial sheds, and civil infrastructure delivered across Bangladesh.', 'steelvilla'); ?></p>
    </div>
  </section>

  <!-- Projects Hub with Interactive Filter Tabs -->
  <section class="section-padding">
    <div class="container">
      
      <!-- Interactive Filter Tabs -->
      <div class="filter-tabs">
        <button class="filter-tab active" data-filter="all"><?php _e('All Projects (21)', 'steelvilla'); ?></button>
        <button class="filter-tab" data-filter="completed"><?php _e('Completed Projects (10)', 'steelvilla'); ?></button>
        <button class="filter-tab" data-filter="ongoing"><?php _e('Ongoing Works (10)', 'steelvilla'); ?></button>
        <button class="filter-tab" data-filter="industrial"><?php _e('Industrial & Sheds', 'steelvilla'); ?></button>
        <button class="filter-tab" data-filter="storage"><?php _e('Buffer Godowns & Storage', 'steelvilla'); ?></button>
      </div>

      <!-- 21 Projects Grid (CPT project) -->
      <div class="projects-grid">
        <?php if ($projects_query->have_posts()) : ?>
          <?php while ($projects_query->have_posts()) : $projects_query->the_post(); 
            $client = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
            $img    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=600&auto=format&fit=crop');
            
            $status_terms = wp_get_post_terms(get_the_ID(), 'project-status', array('fields' => 'slugs'));
            $is_ongoing   = in_array('ongoing-projects', $status_terms);
            $status_attr  = $is_ongoing ? 'ongoing' : 'completed';

            $title = get_the_title();
            $cat_attr = (strpos(strtolower($title), 'godown') !== false) ? 'storage' : 'industrial';
          ?>
            <div class="project-card" data-status="<?php echo esc_attr($status_attr); ?>" data-category="<?php echo esc_attr($cat_attr); ?>">
              <div class="project-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                <?php if ($is_ongoing) : ?>
                  <span class="badge badge-ongoing project-status-tag"><i class="fa-solid fa-clock"></i> <?php _e('Ongoing', 'steelvilla'); ?></span>
                <?php else : ?>
                  <span class="badge badge-completed project-status-tag"><i class="fa-solid fa-circle-check"></i> <?php _e('Completed', 'steelvilla'); ?></span>
                <?php endif; ?>
              </div>
              <div class="project-info">
                <h3 class="project-title"><?php the_title(); ?></h3>
                <div class="project-client-name"><i class="fa-solid fa-building" style="margin-right: 4px; font-size: 0.8rem;"></i> <?php echo esc_html($client ?: get_the_title()); ?></div>
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
