<?php
/**
 * Standard Archive Template
 */

get_header();
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php the_archive_title(); ?></h1>
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'steelvilla'); ?></a> / 
        <span><?php the_archive_title(); ?></span>
      </div>
    </div>
  </section>

  <!-- Archive Content -->
  <section class="section">
    <div class="container" style="max-width: 900px;">
      <?php if (have_posts()) : ?>
        <div style="display: flex; flex-direction: column; gap: 2.5rem;">
          <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> style="padding: 2rem;">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p style="font-size: 0.85rem; color: var(--color-accent); margin-bottom: 1rem;">
                <i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date(); ?> | <i class="fa-solid fa-user"></i> <?php the_author(); ?>
              </p>
              <div style="margin-bottom: 1.5rem;">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn-read-more"><?php _e('Read Article', 'steelvilla'); ?> &rarr;</a>
            </article>
          <?php endwhile; ?>
        </div>

        <div style="margin-top: 3rem; text-align: center;">
          <?php the_posts_pagination(array('prev_text' => '&larr;', 'next_text' => '&rarr;')); ?>
        </div>
      <?php else : ?>
        <p><?php _e('No posts found.', 'steelvilla'); ?></p>
      <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
