<?php
/**
 * Template Name: アーカイブページ - 加盟団体/会員専用ページ TOP
 * Template Post Type: post, page

 */
get_header();
?>
<main class="l-main">
        <div class="c-page-mv">>
			<div class="l-wrap">
          <h2 class="c-page-mv__title">加盟団体/会員専用ページ</h2>
				</div>
        </div>
        <div class="c-page-container l-wrap">
			 <div class="l-content u-shadow">
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
				<?php
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query( array(
    'post_status' => 'publish',
    'post_type' => 'member_stakeholder', 
    'paged' => $paged,
    'posts_per_page' => 10,
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
				  <ul class="p-pagenation">
                <li><?php previous_posts_link('前のページへ'); ?>
                </li>
                <li><?php echo 	$paged?>/<?php echo $max_num_pages;?></li>
                <li>
					<?php if($paged!=$max_num_pages):next_posts_link('次のページへ'); endif;?>
                </li>
              </ul>
          </div>
      </div>
      <?php get_template_part('advertise_banner'); ?>
      </main>

<?php
get_footer();
