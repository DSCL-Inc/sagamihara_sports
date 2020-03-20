<?php
require_once '../../../../wp-load.php';

$member= isset( $_POST['member'] ) ? $_POST['member'] : 1;
$ajax_query = new WP_Query(
  array(
    'post_type' => 'junior_member',
    'p'=>$member
  )
);
?>

<?php if ( $ajax_query->have_posts() ) : ?>
  <?php while ( $ajax_query->have_posts() ) : ?>
    <?php $ajax_query->the_post(); ?>
    <div
                    class="p-member__modal__head"
                    style="background-image:url(../assets/image/p-spotch_canoe.png)"
                  >
                    <h4 class="p-member__modal__title"><?php the_title();?></h4>
                  </div>
                  <div class="p-member__modal__body">
					  <div class="p-member__modal__table p-member__modal__table--vertical">
                      <?php if(get_field("junior_member_info")):the_field("junior_member_info");endif;?>
						   </div>
                  <?php endwhile; ?>
<?php endif; ?>

<?php
wp_reset_postdata();
?>
</div>

