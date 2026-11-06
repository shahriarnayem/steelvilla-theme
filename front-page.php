<?php
/**
 * Template Name: Home Page
 * 
 * Steel Villa Front Page Template - 100% Pixel-Perfect Match
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

$welcome_sub = $page_meta['home_welcome_sub'] ?? 'Your Trusted Partner in Pre-Engineered Steel Buildings and Civil Construction';
?>

  <!-- Hero Slider Section (CPT hero dynamic loop) -->
  <section class="hero-slider-section">
    <div class="hero-slider">
      <?php if ($hero_query->have_posts()) : $slide_idx = 0; ?>
        <?php while ($hero_query->have_posts()) : $hero_query->the_post(); $slide_idx++; 
          $tagline = get_post_meta(get_the_ID(), '_steelvilla_hero_tagline', true) ?: 'Certified PEB Engineering';
          $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: (get_post_meta(get_the_ID(), '_steelvilla_hero_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop');
        ?>
          <div class="hero-slide <?php echo ($slide_idx === 1) ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url($img_url); ?>');">
            <div class="container">
              <div class="hero-content">
                <span class="hero-tagline"><?php echo esc_html($tagline); ?></span>
                <h1><?php the_title(); ?></h1>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline">Certified PEB Engineering</span>
              <h1>Your Trusted Steel Partner</h1>
              <p>From design to delivery, we provide reliable and high-quality steel structure solutions for every industrial and commercial project across Bangladesh.</p>
            </div>
          </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline">Precision & Safety</span>
              <h1>Engineering Excellence in Steel</h1>
              <p>Steel Villa Engineering Ltd. ensures precision, safety, and superior quality from early concept through project erection and turnkey handover.</p>
            </div>
          </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline">Advanced Fabrication</span>
              <h1>Steel Structures Made Stronger</h1>
              <p>With expert engineering planning and certified raw materials, we turn complex construction ideas into long-lasting, weather-resistant steel structures.</p>
            </div>
          </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline">Industrial Infrastructure</span>
              <h1>Building Strength, Creating Trust</h1>
              <p>We deliver durable, seismically safe, and cost-effective steel engineering solutions built for the future of Bangladesh's manufacturing sector.</p>
            </div>
          </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?q=80&w=1600&auto=format&fit=crop');">
          <div class="container">
            <div class="hero-content">
              <span class="hero-tagline">Modern Fabrication</span>
              <h1>Reliable Steel Solutions for Every Project</h1>
              <p>We specialize in modern steel fabrication, pre-engineered buildings, roof revamps, and civil construction services tailored to your exact timeline.</p>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Left & Right Arrow Navigation (No Pagination) -->
    <button class="slider-arrow slider-prev" aria-label="Previous Slide"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="slider-arrow slider-next" aria-label="Next Slide"><i class="fa-solid fa-chevron-right"></i></button>
  </section>

  <!-- 3 Core Pillars Section -->
  <section class="container">
    <div class="pillars-grid">
      <div class="pillar-card">
        <div class="pillar-icon"><i class="fa-solid fa-pen-ruler"></i></div>
        <h3><?php _e('Customized Solutions', 'steelvilla'); ?></h3>
        <p><?php _e('Every industrial project is custom designed to optimize usable floor space, ceiling clearances, load capabilities, and future expansion needs.', 'steelvilla'); ?></p>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h3><?php _e('Unmatched Durability', 'steelvilla'); ?></h3>
        <p><?php _e('Engineered with high tensile certified structural steel, corrosion-resistant coatings, and strict compliance with national building codes.', 'steelvilla'); ?></p>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
        <h3><?php _e('End-to-End Service', 'steelvilla'); ?></h3>
        <p><?php _e('From architectural drafting and 3D modeling to automated CNC fabrication, foundation work, and rapid on-site structural assembly.', 'steelvilla'); ?></p>
      </div>
    </div>
  </section>

  <!-- Welcome & Story Section -->
  <section class="section-padding">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
        <div>
          <span class="section-subtitle"><?php _e('About Steel Villa', 'steelvilla'); ?></span>
          <h2 class="section-title"><?php _e('Welcome to Steel Villa LTD.', 'steelvilla'); ?></h2>
          <h3 style="color: var(--color-accent); font-size: 1.15rem; margin-bottom: 1.25rem;"><?php echo esc_html($welcome_sub); ?></h3>
          <p><?php _e('Steel Villa LTD. is recognized across Bangladesh for setting benchmarks in structural steel fabrication and modern Pre-Engineered Building (PEB) systems. We bridge the gap between architectural innovation and structural durability.', 'steelvilla'); ?></p>
          <p><?php _e('Whether creating multi-acre warehouse complexes, high-load agricultural processing sheds, multi-tier textile facilities, or specialized utility bridges, our certified engineers and fabrication professionals execute with unmatched precision.', 'steelvilla'); ?></p>
          <div style="display: flex; gap: 1rem; margin-top: 1.75rem;">
            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('about-us', home_url('/about-us/'))); ?>" class="btn btn-primary"><?php _e('Discover Our Story', 'steelvilla'); ?></a>
            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('projects', home_url('/projects/'))); ?>" class="btn btn-outline-dark"><?php _e('Browse Projects', 'steelvilla'); ?></a>
          </div>
        </div>
        <div>
          <div style="position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg);">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop" alt="Steel Building Fabrication" style="width: 100%; height: 420px; object-fit: cover;">
            <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; background-color: rgba(0,0,0,0.85); color: #FFF; padding: 1rem 1.5rem; border-radius: var(--radius-sm); border-left: 4px solid var(--color-accent);">
              <div style="font-size: 1.5rem; font-weight: 700; color: var(--color-accent);">100% Compliant</div>
              <div style="font-size: 0.85rem; color: #D1D5DB;">BNBC & International Standards</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Continuous Company Logo Marquee (In Place of Old Stats) -->
  <section class="company-marquee-section">
    <div class="company-marquee-title"><?php _e('Trusted by 30+ Leading Bangladeshi Conglomerates & Government Agencies', 'steelvilla'); ?></div>
    <div class="marquee-wrapper">
      <div class="marquee-track">
        <?php
        $clients_query = new WP_Query(array('post_type' => 'project-review', 'posts_per_page' => 20));
        $client_items = array();

        if ($clients_query->have_posts()) {
            while ($clients_query->have_posts()) {
                $clients_query->the_post();
                $icon = (strpos(strtolower(get_the_title()), 'railway') !== false) ? 'fa-train' : 'fa-industry';
                $client_items[] = array('name' => get_the_title(), 'icon' => $icon);
            }
            wp_reset_postdata();
        } else {
            $default_clients = array('TMSS Group', 'Bangladesh Railway', 'Partex Group', 'Noman Group', 'Fakir Group', 'Nourish Poultry & Hatchery', 'Nahar Agro Group', 'JMI Group', 'City Group', 'DBL Group', 'BSRM Group of Industries', 'AKIJ Group');
            foreach ($default_clients as $dc) {
                $icon = ($dc === 'Bangladesh Railway') ? 'fa-train' : 'fa-industry';
                $client_items[] = array('name' => $dc, 'icon' => $icon);
            }
        }

        // Loop twice for seamless infinite marquee loop
        for ($loop = 0; $loop < 2; $loop++) :
            foreach ($client_items as $c) : ?>
              <div class="marquee-item">
                <div class="marquee-item-icon"><i class="fa-solid <?php echo esc_attr($c['icon']); ?>"></i></div>
                <span class="marquee-item-name"><?php echo esc_html($c['name']); ?></span>
              </div>
            <?php endforeach;
        endfor; ?>
      </div>
    </div>
  </section>

  <!-- Services Showcase (CPT service dynamic loop) -->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-header">
        <span class="section-subtitle"><?php _e('Our Capabilities', 'steelvilla'); ?></span>
        <h2 class="section-title"><?php _e('Top-Notch Steel Building Services & Solutions', 'steelvilla'); ?></h2>
        <p class="section-desc"><?php _e('Engineered for endurance, speed, and safety. Discover how we support commercial, agricultural, and industrial infrastructure.', 'steelvilla'); ?></p>
      </div>

      <div class="services-grid">
        <?php
        $services_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC'));
        $s_num = 0;
        if ($services_query->have_posts()) :
            while ($services_query->have_posts()) : $services_query->the_post(); $s_num++;
                $num_str = str_pad($s_num, 2, '0', STR_PAD_LEFT);
                $img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=600&auto=format&fit=crop');
                ?>
                <div class="service-card">
                  <div class="service-image-wrapper">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    <span class="service-number"><?php echo esc_html($num_str); ?></span>
                  </div>
                  <div class="service-body">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    <a href="<?php the_permalink(); ?>" class="service-link"><?php _e('Learn More', 'steelvilla'); ?> <i class="fa-solid fa-arrow-right" style="margin-left: 4px;"></i></a>
                  </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Featured Projects Showcase (CPT project dynamic loop) -->
  <section class="section-padding">
    <div class="container">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem;">
        <div>
          <span class="section-subtitle"><?php _e('Our Portfolio', 'steelvilla'); ?></span>
          <h2 class="section-title"><?php _e('Featured Projects', 'steelvilla'); ?></h2>
        </div>
        <div style="display: flex; gap: 0.75rem;">
          <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('complete-projects', home_url('/complete-projects/'))); ?>" class="btn btn-outline-dark" style="padding: 0.65rem 1.25rem;"><?php _e('Complete Projects', 'steelvilla'); ?></a>
          <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('ongoing-projects', home_url('/ongoing-projects/'))); ?>" class="btn btn-primary" style="padding: 0.65rem 1.25rem;"><?php _e('Ongoing Projects', 'steelvilla'); ?></a>
        </div>
      </div>

      <div class="projects-grid">
        <?php
        $projects_query = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6));
        if ($projects_query->have_posts()) :
            while ($projects_query->have_posts()) : $projects_query->the_post();
                $client = get_post_meta(get_the_ID(), '_steelvilla_project_client', true);
                $img    = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: (get_post_meta(get_the_ID(), '_steelvilla_img', true) ?: 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=600&auto=format&fit=crop');
                
                $status_terms = wp_get_post_terms(get_the_ID(), 'project-status', array('fields' => 'slugs'));
                $is_ongoing   = in_array('ongoing-projects', $status_terms);
                ?>
                <div class="project-card">
                  <div class="project-image-box">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
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

  <!-- Elevated Stats & Achievements Showcase (In Place of Reviews/Marquee) -->
  <section class="stats-showcase-section">
    <div class="container">
      <div class="section-header" style="margin-bottom: 3.5rem;">
        <span class="section-subtitle" style="color: var(--color-accent);"><?php _e('Proven Impact', 'steelvilla'); ?></span>
        <h2 class="section-title" style="color: var(--color-white);"><?php _e('Our Engineering Track Record & Scale', 'steelvilla'); ?></h2>
        <p class="section-desc" style="color: #A0A5B1;"><?php _e('Numbers reflecting decades of structural safety, rapid turnaround, and client satisfaction nationwide.', 'steelvilla'); ?></p>
      </div>

      <div class="stats-showcase-grid">
        <div class="stats-card-box">
          <div class="stats-card-icon"><i class="fa-solid fa-users-gear"></i></div>
          <div class="stats-card-number"><?php echo esc_html(steelvilla_get_option('stat_1_num', '100+')); ?></div>
          <div class="stats-card-title"><?php echo esc_html(steelvilla_get_option('stat_1_lbl', 'Team Members')); ?></div>
          <div class="stats-card-desc"><?php _e('Certified structural engineers, 3D BIM detailers, automated CNC fabricators, and certified on-site erectors.', 'steelvilla'); ?></div>
        </div>

        <div class="stats-card-box">
          <div class="stats-card-icon"><i class="fa-solid fa-award"></i></div>
          <div class="stats-card-number"><?php echo esc_html(steelvilla_get_option('stat_2_num', '30+')); ?></div>
          <div class="stats-card-title"><?php echo esc_html(steelvilla_get_option('stat_2_lbl', 'Years Experience')); ?></div>
          <div class="stats-card-desc"><?php _e('Cumulative leadership experience executing heavy industrial civil works, PEBs, and high-load infrastructures.', 'steelvilla'); ?></div>
        </div>

        <div class="stats-card-box">
          <div class="stats-card-icon"><i class="fa-solid fa-ruler-combined"></i></div>
          <div class="stats-card-number"><?php echo esc_html(steelvilla_get_option('stat_3_num', '50,000+')); ?></div>
          <div class="stats-card-title"><?php echo esc_html(steelvilla_get_option('stat_3_lbl', 'SQFT Built')); ?></div>
          <div class="stats-card-desc"><?php _e('Total fabricated floor area completed across grain godowns, textile mills, boiler sheds, and factory complexes.', 'steelvilla'); ?></div>
        </div>

        <div class="stats-card-box">
          <div class="stats-card-icon"><i class="fa-solid fa-city"></i></div>
          <div class="stats-card-number"><?php echo esc_html(steelvilla_get_option('stat_4_num', '21+')); ?></div>
          <div class="stats-card-title"><?php echo esc_html(steelvilla_get_option('stat_4_lbl', 'Major Projects')); ?></div>
          <div class="stats-card-desc"><?php _e('Turnkey industrial contracts executed and underway for premier corporate conglomerates across Bangladesh.', 'steelvilla'); ?></div>
        </div>
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
