<?php
/**
 * Template Name: Products Catalog
 * 
 * Steel Villa Industrial Steel Products Template
 */

get_header();

$products_query = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
));
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Industrial Structural Steel Raw Materials, Sections & Component Supplies', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Products Catalog Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <span class="badge badge-accent"><?php _e('Certified Supplies', 'steelvilla'); ?></span>
        <h2><?php _e('Structural Steel Products & Engineering Supplies', 'steelvilla'); ?></h2>
        <p><?php _e('Certified to international standards (ASTM, JIS, EN, GB) with mill test certificates and rapid nationwide supply.', 'steelvilla'); ?></p>
      </div>

      <div class="products-grid">
        <?php if ($products_query->have_posts()) : ?>
          <?php while ($products_query->have_posts()) : $products_query->the_post(); 
            $grade    = get_post_meta(get_the_ID(), '_steelvilla_product_grade', true) ?: 'Q235B / Q345B / SS304';
            $standard = get_post_meta(get_the_ID(), '_steelvilla_product_standard', true) ?: 'ASTM A36, JIS G3101';
            $specs    = get_post_meta(get_the_ID(), '_steelvilla_product_specs', true);
            $img      = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&auto=format&fit=crop';
          ?>
            <div class="product-card">
              <div class="product-image-box">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
              </div>
              <div class="product-body">
                <span class="product-badge"><i class="fa-solid fa-certificate" style="margin-right: 4px;"></i> <?php echo esc_html($grade); ?></span>
                <h3 class="product-title"><?php the_title(); ?></h3>
                <p class="product-desc"><?php echo esc_html(get_the_excerpt() ?: get_the_content()); ?></p>
                <div class="product-specs">
                  <span><strong><?php _e('Standard:', 'steelvilla'); ?></strong> <?php echo esc_html($standard); ?></span>
                  <span><strong><?php _e('Application:', 'steelvilla'); ?></strong> <?php _e('PEB & Heavy Civil', 'steelvilla'); ?></span>
                </div>
                <button class="btn btn-primary btn-specs" style="width: 100%; margin-top: 1rem; padding: 0.6rem;" data-product="<?php echo esc_attr(get_the_title()); ?>" data-grade="<?php echo esc_attr($grade); ?>" data-std="<?php echo esc_attr($standard); ?>">
                  <i class="fa-solid fa-list-check" style="margin-right: 4px;"></i> <?php _e('View Full Specs', 'steelvilla'); ?>
                </button>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Product Specifications Modal -->
  <div class="specs-modal" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.7); z-index: 10000; align-items: center; justify-content: center; padding: 1.5rem;">
    <div style="background-color: var(--color-white); width: 100%; max-width: 600px; border-radius: var(--radius-md); padding: 2rem; position: relative;">
      <button class="specs-modal-close" style="position: absolute; top: 1rem; right: 1.25rem; font-size: 1.5rem; background: none; border: none; cursor: pointer; color: var(--color-primary);">&times;</button>
      <h3 id="modal-product-title" style="margin-bottom: 0.5rem; color: var(--color-primary);">Product Technical Specs</h3>
      <div id="modal-product-subtitle" class="badge badge-accent" style="margin-bottom: 1.5rem;">Mill Certified</div>
      <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
        <tr>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee; font-weight: 600;">Available Grades:</td>
          <td id="modal-product-grade" style="padding: 0.6rem; border-bottom: 1px solid #eee;">Q235B, Q345B, SS304</td>
        </tr>
        <tr>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee; font-weight: 600;">International Standards:</td>
          <td id="modal-product-std" style="padding: 0.6rem; border-bottom: 1px solid #eee;">ASTM, JIS, EN, GB</td>
        </tr>
        <tr>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee; font-weight: 600;">Tensile Strength:</td>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee;">375 - 500 MPa</td>
        </tr>
        <tr>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee; font-weight: 600;">Yield Strength:</td>
          <td style="padding: 0.6rem; border-bottom: 1px solid #eee;">≥ 235 - 345 MPa</td>
        </tr>
        <tr>
          <td style="padding: 0.6rem; font-weight: 600;">Supply Capability:</td>
          <td style="padding: 0.6rem;">Container Bulk or Tailored Cut-to-Length</td>
        </tr>
      </table>
      <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
        <?php _e('Inquire About Bulk Pricing', 'steelvilla'); ?>
      </a>
    </div>
  </div>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="container cta-inner">
      <div>
        <h2><?php _e('Need Custom Steel Fabrication or Raw Materials?', 'steelvilla'); ?></h2>
        <p><?php _e('We maintain extensive stock of high-tensile structural beams, plates, and coils ready for immediate dispatch.', 'steelvilla'); ?></p>
      </div>
      <div class="cta-buttons">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Request Wholesale Quote', 'steelvilla'); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
