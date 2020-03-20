<?php
/**
 * Template Name: 固定ページ - お問い合わせ
 * Template Post Type: post, page

 */
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
<main class="l-main">     
<?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
			  <div class="p-contact">
          <?php echo do_shortcode('[mwform_formkey key="1036"]'); ?>
				  </div>
            </div>
          </div>
      </main>
      <?php endwhile;?>
<?php endif; ?>



<?php
get_footer();
