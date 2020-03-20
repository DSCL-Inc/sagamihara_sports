<?php
/**
 * Template Name: 固定ページ
 * Template Post Type: post, page

 */
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
<main class="l-main">     
<?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <?php the_content(); ?>
            </div>
          </div>
     
      </main>
      <?php endwhile;?>
<?php endif; ?>



<?php
get_footer();
