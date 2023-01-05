<?php
/**
 * Template Name: 固定ページ - スポーツ少年団
 * Template Post Type: post, page

 */
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
<main class="l-main">
      <?php get_template_part('template-parts/page-mv-junior'); ?>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <?php the_content(); ?>
            </div>
          </div>
          <?php get_template_part('advertise_banner'); ?>
      </main>
      <?php endwhile;?>
<?php endif; ?>



<?php
get_footer();
