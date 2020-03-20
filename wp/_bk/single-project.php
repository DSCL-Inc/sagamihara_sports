<?php
/**
 * Template Name: 投稿ページ - 協会事業
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
              <?php the_field("project_lead");?>
              </p>
				  
            </div>
            <div class="u-col u-col-4">
            <?php if(get_field("project_thumbnail")):?>
              <div class="p-project-detail__img"><img src="<?php the_field("project_thumbnail");?>"/></div>
            <?php endif;?>
              </div>
            </div>
				  <?php if( get_field('project_detail') ):?>
	<?php the_field('project_detail'); ?>
<?php endif;?>
				  
			  
            <?php
            $project_form_check = get_field('project_form');
            if ( $project_form_check == 1 ):?>
            <a class="c-btn--primary u-center u-m-top40" href="<?php echo esc_url( home_url( '/' ) ); ?>project/form?id=<?php the_field("project_form_id");?>">申し込む<span class="u-icon-link--white"></span></a>
				  
            <?php endif; ?>
				</div>
				</div>
			   <?php
			  $project_report=get_field('project_report');
			  if($project_report["project_report_check"] ):
			  ?>
<div class="c-page-section">
	<h4 class="c-page-section__title">開催後のレポート</h4>
              <div class="c-page-section__body">
				  <div class="u-col-wrap">
					  
				  <div class="u-col u-col-8">
				  <div class="c-desc">
						<?php  echo $project_report["project_report_text"]?>
				   </div>
					  </div>
					  <div class="u-col u-col-4">
				                    <?php
$images = $project_report["project_report_gallery"]; 
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
			 
			  
				<div class="c-page-section p-project-detail__report">
					<h4 class="c-page-section__title--md">他年度の結果</h4>
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
    if( $posts) : ?>
					<div class="c-btn-wrap">	
               <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>	
			  <a href="<?php the_permalink(); ?>" class="c-btn"><?php the_field("project_year");?>年度<span class="u-icon-link--blue"></span></a>
					  <?php endforeach;?>
					</div>
			   <?php endif;?>
			  <?php wp_reset_postdata();  ?>
					</div>
				
			   
			
             
            </div>
		 </div>
		  
            <div class="u-m-top40 u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>project"
            ><span class="u-icon-back-link--blue"></span>協会事業一覧へ戻る</a
          >
        </div>
      </main>
   

<?php
get_footer();
