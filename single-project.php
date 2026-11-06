<?php
/**
 * Single Project Case Study Template
 */

get_header();

while (have_posts()) : the_post();
    $client   = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
    $loc      = get_post_meta(get_the_ID(), '_steelvilla_project_location', true);
    $img      = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1200&auto=format&fit=crop');
    $statuses = wp_get_post_terms(get_the_ID(), 'project-status');
    $status_name = !empty($statuses) ? $statuses[0]->name : 'Featured';
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html($client ? "$client — $loc" : 'Industrial Pre-Engineered Building Project'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>"><?php _e('Projects', 'steelvilla'); ?></a> / 
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Project Details Section -->
  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: flex-start; flex-wrap: wrap;">
        <!-- Left: Image & Case Study -->
        <div>
          <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
            <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; max-height: 520px; object-fit: cover; display: block;">
          </div>

          <div class="post-content">
            <h2><?php _e('Project Overview & Scope', 'steelvilla'); ?></h2>
            <?php the_content(); ?>
            <p><?php _e('Steel Villa LTD. engineered this facility implementing high-grade structural members, certified submerged arc welding (SAW), and rigorous BNBC safety standards. From primary framing to roof cladding, all components were fabricated to precise tolerances.', 'steelvilla'); ?></p>
          </div>
        </div>

        <!-- Right: Project Specifications Card -->
        <div>
          <div class="card" style="padding: 2rem; border-top: 4px solid var(--color-accent);">
            <h3 style="margin-bottom: 1.5rem; color: var(--color-primary);"><?php _e('Project Data Sheet', 'steelvilla'); ?></h3>
            
            <div style="margin-bottom: 1rem;">
              <span style="font-size: 0.85rem; color: var(--color-text); text-transform: uppercase;"><?php _e('Client / Corporate Group:', 'steelvilla'); ?></span>
              <p style="margin: 0; font-weight: 600; color: var(--color-primary); font-size: 1.05rem;"><?php echo esc_html($client ?: 'Confidential Client'); ?></p>
            </div>

            <div style="margin-bottom: 1rem;">
              <span style="font-size: 0.85rem; color: var(--color-text); text-transform: uppercase;"><?php _e('Location / Site:', 'steelvilla'); ?></span>
              <p style="margin: 0; font-weight: 600; color: var(--color-primary); font-size: 1.05rem;"><i class="fa-solid fa-location-dot" style="color: var(--color-accent); margin-right: 4px;"></i> <?php echo esc_html($loc ?: 'Bangladesh'); ?></p>
            </div>

            <div style="margin-bottom: 1rem;">
              <span style="font-size: 0.85rem; color: var(--color-text); text-transform: uppercase;"><?php _e('Execution Status:', 'steelvilla'); ?></span>
              <p style="margin: 0;">
                <span class="badge badge-accent"><?php echo esc_html($status_name); ?></span>
              </p>
            </div>

            <div style="margin-bottom: 1.5rem;">
              <span style="font-size: 0.85rem; color: var(--color-text); text-transform: uppercase;"><?php _e('Engineering Standard:', 'steelvilla'); ?></span>
              <p style="margin: 0; font-weight: 500; color: var(--color-primary);">BNBC 2020 / AISC 360 / AWS D1.1</p>
            </div>

            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
              <?php _e('Inquire About Similar Project', 'steelvilla'); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
