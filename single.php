<?php
/**
 * Single Blog Post Template
 */

get_header();

while (have_posts()) : the_post();
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p><i class="fa-solid fa-calendar-days" style="color: var(--color-accent); margin-right: 4px;"></i> <?php echo get_the_date(); ?> | <i class="fa-solid fa-user" style="color: var(--color-accent); margin-right: 4px;"></i> <?php the_author(); ?></p>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / <span><?php the_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Post Content -->
  <section class="section">
    <div class="container" style="max-width: 900px;">
      <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
        <?php if (has_post_thumbnail()) : ?>
          <div style="margin-bottom: 2rem; border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md);">
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

        <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid #eee; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
          <div><?php previous_post_link('&larr; %link'); ?></div>
          <div><?php next_post_link('%link &rarr;'); ?></div>
        </div>
      </article>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
