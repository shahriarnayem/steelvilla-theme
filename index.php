<?php
/**
 * Main Index Fallback Template
 */

get_header();
?>

  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
  </section>

  <!-- Content Section -->
  <section class="section">
    <div class="container" style="max-width: 900px;">
      <?php if (have_posts()) : ?>
        <div style="display: flex; flex-direction: column; gap: 2.5rem;">
          <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> style="padding: 2rem;">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div style="margin: 1rem 0;">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn-read-more"><?php _e('Read More', 'steelvilla'); ?> &rarr;</a>
            </article>
          <?php endwhile; ?>
        </div>

        <div style="margin-top: 3rem; text-align: center;">
          <?php the_posts_pagination(); ?>
        </div>
      <?php else : ?>
        <p><?php _e('No content available.', 'steelvilla'); ?></p>
      <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
