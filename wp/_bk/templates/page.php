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
        <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title"><?php the_title(); ?></h2>
        </div>
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
