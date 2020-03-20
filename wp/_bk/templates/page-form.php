<?php
/**
 * Template Name: フォーム
 * Template Post Type: post, page

 */
get_header();
$form_id=$_GET["id"];
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
<main class="l-main">     
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
			  <div class="p-contact">
          <?php echo do_shortcode( '[mwform_formkey key="'.$form_id.'"]' ); ?>
				  </div>
            </div>
          </div>
     
      </main>
      <?php endwhile;?>
<?php endif; ?>



<?php
get_footer();
