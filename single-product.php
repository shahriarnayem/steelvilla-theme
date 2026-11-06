<?php
/**
 * Single Product Detail Template
 */

get_header();

while (have_posts()) : the_post();
    $grade    = get_post_meta(get_the_ID(), '_steelvilla_product_grade', true) ?: 'Q235B / Q345B';
    $standard = get_post_meta(get_the_ID(), '_steelvilla_product_standard', true) ?: 'ASTM A36 / JIS G3101';
    $specs    = get_post_meta(get_the_ID(), '_steelvilla_product_specs', true);
    $img      = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1000&auto=format&fit=crop';
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Certified Structural Steel Raw Material & Engineering Supplies', 'steelvilla'); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('products', home_url('/products/'))); ?>"><?php _e('Products', 'steelvilla'); ?></a> / 
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Product Details Section -->
  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: flex-start; flex-wrap: wrap;">
        <div>
          <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid #eee;">
            <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 420px; object-fit: cover; display: block;">
          </div>
        </div>

        <div>
          <span class="badge badge-accent" style="margin-bottom: 0.75rem;"><?php _e('Mill Test Certified', 'steelvilla'); ?></span>
          <h2 style="margin-bottom: 1rem; color: var(--color-primary);"><?php the_title(); ?></h2>
          <div class="post-content" style="margin-bottom: 1.5rem;">
            <?php the_content(); ?>
          </div>

          <table style="width: 100%; border-collapse: collapse; margin-bottom: 2rem;">
            <tr>
              <th style="padding: 0.75rem; background: #f8f9fa; border: 1px solid #eee; text-align: left;"><?php _e('Material Grade:', 'steelvilla'); ?></th>
              <td style="padding: 0.75rem; border: 1px solid #eee;"><?php echo esc_html($grade); ?></td>
            </tr>
            <tr>
              <th style="padding: 0.75rem; background: #f8f9fa; border: 1px solid #eee; text-align: left;"><?php _e('Standard Specification:', 'steelvilla'); ?></th>
              <td style="padding: 0.75rem; border: 1px solid #eee;"><?php echo esc_html($standard); ?></td>
            </tr>
            <tr>
              <th style="padding: 0.75rem; background: #f8f9fa; border: 1px solid #eee; text-align: left;"><?php _e('Supply Packaging:', 'steelvilla'); ?></th>
              <td style="padding: 0.75rem; border: 1px solid #eee;">Bundled / Export Standard Container</td>
            </tr>
          </table>

          <a href="<?php echo esc_url(steelvilla_get_page_link_by_slug('contact', home_url('/contact/'))); ?>" class="btn btn-primary" style="padding: 0.85rem 2rem;">
            <i class="fa-solid fa-envelope" style="margin-right: 6px;"></i> <?php _e('Request Price Quote', 'steelvilla'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
