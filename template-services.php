<?php
/**
 * Template Name: Services
 * 
 * Steel Villa Services Page Template
 */

get_header();

$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Comprehensive Pre-Engineered Steel Building & Heavy Civil Solutions', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Detailed Alternating Services Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Our Expertise', 'steelvilla'); ?></span>
        <h2><?php _e('Turnkey PEB & Industrial Infrastructure Services', 'steelvilla'); ?></h2>
        <p><?php _e('Engineered to international standards with in-house fabrication, certified welding, and rapid site erection.', 'steelvilla'); ?></p>
      </div>

      <div class="service-details-list">
        <?php if ($services_query->have_posts()) : $count = 0; ?>
          <?php while ($services_query->have_posts()) : $services_query->the_post(); $count++; 
            $icon = get_post_meta(get_the_ID(), '_steelvilla_service_icon', true) ?: 'fa-solid fa-industry';
            $img  = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop');
          ?>
            <div class="service-detail-row <?php echo ($count % 2 === 0) ? 'service-row-reverse' : ''; ?>" style="display: flex; gap: 3rem; align-items: center; margin-bottom: 4rem; flex-wrap: wrap;">
              <div style="flex: 1; min-width: 300px;">
                <div style="display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px; background-color: var(--color-soft-blue); color: var(--color-accent); font-size: 1.8rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
                  <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
                <h3 style="font-size: 1.6rem; margin-bottom: 1rem; color: var(--color-primary);"><?php the_title(); ?></h3>
                <div style="color: var(--color-text); line-height: 1.7; margin-bottom: 1.5rem;">
                  <?php the_content(); ?>
                </div>
                <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="padding: 0.65rem 1.4rem;">
                  <?php _e('Request Service Proposal', 'steelvilla'); ?>
                </a>
              </div>
              <div style="flex: 1; min-width: 300px;">
                <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid #eee;">
                  <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 380px; object-fit: cover; display: block;">
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Grid -->
  <section class="section" style="background-color: var(--color-soft-blue);">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Why Steel Villa', 'steelvilla'); ?></span>
        <h2><?php _e('The Steel Villa Engineering Advantage', 'steelvilla'); ?></h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2rem; margin-bottom: 1rem;"><i class="fa-solid fa-clock"></i></div>
          <h3><?php _e('Rapid Execution', 'steelvilla'); ?></h3>
          <p><?php _e('Optimized pre-engineered components reduce erection timelines by up to 50% compared to traditional concrete.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2rem; margin-bottom: 1rem;"><i class="fa-solid fa-calculator"></i></div>
          <h3><?php _e('Cost Efficiency', 'steelvilla'); ?></h3>
          <p><?php _e('Lower foundation requirements and high steel weight-to-strength ratios significantly lower overall capital expenditure.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2rem; margin-bottom: 1rem;"><i class="fa-solid fa-shield-halved"></i></div>
          <h3><?php _e('Code Compliance', 'steelvilla'); ?></h3>
          <p><?php _e('All structural designs are certified under BNBC, AISC, AWS, and ASTM guidelines with seismic and wind resistance.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2rem; margin-bottom: 1rem;"><i class="fa-solid fa-handshake-angle"></i></div>
          <h3><?php _e('Single-Point Accountability', 'steelvilla'); ?></h3>
          <p><?php _e('From initial 3D conceptualization to handover, you work with one dedicated engineering and project management team.', 'steelvilla'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="container cta-inner">
      <div>
        <h2><?php _e('Ready to Discuss Your Building Requirements?', 'steelvilla'); ?></h2>
        <p><?php _e('Contact our specialized PEB consultants for architectural layout advice and cost estimation.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Get a Free Quote', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
