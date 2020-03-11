<?php
/**
 * Template Name: アーカイブページ - 協会事業
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title"><?php the_title(); ?></h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <div class="c-page-section__body">
              <div class="p-calender-list">
				  <?php $month_reset=0; ?>
				  <?php $project_year = get_field('project_year');?>
				  <?php for($j =1;$j<=12;$j++):?>
				  <?php  if($j<=9):?>
				  		<?php  $month=$j+3;?>  
				  <?php  else:?> 
				  <?php
				  if($month_reset):
				  $month++;
				  else:
				   $month=1;
				  $project_year+=1;
				   $month_reset=1;
				  endif;
				  ?>
				  <?php  endif;?>
				   <?php 
							$args[$j] = array(
								'wildcard_meta_key' => true,
								'post_type' => 'project', 
								'posts_per_page' => -1,
							//	'orderby' => 'meta_value',
							//	'meta_key' => 'project_date_%_project_date_item',
								'meta_query'=>array(
									'relation'=>'AND',
									'key'=>get_field("project_year"),
										array(
										   //'key'=>'project_date_%_project_date_item',
											'value'=>array(date( $project_year.'/'.$month.'/01'),date( $project_year.'/'.$month.'/30')),
											'compare'=>'BETWEEN',
											'type' => 'DATE',
										)
								)							
);								
    $posts[$j] = get_posts( $args[$j] );
    if( $posts[$j] ) : ?>
              <div class="p-calender-list__row">
                <div class="p-calender-list__row__head"><?php echo $month;?>月</div>
                <div class="p-calender-list__row__body">
                <?php 
               
                ?>
               <?php foreach( $posts[$j] as $post ) : setup_postdata( $post ); ?>		
					<?php
					
    				$date_from_get = get_sub_field( 'project_date_item');
					$date_to_get = get_sub_field( 'project_date_item_to');
						?>
					
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
                    <?php if(have_rows('project_date')): ?>
						<?php $i=0;?>
                    		<?php while(have_rows('project_date')): the_row(); ?>								
										<?php if($i>0): echo "・";endif;?>
										 <?php if(get_sub_field("project_date_item_to")):?>
												<?php the_sub_field( 'project_date_item');?>
												<?php echo "〜";?>
										  		<?php the_sub_field( 'project_date_item_to');?>日
										<?php else:?>
												<?php the_sub_field( 'project_date_item');?>日
										<?php endif;?>
										<?php $i++;?>
								<?php endwhile; ?>
                    <?php endif;?>
                    </div>
                    <div class="p-calender-list__item__title">
                    <?php the_title(); ?>
                    </div>
                    <?php if(get_field("project_thumbnail")):?>
                    <div class="p-calender-list__item__img">
                      <img src="<?php the_field("project_thumbnail")?>" alt="<?php the_title(); ?>" />
                    </div>
                    <?php endif;?>
                  </a>
                  <?php endforeach; ?>
    <?php wp_reset_postdata(); //クエリのリセット ?>
                </div>
              </div>
				      <?php endif; ?>
   <?php endfor;?>
              <p class="c-caption">
                お申し込み方法等の詳細は、広報さがみはら「市体育協会からのお知らせ」に掲載されます。<br />相模原市民選手権大会については、<a
                  href=""
                  >こちら</a
                >をご覧ください。
              </p>
            </div>
        </div>
          </div>

          </div>
          </div>
      </main>
   

<?php
get_footer();
