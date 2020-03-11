<?php
require_once '../../../../wp-load.php';

$junior_member= isset( $_POST['junior_member'] ) ? $_POST['junior_member'] : 1;
$ajax_query = new WP_Query(
  array(
    'post_type' => 'post',
    'post_type' => 'junior_member',
    'p'=>$junior_member
  )
);
?>
<?php if ( $ajax_query->have_posts() ) : ?>
  <?php while ( $ajax_query->have_posts() ) : ?>
    <?php $ajax_query->the_post(); ?>
                        <h4 class="c-page-section__title">
                          <?php the_title();?>
                        </h4>
                        <table class="c-table u-m-top40">
                        <thead>
                        <tr>
                        <td>少年団名</td>
                        <td>連絡担当者</td>
                        <td>連絡先</td>
                        <td>活動場所</td>
                        <td>活動曜日</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(have_rows('junior_member_info')): ?>
                        <?php while(have_rows('junior_member_info')): the_row(); ?>
                        <tr>
                        <td><?php the_sub_field("junior_member_info_name")?></td>
                        <td><?php the_sub_field("junior_member_info_person")?></td>
                        <td><?php the_sub_field("junior_member_info_address")?></td>
                        <td><?php the_sub_field("junior_member_info_place")?></td>
                        <td><?php the_sub_field("junior_member_info_date")?></td>
                      </tr>
                        <?php endwhile;?>
                        <?php endif;?>
</tbody>
                        </table>
                  <?php endwhile; ?>
<?php endif; ?>
<?php
wp_reset_postdata();


