<?php
/**
 * Default Page Template
 */

get_header();

while (have_posts()) : the_post();
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Page Content -->
  <section class="section">
    <div class="container" style="max-width: 960px;">
      <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
        <?php if (has_post_thumbnail()) : ?>
          <div style="margin-bottom: 2rem; border-radius: var(--radius-md); overflow: hidden;">
            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block;')); ?>
          </div>
        <?php endif; ?>

        <?php the_content(); ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'steelvilla'),
            'after'  => '</div>',
        ));
        ?>
      </article>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
