<?php
require_once '../../../../wp-load.php';

$member= isset( $_POST['member'] ) ? $_POST['member'] : 1;
$ajax_query = new WP_Query(
  array(
    'post_type' => 'member',
    'p'=>$member
  )
);
?>
<?php if ( $ajax_query->have_posts() ) : ?>
  <?php while ( $ajax_query->have_posts() ) : ?>
    <?php $ajax_query->the_post(); ?>
    <div
                    class="p-member__modal__head"
                    style="background-image:url(<?php the_field("member_thumbnail"); ?>)"
                  >
                    <h4 class="p-member__modal__title"><?php the_title();?></h4>
                  </div>
                  <div
                    class="p-member__modal__body">
<?php if(get_field("member_info")):the_field("member_info");endif;?>
                  <?php endwhile; ?>
<?php endif; ?>
<?php
wp_reset_postdata();
?>

</div>