<?php 
if($_GET["y"]):
$y=$_GET["y"];
else:
$y=get_field("y_0_y_num");
endif;


$url = esc_url($_SERVER['REQUEST_URI']);
if(strpos($url, 'junior')) {
    $project_head="junior_project";
}else{
    $project_head="project";
}
?>
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
								'post_type' => $project_head, 
								'posts_per_page' => -1,
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'orderby'=>'meta_value_num',
								'meta_query'=>array(
										array(
											
										'key'=>$project_head."_date_%_".$project_head."_date_item",
												'value'=>array(date($year."/".$month."/01"),date($year."/".$month."/31")),
												'compare'=>"BETWEEN",
												'type' => 'DATE',
											),
										array(
											'key'=>$project_head."_year",
											"value"=>$y,
											'compare'=>'=',
										)
									
								)							
);								
			
$the_query= new WP_Query( $args[$j]  );
if ( $the_query->have_posts() ):
				  ?>
              <div class="p-calender-list__row">
                <div class="p-calender-list__row__head"><?php echo $month;?>月</div>
                <div class="p-calender-list__row__body">
               <?php
					while( $the_query->have_posts() ) :
        			$the_query->the_post(); ?>		
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
						<?php if(have_rows($project_head.'_date')): ?>
						<?php $i=0;?>
                    <?php while(have_rows($project_head.'_date')): the_row(); ?>	
								<?php
								$date_from_get = get_sub_field( $project_head.'_date_item', false, false);
								$date_to_get = get_sub_field( $project_head.'_date_item_to', false, false);
								$date_from_data = new DateTime($date_from_get); 
								$date_to_data = new DateTime($date_to_get); 
								?>
						<?php if($date_to_data->format("m")!=$date_from_data->format("m")):?>
								<?php if($month==$date_from_data->format("n")):?>
									<?php if($i>0):
										echo "・";endif;?>
										<?php echo $date_from_data->format("j日");?>
						<?php $i++;?>
								<?php endif;?>
						<?php else:?>
						<?php if($i>0):
										echo "・";endif;?>
								<?php echo $date_from_data->format("j日");?>
						<?php $i++;?>
						<?php endif;?>
						<?php if($date_to_get):?>
								<?php echo " - ";?>
									<?php if($date_to_data->format("m")!=$date_from_data->format("m")):?>
											<?php echo $date_to_data->format("n月j日"); ?>
													<?php else:?>
						<?php echo $date_to_data->format("j日"); ?>
												<?php endif;?>
						<?php else:?>
											<?php endif;?>
											
							<?php endwhile; ?>
                    <?php endif;?>
                    </div>
                    <div class="p-calender-list__item__title">
                    <?php the_title(); ?>
                    </div>
                    <?php if(get_field($project_head."_thumbnail")):?>
                    <div class="p-calender-list__item__img">
						 <?php echo wp_get_attachment_image(get_post_meta($post->ID, $project_head."_thumbnail", true),array(180, 320));?>
                    </div>
					  <?php endif;?>
                  </a>
                  <?php endwhile; ?>
                </div>
              </div>
				      <?php endif; ?>
   <?php endfor;?>
				  <?php 
							$undecided_args = array(
								'wildcard_meta_key' => true,
								'post_type' => $project_head, 
								'posts_per_page' => -1,
								'meta_query'=>array(
									'relation'=>"AND",
									array(
										array(
											'key'=>$project_head."_date_undecided",
												'value'=>"1",
												'compare'=>"="
											),
										array(
											'key'=>$project_head."_year",
											"value"=>$y,
											'compare'=>'=',
										)
									)
									
								)							
);								
	$undecided_posts = get_posts( $undecided_args);
    if( $undecided_posts ) : ?>
				  		<?php
				  $year=$y;
				  ?>
				  <div class="p-calender-list__row">
					  <div class="p-calender-list__row__head">未定</div>
                <div class="p-calender-list__row__body">
               <?php foreach( $undecided_posts as $post ) : setup_postdata( $post ); ?>						
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
						<?php if(get_field($project_head.'_date_undecided_comment')): ?>
						<?php the_field($project_head.'_date_undecided_comment'); ?>
						<?php endif;?>
                    </div>
                    <div class="p-calender-list__item__title">
						<?php if(get_the_title()):?>
                    <?php the_title(); ?>
						<?php endif;?>
                    </div>
                    <?php if(get_field($project_head."_thumbnail")):?>
                    <div class="p-calender-list__item__img">
                      <img src="<?php the_field($project_head."_thumbnail")?>" alt="<?php the_title(); ?>" />
                    </div>
					  <?php endif;?>

                  </a>
                  <?php endforeach; ?>
    <?php wp_reset_postdata(); //クエリのリセット ?>
                </div>
              </div>
				      
<?php endif; ?>
            </div>