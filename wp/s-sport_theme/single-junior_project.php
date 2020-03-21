<?php
/**
 * Template Name: 投稿ページ - スポ少年間行事予定
 * Template Post Type: post, page

 */
get_header();
?>
       <main class="l-main">
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <div class="c-page-section__body">
                <div class="u-col-wrap">
              <div class="u-col u-col-8">
              <h4 class="c-page-section__title">
              <?php the_title(); ?>
              </h4>
              <p class="c-desc">
              <?php the_field("junior_project_lead");?>
              </p>
            </div>
            <div class="u-col u-col-4">
            <?php if(get_field("junior_project_thumbnail")):?>
              <div class="p-project-detail__img"><img src="<?php the_field("junior_project_thumbnail");?>"/></div>
            <?php endif;?>
              </div>
            </div>
        <?php
				  $project_form=get_field("junior_project_form");
            $project_form_radio = $project_form['junior_project_form_radio'];  
				  $project_form_comment = $project_form['junior_project_form_comment'];  
				  $project_form_id = $project_form['junior_project_form_id'];  
			  					 if ($project_form_radio== 'フォームあり'):
                        ?>
			   <a class="c-btn--primary u-center u-m-top40" href="<?php echo esc_url( home_url( '/' ) ); ?>project/form?id=<?php echo $project_form_id;?>">申し込む<span class="u-icon-link--white"></span></a>
			  <?php elseif($project_form_radio == 'フォームなし'):?>
				  <?php if($project_form_comment):?>
				   <div class="u-m-top40">
					   <?php echo $project_form_comment?>
				  </div>
				    <?php endif;?>
                        <?php endif;?>
				</div>
				</div>
			   <?php
			  $project_report=get_field('junior_project_report');
			  if($project_report["junior_project_report_check"] ):
			  ?>
<div class="c-page-section">
	<h4 class="c-page-section__title">開催後のレポート</h4>
              <div class="c-page-section__body">
				  <div class="u-col-wrap">
					  
				  <div class="u-col u-col-8">
				  <div class="c-desc">
						<?php  echo $project_report["junior_project_report_text"]?>
				   </div>
					  </div>
					  <div class="u-col u-col-4">
				                    <?php
$images = $project_report["junior_project_report_gallery"]; 
if( $images ): 
?>
                  <div class="p-event-report__gallery">
                  <?php foreach( $images as $image ): ?>
                    <a href="<?php echo $image; ?>"  class="p-event-report__gallery__item fancybox">
                      <img src="<?php echo $image;?>" />
                      <span class="u-icon-gallery-zoom"></span>
                    </a>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
	</div>
					  </div>
</div>
	</div>
<?php endif;?>
			 
			  	   <?php 
							$args= array(
								'post_type' => 'junior_project', 
								'posts_per_page' => 4,
								'orderby' => 'DATE',
								'order' => 'DESC',
								'meta_query'=>array(
									'relation'=>"AND",
									array(
											'key'=>"junior_project_category",
											'value'=>post_custom( "junior_project_category" ),
											'compare'=>'=',
										)
								)
);								
    $posts= get_posts( $args );
	$post_year = get_field("junior_project_year");
			  $now_year =get_the_time("Y");
    if( $posts>1) : ?>
				<div class="c-page-section p-project-detail__report">
					<h4 class="c-page-section__title--md">他年度の結果</h4>
					<div class="c-btn-wrap">	
               <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
						<?php
						$past_project_year=get_field("junior_project_year");
						 if($past_project_year>=2019):
			  		($past_project_year==2019)?$wraki ="令和元年度":$wraki ="令和".($now_year - 2018)."年度";
			  elseif($past_project_year>=1889&&$past_project_year<2019):
			  ($now_year==1889)?$wraki ="平成元年度":$wraki ="平成".($now_year - 1989)."年度";
			  endif;
						?>
						<?php if($post_year!=get_field("junior_project_year")):?>
			  <a href="<?php the_permalink(); ?>" class="c-btn"><?php echo $wraki?><span class="u-icon-link--blue"></span></a>
						<?php endif;?>
					  <?php endforeach;?>
					</div>
					</div>
			   <?php endif;?>
			  <?php wp_reset_postdata();  ?>
					
				
			   
			
             
            </div>
		 </div>
		 
		  
            <div class="u-m-top40 u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>/junior/schejule"
            ><span class="u-icon-back-link--blue"></span>スポ少年間行事予定一覧へ戻る</a
          >
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>
   

<?php
get_footer();
