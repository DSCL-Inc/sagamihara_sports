<?php
/**
 * Template Name: アーカイブページ - 協会事業 - 過去のレポート
 * Template Post Type: post, page

 */
get_header();
$project_year=$_GET["project_year"];
?>
      <main class="l-main">
		   <ul class="c-page-mv__nav__list">
		   <?php if(have_rows("y")):while(have_rows('y')): the_row();?>
              <li><a href="?y=<?php the_sub_field("y_num");?>"><?php the_sub_field("y_wareki");?></a></li>
		   <?php endwhile;endif;?>
            </ul>
       <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
			   <?php 
			  $project_year=$_GET["y"];
							$args= array(
								'post_type' => 'project', 
								'posts_per_page' => -1,
								'meta_query'=>array(
									'relation'=>"AND",
									array(
											'key'=>"project_report",
										'value'=>"",
										"compare"=>"!="
										),
									array(
										'key'=>"project_year",
										'value'=>$project_year,
										'compare'=>'=',
									)
								)
									
);								
    $posts = get_posts( $args);?>
               <?php if( $posts):foreach( $posts as $post ) : setup_postdata( $post ); ?>
          <div class="c-page-section" id="<?php the_title();?>">
              <h3 class="c-page-section__title"><?php the_title();?></h3>
              <div class="c-page-section__body">
                <div class="u-flex">
                  <div class="u-overflow-hidden">
                    <div>
                        <?php if( get_field('project_detail') ):?>
	<?php the_field('project_detail'); ?>
<?php endif;?>
                    </div>
                    <?php the_field("project_report")?>
                  </div>
                  <?php
$images = get_field('project_gallery'); 
if( $images ): 
?>
                  <div class="p-event-report__gallery">
                  <?php foreach( $images as $image ): ?>
                    <a href="<?php echo $image; ?>"  class="p-event-report__gallery__item fancybox">
                      <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
                      <span class="u-icon-gallery-zoom"></span>
                    </a>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
			      <?php wp_reset_postdata(); //クエリのリセット ?>
			  <?php endif; ?>
              </div>  
            </div>

      </main>
   

<?php
get_footer();
