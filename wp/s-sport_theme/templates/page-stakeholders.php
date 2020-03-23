<?php
/**
 * Template Name: 固定ページ - 関係者専用ページ TOP
 * Template Post Type: post, page

 */
if( !post_password_required( $post->ID ) ) : 
get_header();

$page = get_post( get_the_ID() );
$slug = $page->post_name;
if($slug=="member-stakeholder"):
$post_type="member_stakeholder";
elseif($slug=="junior-stakeholder"):
$post_type="junior_stakeholder";
endif;
?>
<main class="l-main">
        <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
			 <div class="l-content u-shadow">
				 <div class="c-page-section">	
					 <div class="c-page-section__head">
						 <h4 class="c-page-section__title">
							 新着情報
						 </h4>
						 <a class="p-top-head__btn u-shadow" href="	<?php echo get_the_permalink();?>/archive"
                  >一覧を見る<span class="u-icon-right-angle"></span
                ></a>
					 </div>
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query( array(
    'post_status' => 'publish',
    'post_type' =>$post_type , 
    'paged' => $paged,
    'posts_per_page' => 5,
    'orderby'     => 'date',
    'order' => 'DESC'
) );
				$max_num_pages = $the_query->max_num_pages;
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
   <li class="p-news-list__item">
                    <a href="<?php the_permalink(); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php echo get_the_time("Y/m/j"); ?></p>

                      <p class="p-news-list__item-title"><?php the_title(); ?></p>
                    </a>
                  </li>
                  <?php endwhile; ?>
                </ul>
				<?php wp_reset_query(); ?>
            </div>
          </div>
				 <?php if(have_rows('stakeholder-subsidy')): ?>
				 <div class="c-page-section">
					 <div class="c-page-section__head">
						 <h4 class="c-page-section__title--md">
							 助成金
						 </h4>
					 </div>
              <div class="c-page-section__body">
                <div class="c-page-section">
                  <div class="c-btn-wrap">
                    
                    <?php while(have_rows('stakeholder-subsidy')): the_row(); ?>
            <a href="<?php the_sub_field("stakeholder-subsidy_file")?>" class="c-btn" target="_blank">
            <?php the_sub_field("stakeholder-subsidy_name")?><span class="u-icon-pdf"></span>
            </a>
            <?php endwhile; ?>
                </div>
                </div>
              </div>
            </div>
				 <?php endif; ?>
				  <?php if(have_rows('stakeholder-support')): ?>
				 <div class="c-page-section">
					 <div class="c-page-section__head">
						 <h4 class="c-page-section__title--md">
							 共催・後援
						 </h4>
					 </div>
              <div class="c-page-section__body">
                <div class="c-page-section">
                  <div class="c-btn-wrap">
                    <?php while(have_rows('stakeholder-support')): the_row(); ?>
            <a href="<?php the_sub_field("stakeholder-support_file")?>" class="c-btn" target="_blank">
            <?php the_sub_field("stakeholder-support_name")?><span class="u-icon-pdf"></span>
            </a>
            <?php endwhile; ?>
                </div>
                </div>
              </div>
            </div>
				 <?php endif; ?>
				 
			</div>
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>

<?php
get_footer();
else:
echo get_the_password_form(); 
endif; 
