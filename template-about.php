<?php
/**
 * Template Name: About Us
 * 
 * Steel Villa About Us Page Template - 100% Pixel-Perfect Match
 */

get_header();

$page_meta = get_post_meta(get_the_ID(), '_steelvilla_page_meta', true);
if (!is_array($page_meta)) $page_meta = array();

$subtitle = $page_meta['about_subtitle'] ?? 'Steel Villa LTD delivers durable, innovative, and reliable steel structures with unmatched craftsmanship and engineering compliance across Bangladesh.';
$mission  = $page_meta['about_mission'] ?? 'To engineer and construct world-class steel buildings that maximize operational productivity, safeguard capital investments, and elevate environmental sustainability.';

$execs = array(
    array(
        'name' => $page_meta['exec_1_name'] ?? 'Md Arif Hossain',
        'role' => $page_meta['exec_1_role'] ?? 'Chairman',
        'bio'  => 'Directing strategic corporate vision, quality governance, and stakeholder alignment across international supply chains.',
        'img'  => $page_meta['exec_1_img'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop'
    ),
    array(
        'name' => $page_meta['exec_2_name'] ?? 'Md Tufique',
        'role' => $page_meta['exec_2_role'] ?? 'Managing Director',
        'bio'  => 'Spearheading operational execution, plant automation, turnkey contracts, and structural engineering compliance.',
        'img'  => $page_meta['exec_2_img'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop'
    ),
    array(
        'name' => $page_meta['exec_3_name'] ?? 'Md Mamun',
        'role' => $page_meta['exec_3_role'] ?? 'Director',
        'bio'  => 'Managing procurement logistics, worksite civil engineering, client relations, and quality management systems.',
        'img'  => $page_meta['exec_3_img'] ?? 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600&auto=format&fit=crop'
    )
);
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-accent" style="margin-bottom: 1rem;"><?php _e('Who We Are', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Building the Future with Strength and Precision', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php echo esc_html($subtitle); ?></p>
    </div>
  </section>

  <!-- Our Story & Mission -->
  <section class="section-padding">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
        <div>
          <span class="section-subtitle"><?php _e('Our Journey', 'steelvilla'); ?></span>
          <h2 class="section-title"><?php _e('Built to Last. Designed to Lead.', 'steelvilla'); ?></h2>
          <p><?php _e('Founded on a mission to modernize Bangladesh\'s industrial landscape, Steel Villa LTD. brings decades of collective structural engineering expertise. We combine cutting-edge CAD/CAM technologies with automated steel processing to fabricate structures that stand resilient against weather, loads, and time.', 'steelvilla'); ?></p>
          <p><?php _e('Our commitment extends beyond engineering: we serve as strategic partners for manufacturing firms, textile mills, pharmaceutical groups, agricultural enterprises, and government projects.', 'steelvilla'); ?></p>
          <div style="background-color: var(--color-soft-blue); border-left: 4px solid var(--color-accent); padding: 1.25rem 1.5rem; border-radius: 0 var(--radius-sm) var(--radius-sm) 0; margin-top: 1.5rem;">
            <h4 style="color: var(--color-navy); margin-bottom: 0.25rem;"><?php _e('Our Mission: Empowering Your Vision', 'steelvilla'); ?></h4>
            <p style="margin-bottom: 0; font-size: 0.95rem; color: #4B5563;"><?php echo esc_html($mission); ?></p>
          </div>
        </div>
        <div>
          <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop" alt="Steel Fabrication Facility" style="border-radius: var(--radius-md); box-shadow: var(--shadow-lg); width: 100%; height: 400px; object-fit: cover;">
        </div>
      </div>
    </div>
  </section>

  <!-- Executive Leadership -->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-header">
        <span class="section-subtitle"><?php _e('Executive Team', 'steelvilla'); ?></span>
        <h2 class="section-title"><?php _e('Leadership Driving Our Growth', 'steelvilla'); ?></h2>
        <p class="section-desc"><?php _e('Guided by veteran leadership with comprehensive experience across civil engineering, fabrication, and project management.', 'steelvilla'); ?></p>
      </div>

      <div class="team-grid">
        <?php foreach ($execs as $e) : ?>
          <div class="team-card">
            <div class="team-image">
              <img src="<?php echo esc_url($e['img']); ?>" alt="<?php echo esc_attr($e['name']); ?>">
            </div>
            <div class="team-details">
              <h3 class="team-name"><?php echo esc_html($e['name']); ?></h3>
              <div class="team-role"><?php echo esc_html($e['role']); ?></div>
              <p style="font-size: 0.85rem; color: var(--color-text); margin-top: 0.5rem;"><?php echo esc_html($e['bio']); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Core Values -->
  <section class="section-padding">
    <div class="container">
      <div class="section-header">
        <span class="section-subtitle"><?php _e('Guiding Principles', 'steelvilla'); ?></span>
        <h2 class="section-title"><?php _e('What Drives Us: Quality, Integrity & Innovation', 'steelvilla'); ?></h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
        <div class="pillar-card" style="box-shadow: var(--shadow-sm); border-top-color: var(--color-accent);">
          <div class="pillar-icon"><i class="fa-solid fa-certificate"></i></div>
          <h3><?php _e('Uncompromising Quality', 'steelvilla'); ?></h3>
          <p><?php _e('Strict structural adherence to BNBC, AISC, and AWS standards. Every beam, purlin, and anchor bolt undergo certified testing.', 'steelvilla'); ?></p>
        </div>
        <div class="pillar-card" style="box-shadow: var(--shadow-sm); border-top-color: var(--color-navy);">
          <div class="pillar-icon"><i class="fa-solid fa-lightbulb"></i></div>
          <h3><?php _e('Engineering Innovation', 'steelvilla'); ?></h3>
          <p><?php _e('Continually upgrading fabrication technologies with high-accuracy CNC cutting, automated submerged arc welding, and 3D detailing.', 'steelvilla'); ?></p>
        </div>
        <div class="pillar-card" style="box-shadow: var(--shadow-sm); border-top-color: var(--color-accent);">
          <div class="pillar-icon"><i class="fa-solid fa-handshake"></i></div>
          <h3><?php _e('Customer Focus', 'steelvilla'); ?></h3>
          <p><?php _e('Transparent cost estimates, milestone tracking, and dedicated on-site project managers guaranteeing on-schedule handovers.', 'steelvilla'); ?></p>
        </div>
        <div class="pillar-card" style="box-shadow: var(--shadow-sm); border-top-color: var(--color-dark-bronze);">
          <div class="pillar-icon"><i class="fa-solid fa-leaf"></i></div>
          <h3><?php _e('Sustainability', 'steelvilla'); ?></h3>
          <p><?php _e('100% recyclable structural steel, optimized thermal roof insulation, and reduced material scrap ratios across all build phases.', 'steelvilla'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- 10-Item FAQ Accordion (From Elementor nested-accordion) -->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-header">
        <span class="section-subtitle"><?php _e('Got Questions?', 'steelvilla'); ?></span>
        <h2 class="section-title"><?php _e('Frequently Asked Questions (FAQ)', 'steelvilla'); ?></h2>
        <p class="section-desc"><?php _e('Learn more about Pre-Engineered Buildings, construction timelines, and our fabrication procedures.', 'steelvilla'); ?></p>
      </div>

      <div class="faq-list">
        <?php
        $faqs = array(
            array('q' => 'What services does Steel Villa offer?', 'a' => 'Steel Villa LTD. provides end-to-end Pre-Engineered Building (PEB) design, fabrication, and civil erection. Our scope includes architectural 3D modeling, factory sheds, multi-storey steel structures, warehouse logistics facilities, agricultural buildings, and structural modernization.'),
            array('q' => 'What is a pre-engineered steel building?', 'a' => 'A Pre-Engineered Building (PEB) is a steel structure built over a structural concept of primary frames, secondary framing (purlins/girts), roof and wall sheeting, and accessories. Major structural components are fabricated in a controlled factory environment and assembled on site with bolted connections.'),
            array('q' => 'How long does it take to complete a PEB project?', 'a' => 'PEB construction is up to 40% faster than conventional concrete. A standard 20,000 sq ft industrial shed typically takes 6 to 10 weeks from finalized design approval to complete on-site assembly, subject to foundation readiness.'),
            array('q' => 'Is customization available for steel buildings?', 'a' => 'Yes, 100% of our buildings are custom engineered. We tailor clear spans, eaves heights, crane girder systems, mezzanine floors, door openings, skylights, and architectural canopies to meet your exact manufacturing and operational requirements.'),
            array('q' => 'Are PEBs suitable for multi-storey buildings?', 'a' => 'Yes. We regularly design and construct multi-tier composite steel buildings including multi-storey textile facilities, corporate commercial towers, mezzanine warehouses, and industrial utility cores.'),
            array('q' => 'Do you also provide foundation and civil work?', 'a' => 'Yes, we offer comprehensive turnkey solutions encompassing geotechnical evaluation, foundation piling, reinforced concrete pedestals, anchor bolt alignment, civil slab flooring, and boundary infrastructure.'),
            array('q' => 'What are the cost advantages of using PEBs?', 'a' => 'PEBs reduce material wastage, require lighter foundations, eliminate recurring shuttering costs, and offer accelerated commissioning that generates revenue sooner.'),
            array('q' => 'What materials and standards do you use?', 'a' => 'We utilize prime certified steel plates and coils conforming to ASTM A572 Grade 50, JIS, and BNBC standards with certified submerged arc welding (SAW).'),
            array('q' => 'Do you offer post-construction support?', 'a' => 'Yes. Every project includes structured warranties, structural inspection schedules, and comprehensive maintenance support.'),
            array('q' => 'How can I request a quote?', 'a' => 'You can request a quote by visiting our Contact page, calling our direct lines (+8801721237381 / +8801712951990), or emailing your project drawings to info@steelvillabd.com.')
        );
        foreach ($faqs as $idx => $faq) : ?>
          <div class="faq-item <?php echo ($idx === 0) ? 'active' : ''; ?>">
            <button class="faq-question">
              <span><?php echo esc_html($faq['q']); ?></span>
              <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
              <p><?php echo esc_html($faq['a']); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
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
