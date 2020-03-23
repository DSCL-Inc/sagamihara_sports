<div class="c-page-section">
              <div class="c-page-section__body">
                <div class="u-col-wrap">
              <div class="u-col <?php if(get_field("project_thumbnail")):?>u-col-8<?php endif;?>">
              <h4 class="c-page-section__title">
              <?php the_title(); ?>
              </h4>
              <div class="p-project__lead">
                <?php the_field("project_lead");?>
              </div>
            </div>
					<?php if(get_field("project_thumbnail")):?>
            <div class="u-col u-col-4">
              <div class="p-project-detail__img"><img src="<?php the_field("project_thumbnail");?>"/></div>
              </div>
					<?php endif;?>
            </div>
				   <?php if(get_field("project_detail")):?>
				  <div class="u-m-top40">
					  <?php the_field("project_detail");?>
				  </div>
				  <?php endif;?>
				  <?php
				  $project_form=get_field("project_form");
            $project_form_radio = $project_form['project_form_radio'];  
			  					 if ($project_form_radio== 'フォームあり'):
				    $project_form_id = $project_form['project_form_id'];  
                        ?>
			   <a class="c-btn--primary u-center u-m-top40" href="<?php echo esc_url( home_url( '/' ) ); ?>project/form?id=<?php echo $project_form_id;?>">申し込む<span class="u-icon-link--white"></span></a>
			  <?php elseif($project_form_radio == 'フォームなし'):
				  $project_form_comment = $project_form['project_form_comment'];  
				  ?>
				  
				  <?php if($project_form_comment):?>
				   <div class="u-m-top40">
					   <?php echo $project_form_comment?>
				  </div>
				    <?php endif;?>
                        <?php endif;?>
				</div>
				</div>
			   <?php
			  $project_report=get_field('project_report');
			  if($project_report["project_report_check"] ):
			  ?>
<?php
$images = $project_report["project_report_gallery"]; 
?>
<div class="c-page-section">
	<h4 class="c-page-section__title">開催後のレポート</h4>
              <div class="c-page-section__body">
				  <div class="u-col-wrap">
					  
				  <div class='u-col <?php if($images) : echo "u-col-8"; endif; ?>'>
				  <div class="c-desc">
						<?php  echo $project_report["project_report_text"]?>
				   </div>
					  </div>
					  <?php
if( $images ): 
?>
					  <div class="u-col u-col-4">
 
                  <div class="p-event-report__gallery">
                  <?php foreach( $images as $image ): ?>
                    <a href="<?php echo $image; ?>"  class="p-event-report__gallery__item fancybox">
                      <img src="<?php echo $image;?>" />
                      <span class="u-icon-gallery-zoom"></span>
                    </a>
                    <?php endforeach; ?>
                  </div>
                  
	</div>
					  <?php endif; ?>
					  </div>
</div>
	</div>
<?php endif;?>
			  <?php 
							$args= array(
								'post_type' => 'project', 
								'posts_per_page' => 4,
								'orderby' => 'DATE',
								'order' => 'DESC',
								'meta_query'=>array(
									'relation'=>"AND",
									array(
											'key'=>"project_category",
											'value'=>post_custom( "project_category" ),
											'compare'=>'=',
										)
								)
);								
    $posts= get_posts( $args );
	$post_year = get_field("project_year");
			  $now_year =get_the_time("Y");
    if( $posts>1) : ?>
				<div class="c-page-section p-project-detail__report">
					<h4 class="c-page-section__title--md">他年度の結果</h4>
					<div class="c-btn-wrap">	
               <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
						<?php
						$past_project_year=get_field("project_year");
						 if($past_project_year>=2019):
			  		($past_project_year==2019)?$wraki ="令和元年度":$wraki ="令和".($now_year - 2018)."年度";
			  elseif($past_project_year>=1889&&$past_project_year<2019):
			  ($now_year==1889)?$wraki ="平成元年度":$wraki ="平成".($now_year - 1989)."年度";
			  endif;
						?>
						<?php if($post_year!=get_field("project_year")):?>
			  <a href="<?php the_permalink(); ?>" class="c-btn"><?php echo $wraki?><span class="u-icon-link--blue"></span></a>
						<?php endif;?>
					  <?php endforeach;?>
					</div>
					</div>
			   <?php endif;?>
			  <?php wp_reset_postdata();  ?>