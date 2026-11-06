<?php
/**
 * Template Name: About Us
 * 
 * Steel Villa About Us Page Template
 */

get_header();

$page_meta = get_post_meta(get_the_ID(), '_steelvilla_page_meta', true);
if (!is_array($page_meta)) $page_meta = array();

$subtitle = $page_meta['about_subtitle'] ?? 'Building the Future with Strength and Precision';
$story_1  = $page_meta['about_story_1'] ?? 'Steel Villa LTD. is a premier structural engineering and Pre-Engineered Steel Building (PEB) construction firm established in Bangladesh. With comprehensive in-house design, cutting-edge fabrication facilities, and certified civil erection capabilities, we engineer industrial spaces that endure.';
$story_2  = $page_meta['about_story_2'] ?? 'From sprawling industrial warehouses and heavy manufacturing factories to complex multi-storey commercial complexes, our expert engineers adhere to international BNBC, AISC, and AWS welding standards.';
$mission  = $page_meta['about_mission'] ?? 'Built to Last. Designed to Lead. We deliver uncompromised structural engineering solutions that empower Bangladeshi industries to thrive with safety, sustainability, and technological precision.';
$vision   = $page_meta['about_vision'] ?? 'To be the most trusted, innovative, and sustainable Pre-Engineered Steel Building and civil construction powerhouse in South Asia.';

$execs = array(
    array(
        'name' => $page_meta['exec_1_name'] ?? 'Md Arif Hossain',
        'role' => $page_meta['exec_1_role'] ?? 'Chairman',
        'img'  => $page_meta['exec_1_img'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600&auto=format&fit=crop'
    ),
    array(
        'name' => $page_meta['exec_2_name'] ?? 'Md Tufique',
        'role' => $page_meta['exec_2_role'] ?? 'Managing Director',
        'img'  => $page_meta['exec_2_img'] ?? 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=600&auto=format&fit=crop'
    ),
    array(
        'name' => $page_meta['exec_3_name'] ?? 'Md Mamun',
        'role' => $page_meta['exec_3_role'] ?? 'Director',
        'img'  => $page_meta['exec_3_img'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop'
    )
);
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html($subtitle); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Story & Mission Section -->
  <section class="section">
    <div class="container">
      <div class="welcome-grid">
        <div>
          <span class="badge badge-accent" style="margin-bottom: 0.75rem;"><?php _e('Our Legacy', 'steelvilla'); ?></span>
          <h2><?php _e('Pioneering Industrial Steel Construction in Bangladesh', 'steelvilla'); ?></h2>
          <p style="margin-bottom: 1.25rem;"><?php echo esc_html($story_1); ?></p>
          <p style="margin-bottom: 1.75rem;"><?php echo esc_html($story_2); ?></p>

          <div style="background-color: var(--color-soft-blue); padding: 1.5rem; border-left: 4px solid var(--color-accent); border-radius: var(--radius-sm); margin-bottom: 1.5rem;">
            <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;"><i class="fa-solid fa-bullseye" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('Our Mission', 'steelvilla'); ?></h4>
            <p style="margin: 0; font-size: 0.95rem;"><?php echo esc_html($mission); ?></p>
          </div>

          <div style="background-color: var(--color-soft-blue); padding: 1.5rem; border-left: 4px solid var(--color-primary); border-radius: var(--radius-sm);">
            <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;"><i class="fa-solid fa-eye" style="color: var(--color-accent); margin-right: 6px;"></i> <?php _e('Our Vision', 'steelvilla'); ?></h4>
            <p style="margin: 0; font-size: 0.95rem;"><?php echo esc_html($vision); ?></p>
          </div>
        </div>

        <div class="welcome-image">
          <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=800&auto=format&fit=crop" alt="Steel Villa Engineering Operations">
        </div>
      </div>
    </div>
  </section>

  <!-- Executive Leadership Section -->
  <section class="section" style="background-color: var(--color-soft-blue);">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Executive Board', 'steelvilla'); ?></span>
        <h2><?php _e('Leadership Driven by Engineering Passion', 'steelvilla'); ?></h2>
        <p><?php _e('Guided by experienced industry pioneers committed to safety, innovation, and client value.', 'steelvilla'); ?></p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
        <?php foreach ($execs as $e) : ?>
          <div class="card" style="text-align: center; padding: 2rem 1.5rem;">
            <div style="width: 140px; height: 140px; margin: 0 auto 1.5rem; border-radius: 50%; overflow: hidden; border: 4px solid var(--color-accent);">
              <img src="<?php echo esc_url($e['img']); ?>" alt="<?php echo esc_attr($e['name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 style="margin-bottom: 0.25rem; font-size: 1.3rem;"><?php echo esc_html($e['name']); ?></h3>
            <div class="badge badge-accent" style="margin-bottom: 1rem;"><?php echo esc_html($e['role']); ?></div>
            <p style="font-size: 0.9rem; color: var(--color-text); margin: 0;">
              <?php _e('Dedicated to excellence and structural safety across industrial construction in Bangladesh.', 'steelvilla'); ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Core Corporate Values -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Guiding Principles', 'steelvilla'); ?></span>
        <h2><?php _e('Core Corporate Values', 'steelvilla'); ?></h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2.2rem; margin-bottom: 1rem;"><i class="fa-solid fa-award"></i></div>
          <h3><?php _e('Quality First', 'steelvilla'); ?></h3>
          <p><?php _e('Zero compromises on steel grades, automated welding standards, or structural tolerances.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2.2rem; margin-bottom: 1rem;"><i class="fa-solid fa-lightbulb"></i></div>
          <h3><?php _e('Engineering Innovation', 'steelvilla'); ?></h3>
          <p><?php _e('Leveraging advanced 3D structural modeling and TEKLA software for optimized load distribution.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2.2rem; margin-bottom: 1rem;"><i class="fa-solid fa-handshake"></i></div>
          <h3><?php _e('Client Partnership', 'steelvilla'); ?></h3>
          <p><?php _e('Transparent pricing, milestone reporting, and dedicated post-handover technical support.', 'steelvilla'); ?></p>
        </div>
        <div class="card" style="padding: 2rem;">
          <div style="color: var(--color-accent); font-size: 2.2rem; margin-bottom: 1rem;"><i class="fa-solid fa-leaf"></i></div>
          <h3><?php _e('Eco Sustainability', 'steelvilla'); ?></h3>
          <p><?php _e('100% recyclable structural steel fabrication minimizing jobsite waste and carbon footprints.', 'steelvilla'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- 10-Item FAQ Accordion -->
  <section class="section" style="background-color: var(--color-soft-blue);">
    <div class="container" style="max-width: 900px;">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Common Inquiries', 'steelvilla'); ?></span>
        <h2><?php _e('Frequently Asked Questions', 'steelvilla'); ?></h2>
      </div>

      <div class="faq-accordion">
        <?php
        $faqs = array(
            array('q' => 'What services does Steel Villa offer?', 'a' => 'Steel Villa LTD. provides end-to-end Pre-Engineered Steel Building (PEB) design, structural steel fabrication, foundation civil engineering, modernization, and on-site assembly for industrial factories, warehouses, and commercial buildings.'),
            array('q' => 'What is a pre-engineered steel building (PEB)?', 'a' => 'A PEB is a building engineered at a manufacturing plant and assembled on-site using bolted connections. PEBs provide superior strength-to-weight ratios, faster completion schedules, and cost savings over traditional RCC.'),
            array('q' => 'How long does it take to complete a PEB project?', 'a' => 'Standard industrial sheds and warehouses are typically designed, fabricated, and erected within 60 to 120 days, roughly 30% to 50% faster than conventional concrete structures.'),
            array('q' => 'Is customization available for steel buildings?', 'a' => 'Yes! Every Steel Villa structure is 100% customized for clearance height, bay spacing, overhead crane capacities, mezzanine levels, and architectural facades.'),
            array('q' => 'Are PEBs suitable for multi-storey buildings?', 'a' => 'Absolutely. Multi-storey industrial complexes, corporate office towers, and distribution centers are routinely engineered using composite steel decking and high-tensile framing.'),
            array('q' => 'Do you also provide foundation and civil work?', 'a' => 'Yes. Steel Villa delivers turnkey construction covering soil analysis, piling, RCC foundation casting, anchor bolt setting, and final roof cladding.'),
            array('q' => 'What are the cost advantages of using PEBs?', 'a' => 'PEBs reduce foundation loads, eliminate on-site fabrication delays, reduce labor requirements, and offer clear spans without obstructing interior columns.'),
            array('q' => 'What materials and standards do you use?', 'a' => 'We utilize prime certified steel plates and coils conforming to ASTM A572 Grade 50, JIS, and BNBC standards with certified submerged arc welding (SAW).'),
            array('q' => 'Do you offer post-construction support?', 'a' => 'Yes. Every project includes structured warranties, structural inspection schedules, and comprehensive maintenance support.'),
            array('q' => 'How can I request a quote?', 'a' => 'You can request a quote by visiting our Contact page, calling our direct lines (+8801721237381 / +8801712951990), or emailing your project drawings to info@steelvillabd.com.')
        );
        foreach ($faqs as $idx => $faq) : ?>
          <div class="faq-item <?php echo ($idx === 0) ? 'open' : ''; ?>">
            <div class="faq-question">
              <span><?php echo esc_html($faq['q']); ?></span>
              <span class="faq-toggle"><i class="fa-solid fa-chevron-down"></i></span>
            </div>
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
    <div class="container cta-inner">
      <div>
        <h2><?php _e('Partner with Steel Villa on Your Next Project', 'steelvilla'); ?></h2>
        <p><?php _e('Connect with our executive engineering team for architectural concepts, structural analysis, and transparent proposals.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Contact Us Today', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
