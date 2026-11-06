<?php
/**
 * Template Name: Products Catalog
 * 
 * Steel Villa Industrial Steel Products Template - 100% Pixel-Perfect Match
 */

get_header();

$products_query = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
));
?>

  <!-- Page Header Hero -->
  <section style="background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(40,22,14,0.95) 100%), url('https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=1600&auto=format&fit=crop') center/cover; color: #FFF; padding: 5rem 0;">
    <div class="container" style="text-align: center; max-width: 800px;">
      <span class="badge badge-accent" style="margin-bottom: 1rem;"><?php _e('Certified Industrial Supply', 'steelvilla'); ?></span>
      <h1 style="color: #FFF; margin-bottom: 1rem;"><?php _e('Industrial Steel Products', 'steelvilla'); ?></h1>
      <p style="font-size: 1.15rem; color: #E2E4EB;"><?php _e('High-grade structural steel components, pipes, plates, coils, and fittings conforming to ANSI, ASTM, DIN, JIS, and international standards.', 'steelvilla'); ?></p>
    </div>
  </section>

  <!-- 19 Products Catalog Grid (CPT product) -->
  <section class="section-padding">
    <div class="container">
      <div class="products-grid">
        <?php if ($products_query->have_posts()) : ?>
          <?php while ($products_query->have_posts()) : $products_query->the_post(); 
            $title = get_the_title();
            $img   = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=500&auto=format&fit=crop';
            
            $prod_key = 'default';
            $category_badge = 'Structural';
            if (stripos($title, 'flange') !== false) {
                $prod_key = 'flanges';
                $category_badge = 'Piping Tech';
                $img = 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=500&auto=format&fit=crop';
            } elseif (stripos($title, 'elbow') !== false) {
                $prod_key = 'elbow';
                $category_badge = 'Fittings';
                $img = 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=500&auto=format&fit=crop';
            } elseif (stripos($title, 'pipe') !== false || stripos($title, 'tube') !== false) {
                $category_badge = 'Hollow Sections';
                $img = 'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=500&auto=format&fit=crop';
            } elseif (stripos($title, 'coil') !== false || stripos($title, 'roll') !== false) {
                $category_badge = 'Coils';
                $img = 'https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?q=80&w=500&auto=format&fit=crop';
            } elseif (stripos($title, 'plate') !== false || stripos($title, 'sheet') !== false) {
                $category_badge = 'Plates';
                $img = 'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=500&auto=format&fit=crop';
            }
          ?>
            <div class="product-card">
              <div class="product-thumb">
                <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
              </div>
              <div class="product-content">
                <h3 class="product-title"><?php the_title(); ?></h3>
                <p class="product-snippet"><?php echo esc_html(get_the_excerpt() ?: get_the_content()); ?></p>
                <div class="product-actions">
                  <span class="badge badge-category"><?php echo esc_html($category_badge); ?></span>
                  <button class="btn-specs" data-product="<?php echo esc_attr($prod_key); ?>"><?php _e('View Specs', 'steelvilla'); ?> <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 4px;"></i></button>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Product Technical Specifications Modal Dialog -->
  <div class="modal-overlay" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-container">
      <button class="modal-close" aria-label="Close dialog"><i class="fa-solid fa-xmark"></i></button>
      <span class="badge badge-accent" style="margin-bottom: 0.5rem;"><?php _e('Technical Data Sheet', 'steelvilla'); ?></span>
      <h2 class="modal-title" style="margin-bottom: 1.25rem;"><?php _e('Product Specifications', 'steelvilla'); ?></h2>

      <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.95rem;">
        <div style="background-color: var(--color-bg-gray); padding: 0.85rem 1rem; border-radius: var(--radius-sm);">
          <strong><?php _e('Manufactured Types:', 'steelvilla'); ?></strong>
          <div class="modal-types" style="color: var(--color-text-dark); margin-top: 0.25rem;">Standard structural sections.</div>
        </div>
        <div style="background-color: var(--color-bg-gray); padding: 0.85rem 1rem; border-radius: var(--radius-sm);">
          <strong><?php _e('Sealing / Connection Faces:', 'steelvilla'); ?></strong>
          <div class="modal-sealing" style="color: var(--color-text-dark); margin-top: 0.25rem;">Bolted, welded, or threaded.</div>
        </div>
        <div style="background-color: var(--color-bg-gray); padding: 0.85rem 1rem; border-radius: var(--radius-sm);">
          <strong><?php _e('Surface Finish Technology:', 'steelvilla'); ?></strong>
          <div class="modal-finish" style="color: var(--color-text-dark); margin-top: 0.25rem;">Anti-rust primer, hot dip galvanized, or electrostatic powder coating.</div>
        </div>
        <div style="background-color: var(--color-bg-gray); padding: 0.85rem 1rem; border-radius: var(--radius-sm);">
          <strong><?php _e('Production Technique:', 'steelvilla'); ?></strong>
          <div class="modal-production" style="color: var(--color-text-dark); margin-top: 0.25rem;">Hot rolling, precision forging, CNC plasma profiling.</div>
        </div>
        <div style="background-color: var(--color-soft-blue); padding: 0.85rem 1rem; border-radius: var(--radius-sm); border-left: 3px solid var(--color-navy);">
          <strong style="color: var(--color-navy);"><?php _e('Compliance Standards:', 'steelvilla'); ?></strong>
          <div class="modal-standards" style="color: var(--color-navy); margin-top: 0.25rem;">ASTM, ANSI, EN, DIN, JIS, GOST.</div>
        </div>
      </div>

      <div style="margin-top: 1.5rem; text-align: right;">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="padding: 0.65rem 1.25rem; font-size: 0.9rem;"><?php _e('Request Product Quote', 'steelvilla'); ?></a>
      </div>
    </div>
  </div>

  <!-- CTA Banner -->
  <section class="cta-banner">
    <div class="container">
      <h2><?php _e('Need Large Volume Structural Steel Procurement?', 'steelvilla'); ?></h2>
      <p><?php _e('Contact our commercial supply division for mill certificates, custom slitting, delivery schedules, and contract pricing.', 'steelvilla'); ?></p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary"><?php _e('Contact Sales Team', 'steelvilla'); ?></a>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', steelvilla_get_contact('phone_1'))); ?>" class="btn btn-outline">
          <i class="fa-solid fa-phone" style="margin-right: 6px;"></i> <?php _e('Call:', 'steelvilla'); ?> <?php echo esc_html(steelvilla_get_contact('phone_1')); ?>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
