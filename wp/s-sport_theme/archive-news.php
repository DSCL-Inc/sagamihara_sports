<?php
/**
 * Template Name: 新着情報
 * Template Post Type: post, page

 */
get_header();
$term=$_GET["news-category"];
?>
<main class="l-main">
 <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title">新着情報</h2>
        </div>
        <div class="c-page-container l-wrap">
			<ul class="p-news-nav--page  ">
              <li class="p-news-nav__item p-news-nav__item--all  <?php if(!$term):echo "is-active";endif;?>"><a href="/news/">全て</a></li>
              <li class="p-news-nav__item p-news-nav__item--news <?php if($term=="news"):echo "is-active";endif;?>">
               <a href="/news?news-category=news">お知らせ</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--event <?php if($term=="event"):echo "is-active";endif;?>">
				  <a href="/news?news-category=event">イベント情報</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--junior <?php if($term=="junior"):echo "is-active";endif;?>">
				  <a href="/news?news-category=junior">スポーツ少年団</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--magazine <?php if($term=="magazine"):echo "is-active";endif;?>">
                
				  <a href="/news?news-category=magazine">広報さがみはら</a>
              </li>
            </ul>
          <div class="l-content  u-shadow">            
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
				<?php
						$term=$_GET["news-category"];
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if($term):
$the_query = new WP_Query( array(
    'post_status' => 'publish',
    'post_type' => 'news',
    'paged' => $paged,
    'posts_per_page' => 10,
    'orderby'     => 'date',
    'order' => 'DESC',
	'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'news_category',
                        'field' => 'slug',
                        'terms' => $term,
                    ),
                )
) );
				else:
				$the_query = new WP_Query( array(
				'post_status' => 'publish',
				'post_type' => 'news', 
				'paged' => $paged,
				'posts_per_page' => 10, 
				'orderby'     => 'date',
				'order' => 'DESC'
) );
				endif;
				$max_num_pages = $the_query->max_num_pages;
				?>
				
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
   <li class="p-news-list__item">
                    <a href="<?php (get_field("news_url")) ? the_field("news_url")  : the_permalink(); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php the_time('Y年m月d日'); ?></p>
                     <?php 
                          if ($terms = get_the_terms($post->ID, 'news_category')) {
                            foreach ( $terms as $term ) {
                              $term_name = $term -> name;
                              $term_slug = $term -> slug;
                            }
                        }
                      
                      ?>
                           
                      <p
                        class="p-news-list__item-tag p-news-list__item-tag--<?php echo esc_html($term_slug);?>"
                      >
                      <?php echo esc_html($term_name);?>
                      </p>
                      <p class="p-news-list__item-title"><?php the_title(); ?></p>
                    </a>
                  </li>
                  <?php endwhile; ?>
                  
                 
                </ul>
				
              <ul class="p-pagenation">
                <li><?php previous_posts_link('前のページへ'); ?>
                </li>
                <li><?php echo 	$paged?>/<?php echo 	$max_num_pages;?></li>
                <li>
					<?php if($paged!=$max_num_pages):next_posts_link('次のページへ'); endif;?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>

<?php
get_footer();
