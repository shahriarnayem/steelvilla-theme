<?php
/**
 * Template Name: Services
 * 
 * Steel Villa Services Page Template - 100% Pixel-Perfect Match
 */

get_header();

$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-accent" style="margin-bottom: 1rem;"><?php _e('Engineering Capabilities', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Steel Buildings Built to Last', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php _e('Explore our comprehensive steel building solutions and services designed to help industrial clients achieve speed, efficiency, and structural reliability.', 'steelvilla'); ?></p>
    </div>
  </section>

  <!-- Detailed Services (Alternating Loop Item Templates #645 & #1520) -->
  <section class="section-padding">
    <div class="container">
      <?php 
      $service_data = array(
          array(
              'num' => '01',
              'title' => 'Tailor-Made Steel Building Design & Development',
              'desc' => 'Every project starts with a vision — and we turn that vision into a durable, functional structure. Our team works closely with clients to create custom architectural blueprints, 3D structural models, and load-bearing calculations.',
              'bullets' => array('Full 3D BIM & TEKLA structural detailing', 'BNBC, AISC, and IBC seismic compliance', 'Optimized clear-span layouts for maximum floor utility'),
              'cta' => 'Request Custom Blueprint',
              'img' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop'
          ),
          array(
              'num' => '02',
              'title' => 'Efficient Pre-Engineered Steel Building (PEB) Solutions',
              'desc' => 'For accelerated timelines and cost-efficient execution, we offer turnkey pre-engineered steel buildings where major primary and secondary structural members are prefabricated in our automated plant and swiftly bolted on site.',
              'bullets' => array('Up to 40% faster execution compared to RCC structures', 'Tapered I-beam geometry reducing dead load', 'Bolted structural connections for zero on-site welding delays'),
              'cta' => 'Inquire About PEB Solutions',
              'img' => 'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=800&auto=format&fit=crop'
          ),
          array(
              'num' => '03',
              'title' => 'Steel Structure Maintenance & Modernization',
              'desc' => 'Steel buildings, while durable, require occasional maintenance or upgrades — and that’s where we come in. Whether you need roof replacements, insulation upgrades, beam retrofitting, or facility expansion, our specialized crews deliver without interrupting your factory operations.',
              'bullets' => array('High-performance leakproofing and roof sheet replacement', 'Industrial crane girder reinforcement and beam strengthening', 'Thermal insulation retrofits reducing factory HVAC expenses'),
              'cta' => 'Book Structural Inspection',
              'img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=800&auto=format&fit=crop'
          ),
          array(
              'num' => '04',
              'title' => 'Heavy-Duty Industrial Steel Infrastructure',
              'desc' => 'We design and construct heavy industrial complexes capable of sustaining overhead bridge cranes, vibration forces, thermal fluctuations, and massive chemical storage facilities. Engineered for manufacturing powerhouses.',
              'bullets' => array('Heavy crane girder systems (10 Ton to 50 Ton+)', 'Long clear-span truss designs for unobstructed production lines', 'High wind & cyclone resistance designed for coastal Bangladesh'),
              'cta' => 'Discuss Industrial Specs',
              'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop'
          ),
          array(
              'num' => '05',
              'title' => 'Commercial-Grade Steel Building Construction',
              'desc' => 'From multi-tier corporate office towers and retail showrooms to logistics distribution centers, our commercial steel solutions merge sleek contemporary aesthetics with structural endurance.',
              'bullets' => array('Composite steel-concrete deck slab floors', 'Elegant glass curtain-wall and architectural cladding integration', 'Column-free interior spaces for flexible tenant partitioning'),
              'cta' => 'Plan Commercial Facility',
              'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop'
          ),
          array(
              'num' => '06',
              'title' => 'Agricultural & Farm-Specific Steel Structures',
              'desc' => 'Agriculture demands specialized buildings that resist corrosion, provide optimal ventilation, and shield livestock or harvested grains from extreme weather. We build durable agro-industrial infrastructures.',
              'bullets' => array('Bio-secure poultry sheds, dairy barns, and aquaculture units', 'Cold storage grain warehouses and seed germination facilities', 'Corrosion-resistant epoxy and hot-dip galvanized finishes'),
              'cta' => 'Inquire for Agricultural Sheds',
              'img' => 'https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?q=80&w=800&auto=format&fit=crop'
          )
      );

      $idx = 0;
      foreach ($service_data as $s) : $idx++;
          $is_even = ($idx % 2 === 0);
      ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center; margin-bottom: 5rem;">
          <div <?php echo $is_even ? 'style="order: 2;"' : ''; ?>>
            <span class="badge badge-accent" style="margin-bottom: 0.75rem;">Service <?php echo esc_html($s['num']); ?></span>
            <h2><?php echo esc_html($s['title']); ?></h2>
            <p><?php echo esc_html($s['desc']); ?></p>
            <ul style="margin: 1.25rem 0; display: flex; flex-direction: column; gap: 0.5rem; color: var(--color-text-dark);">
              <?php foreach ($s['bullets'] as $b) : ?>
                <li><i class="fa-solid fa-check" style="color: var(--color-accent); margin-right: 6px;"></i> <?php echo esc_html($b); ?></li>
              <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="margin-top: 0.5rem;"><?php echo esc_html($s['cta']); ?></a>
          </div>
          <div <?php echo $is_even ? 'style="order: 1;"' : ''; ?>>
            <img src="<?php echo esc_url($s['img']); ?>" alt="<?php echo esc_attr($s['title']); ?>" style="border-radius: var(--radius-md); box-shadow: var(--shadow-lg); width: 100%; height: 360px; object-fit: cover;">
          </div>
        </div>
      <?php endforeach; ?>
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
