<?php
/**
 * Template Name: アーカイブページ - 協会事業
 * Template Post Type: post, page

 */
get_header();
?>
 <?php if($_GET['y']):?>
				  		<?php $y=$_GET["y"];?>  
				  <?php elseif(!$_GET['y']):?>
				  <?php $y=get_field("y_0_y_num");?>
				  <?php endif;?>
      <main class="l-main">
   <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
			   <ul class="c-page-nav">
		   <?php if(have_rows("y")):while(have_rows('y')): the_row();?>
		   <li class="c-page-nav__item <?php ($y==get_sub_field("y_num")) ? print " is-current" : 0;?>"><a href="?y=<?php the_sub_field("y_num");?>" class="c-page-nav__item__link"><?php the_sub_field("y_wareki");?></a></li>
		   <?php endwhile;endif;?>
            </ul>
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <div class="c-page-section__body">
              <div class="p-calender-list">
				  <?php $month_reset=null; ?> 
				  <?php for($j =1;$j<=12;$j++):?>
				  <?php  if($j<=9):?>
				  		<?php
				  $year=$y;
				  $month=$j+3;
				  ?>  
				  <?php  else:?> 
					 <?php
				  		$year=$y+1;
					  if(isset($month_reset)):
					  		$month++;
					  else:
						   $month=1;
						   $month_reset=1;
					  endif;
					  ?>
				  <?php  endif;?>
				   <?php 
							$args[$j] = array(
								'wildcard_meta_key' => true,
								'post_type' => 'project', 
								'posts_per_page' => -1,
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'orderby'=>'meta_value_num',
								'meta_query'=>array(
									'relation'=>"AND",
									array(
										array(
											'key'=>"project_date_0_project_date_item",
												'value'=>array(date($year."/".$month."/01"),date($year."/".$month."/31")),
												'compare'=>"BETWEEN",
												'type' => 'DATE',
											),
										array(
											'key'=>"project_year",
											"value"=>$y,
											'compare'=>'=',
										)
									)
									
								)							
);								
    $posts[$j] = get_posts( $args[$j] );
    if( $posts[$j] ) : ?>
              <div class="p-calender-list__row">
                <div class="p-calender-list__row__head"><?php echo $month;?>月</div>
                <div class="p-calender-list__row__body">
               <?php foreach( $posts[$j] as $post ) : setup_postdata( $post ); ?>		
						
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
						<?php if(have_rows('project_date')): ?>
						<?php $i=0;?>
                    <?php while(have_rows('project_date')): the_row(); ?>	
								<?php
								$date_from_get = get_sub_field( 'project_date_item', false, false);
								$date_to_get = get_sub_field( 'project_date_item_to', false, false);
								$date_from_data = new DateTime($date_from_get); 
								$date_to_data = new DateTime($date_to_get); 
								?>
								<?php if($i>0): echo "・";endif;?>
								<?php echo $date_from_data->format("j");?>
								<?php if($date_to_get):?>
								<?php echo " - ";?>
									<?php if($date_to_data->format("m")!=$date_from_data->format("m")):?>
											<?php echo $date_to_data->format("m月j"); ?>日
													<?php else:?>
															<?php echo $date_to_data->format("j"); ?>日
												<?php endif;?>
											<?php else:?>日
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
            </div>
        </div>
          </div>

          </div>
          </div>
      </main>
   

<?php
get_footer();
