<?php
/**
 * Template Name: Home Page
 * 
 * Steel Villa Front Page Template
 */

get_header();

// Fetch Hero Slides from CPT hero
$hero_query = new WP_Query(array(
    'post_type'      => 'hero',
    'posts_per_page' => 5,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));

$page_meta = get_post_meta(get_the_ID(), '_steelvilla_page_meta', true);
if (!is_array($page_meta)) $page_meta = array();

$welcome_title = $page_meta['home_welcome_title'] ?? 'Welcome to Steel Villa';
$welcome_sub   = $page_meta['home_welcome_sub'] ?? 'Your Trusted Partner in Pre-Engineered Steel Buildings and Civil Construction';
$welcome_desc  = $page_meta['home_welcome_desc'] ?? 'With over 15 years of industry excellence, Steel Villa LTD. stands as an innovator in industrial steel structures. Our integrated engineering approach seamlessly combines architectural design, structural analysis, modern fabrication, and turnkey on-site assembly.';
?>

  <!-- Hero Slider Section (CPT hero dynamic loop) -->
  <section class="hero-slider-section">
    <div class="hero-slider">
      <?php if ($hero_query->have_posts()) : $slide_idx = 0; ?>
        <?php while ($hero_query->have_posts()) : $hero_query->the_post(); $slide_idx++; 
          $tagline = get_post_meta(get_the_ID(), '_steelvilla_hero_tagline', true);
          $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          if (!$img_url) {
              $img_url = get_post_meta(get_the_ID(), '_steelvilla_hero_img', true);
          }
          if (!$img_url) {
              $img_url = 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop';
          }
        ?>
          <div class="hero-slide <?php echo ($slide_idx === 1) ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url($img_url); ?>');">
            <div class="container">
              <div class="hero-content">
                <?php if ($tagline) : ?>
                  <span class="hero-tagline"><?php echo esc_html($tagline); ?></span>
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <!-- Default Fallback Hero Slide -->
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline"><?php _e('Certified PEB Engineering', 'steelvilla'); ?></span>
              <h1><?php _e('Your Trusted Steel Partner', 'steelvilla'); ?></h1>
              <p><?php _e('From design to delivery, we provide reliable and high-quality steel structure solutions for every industrial and commercial project across Bangladesh.', 'steelvilla'); ?></p>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Left & Right Arrow Controls -->
    <button class="slider-arrow slider-prev" aria-label="Previous Slide"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="slider-arrow slider-next" aria-label="Next Slide"><i class="fa-solid fa-chevron-right"></i></button>
  </section>

  <!-- Overlapping Core Value Proposition Pillars -->
  <section class="pillars-section">
    <div class="container">
      <div class="pillars-grid">
        <div class="pillar-card">
          <div class="pillar-icon"><i class="fa-solid fa-drafting-compass"></i></div>
          <h3><?php _e('Customized Solutions', 'steelvilla'); ?></h3>
          <p><?php _e('Tailor-made PEB designs engineered precisely to client load, clearance, and structural specifications.', 'steelvilla'); ?></p>
        </div>
        <div class="pillar-card">
          <div class="pillar-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <h3><?php _e('Unmatched Durability', 'steelvilla'); ?></h3>
          <p><?php _e('High-tensile structural steel components fabricated with rigorous ISO and BNBC quality controls.', 'steelvilla'); ?></p>
        </div>
        <div class="pillar-card">
          <div class="pillar-icon"><i class="fa-solid fa-arrows-spin"></i></div>
          <h3><?php _e('End-to-End Service', 'steelvilla'); ?></h3>
          <p><?php _e('Comprehensive turnkey execution from foundation civil works, fabrication, to on-site assembly.', 'steelvilla'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Welcome & Brand Overview Section -->
  <section class="section welcome-section">
    <div class="container">
      <div class="welcome-grid">
        <div class="welcome-text">
          <span class="badge badge-accent" style="margin-bottom: 0.75rem;"><?php _e('About Steel Villa LTD', 'steelvilla'); ?></span>
          <h2><?php echo esc_html($welcome_title); ?></h2>
          <p style="font-size: 1.15rem; color: var(--color-primary); font-weight: 500; margin-bottom: 1rem;">
            <?php echo esc_html($welcome_sub); ?>
          </p>
          <p style="margin-bottom: 1.5rem;">
            <?php echo esc_html($welcome_desc); ?>
          </p>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 500; color: var(--color-primary);">
              <i class="fa-solid fa-check" style="color: var(--color-accent); font-weight: 900;"></i> <?php _e('AISC & BNBC Standards', 'steelvilla'); ?>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 500; color: var(--color-primary);">
              <i class="fa-solid fa-check" style="color: var(--color-accent); font-weight: 900;"></i> <?php _e('Rapid Turnkey Erection', 'steelvilla'); ?>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 500; color: var(--color-primary);">
              <i class="fa-solid fa-check" style="color: var(--color-accent); font-weight: 900;"></i> <?php _e('In-House TEKLA Detailing', 'steelvilla'); ?>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 500; color: var(--color-primary);">
              <i class="fa-solid fa-check" style="color: var(--color-accent); font-weight: 900;"></i> <?php _e('Safety & Quality Certified', 'steelvilla'); ?>
            </div>
          </div>

          <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('about-us', home_url('/about-us/'))); ?>" class="btn btn-primary"><?php _e('Learn More About Us', 'steelvilla'); ?></a>
        </div>
        <div class="welcome-image">
          <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop" alt="Steel Villa Engineering Facility">
        </div>
      </div>
    </div>
  </section>

  <!-- Client Trust Marquee (CPT project-review) - Placed below About -->
  <section class="section" style="background-color: var(--color-soft-blue); padding: 3rem 0; overflow: hidden;">
    <div class="container" style="text-align: center; margin-bottom: 1.5rem;">
      <span class="badge badge-accent"><?php _e('Trusted Partnerships', 'steelvilla'); ?></span>
      <h3 style="margin-top: 0.5rem;"><?php _e('Trusted by 30+ Leading Industrial Conglomerates', 'steelvilla'); ?></h3>
    </div>
    <div class="marquee-wrapper">
      <div class="marquee-track">
        <?php
        $clients_query = new WP_Query(array('post_type' => 'project-review', 'posts_per_page' => 12));
        $client_names = array();
        if ($clients_query->have_posts()) {
            while ($clients_query->have_posts()) {
                $clients_query->the_post();
                $client_names[] = get_the_title();
            }
            wp_reset_postdata();
        } else {
            $client_names = array('TMSS Engineering', 'Bangladesh Railway', 'Partex Star Group', 'Noman Group', 'Fakir Apparels', 'Nourish Poultry', 'BSRM Steels', 'Akij Group', 'Envoy Textiles');
        }

        // Output twice for seamless infinite marquee loop
        for ($loop = 0; $loop < 2; $loop++) :
            foreach ($client_names as $cname) : ?>
              <div class="marquee-item"><i class="fa-solid fa-building" style="margin-right: 6px; color: var(--color-accent);"></i> <?php echo esc_html($cname); ?></div>
            <?php endforeach;
        endfor; ?>
      </div>
    </div>
  </section>

  <!-- Core Services Showcase (CPT service) -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Our Capabilities', 'steelvilla'); ?></span>
        <h2><?php _e('Pre-Engineered Building Solutions', 'steelvilla'); ?></h2>
        <p><?php _e('End-to-end industrial steel framing, fabrication, and heavy infrastructure engineering.', 'steelvilla'); ?></p>
      </div>

      <div class="services-grid">
        <?php
        $services_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC'));
        if ($services_query->have_posts()) :
            while ($services_query->have_posts()) : $services_query->the_post();
                $icon = get_post_meta(get_the_ID(), '_steelvilla_service_icon', true) ?: 'fa-solid fa-industry';
                $img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop');
                ?>
                <div class="service-card">
                  <div class="service-image-box">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    <div class="service-icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
                  </div>
                  <div class="service-content">
                    <h3 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="service-desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn-read-more"><?php _e('Explore Details', 'steelvilla'); ?> <i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Featured Projects (CPT project) with Minimal Lightbox -->
  <section class="section" style="background-color: var(--color-soft-blue);">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Recent Landmarks', 'steelvilla'); ?></span>
        <h2><?php _e('Featured Industrial Projects', 'steelvilla'); ?></h2>
        <p><?php _e('Click on any project image to open the minimal photo gallery.', 'steelvilla'); ?></p>
      </div>

      <div class="projects-grid">
        <?php
        $projects_query = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6));
        if ($projects_query->have_posts()) :
            while ($projects_query->have_posts()) : $projects_query->the_post();
                $client = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
                $loc    = get_post_meta(get_the_ID(), '_steelvilla_project_location', true);
                $img    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop');
                ?>
                <div class="project-card">
                  <div class="project-image-box">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                  </div>
                  <div class="project-body">
                    <span class="project-status-tag"><?php echo esc_html($client ?: 'Industrial PEB'); ?></span>
                    <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="project-loc"><i class="fa-solid fa-location-dot" style="margin-right: 4px; color: var(--color-accent);"></i> <?php echo esc_html($loc ?: 'Bangladesh'); ?></p>
                  </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

      <div style="text-align: center; margin-top: 2.5rem;">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>" class="btn btn-primary"><?php _e('View All 21+ Projects', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

  <!-- Statistics Showcase Section - Placed before CTA Banner -->
  <section class="section" style="background-color: var(--color-primary); color: var(--color-white); padding: 4.5rem 0;">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number"><?php echo esc_html(steelvilla_get_option('stat_1_num', '15+')); ?></div>
          <div class="stat-label"><?php echo esc_html(steelvilla_get_option('stat_1_lbl', 'Years Experience')); ?></div>
        </div>
        <div class="stat-item">
          <div class="stat-number"><?php echo esc_html(steelvilla_get_option('stat_2_num', '120+')); ?></div>
          <div class="stat-label"><?php echo esc_html(steelvilla_get_option('stat_2_lbl', 'Completed Projects')); ?></div>
        </div>
        <div class="stat-item">
          <div class="stat-number"><?php echo esc_html(steelvilla_get_option('stat_3_num', '500k+')); ?></div>
          <div class="stat-label"><?php echo esc_html(steelvilla_get_option('stat_3_lbl', 'Square Feet Built')); ?></div>
        </div>
        <div class="stat-item">
          <div class="stat-number"><?php echo esc_html(steelvilla_get_option('stat_4_num', '100%')); ?></div>
          <div class="stat-label"><?php echo esc_html(steelvilla_get_option('stat_4_lbl', 'Client Satisfaction')); ?></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Banner -->
  <section class="cta-banner">
    <div class="container cta-inner">
      <div>
        <h2><?php _e('Ready to Build Your Next Industrial Project?', 'steelvilla'); ?></h2>
        <p><?php _e('Contact our structural design team today for free project consultation, load analysis, and transparent quotation.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Contact Engineers', 'steelvilla'); ?></a>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', steelvilla_get_contact('phone_1'))); ?>" class="btn btn-outline">
          <i class="fa-solid fa-phone" style="margin-right: 6px;"></i> <?php _e('Call:', 'steelvilla'); ?> <?php echo esc_html(steelvilla_get_contact('phone_1')); ?>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
