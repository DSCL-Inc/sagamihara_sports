<?php
/**
 * Template Name: 新着情報 - タクソノミー 
 * Template Post Type: post, page

 */
get_header();
?>
<main class="l-main">
        <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title">新着情報</h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content u-flex u-shadow">
            <ul class="p-news-nav">
              <li class="p-news-nav__item p-news-nav__item--all"><a href="http://sagamihara-sport.or.jp/s-sport/news/">全て</a></li>
              <li class="p-news-nav__item p-news-nav__item--news is-active">
               <a href="http://sagamihara-sport.or.jp/s-sport/news_category/news_topics"> お知らせ</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--event">
               
				  <a href="http://sagamihara-sport.or.jp/s-sport/news_category/news_event">イベント情報</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--boys">
				  <a href="http://sagamihara-sport.or.jp/s-sport/news_category/news_junior">スポーツ少年団</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--member">
				  <a href="http://sagamihara-sport.or.jp/s-sport/news_category/news_member">加盟団体</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--magazine">
                
				  <a href="http://sagamihara-sport.or.jp/s-sport/news_category/news_magazine">広報さがみはら</a>
              </li>
            </ul>
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
            <?php while ( have_posts() ) : the_post(); ?>
   <li class="p-news-list__item">
                    <a href="<?php the_field("news_url"); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php the_date(); ?></p><?php
/**
 * Template Name: 新着情報
 * Template Post Type: post, page

 */
get_header();
?>
<main class="l-main">
        <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title">新着情報</h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content  u-shadow">
            <ul class="p-news-nav">
              <li class="p-news-nav__item p-news-nav__item--all  is-active"><a href="/news/">全て</a></li>
              <li class="p-news-nav__item p-news-nav__item--news">
               <a href="/news_category/news"> お知らせ</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--event">
				  <a href="/news_category/event">イベント情報</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--junior">
				  <a href="/news_category/junior">スポーツ少年団</a>
              </li>
              <li class="p-news-nav__item p-news-nav__item--magazine">
                
				  <a href="/news_category/magazine">広報さがみはら</a>
              </li>
            </ul>
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
				<?php
				$term=$_GET[];
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query( array(
    'post_status' => 'publish',
    'post_type' => 'news', //カスタム投稿タイプ名
    'paged' => $paged,
    'posts_per_page' => 10, // 表示件数
    'orderby'     => 'date',
    'order' => 'DESC',
	   'tax_query' => array(
                    array(
                        'taxonomy' => 'タクソノミー名',
                        'field' => 'slug',
                        'terms' => $term
                    ),
                )
) );
				
				$max_num_pages = $the_query->max_num_pages;
				?>
				
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
   <li class="p-news-list__item">
                    <a href="<?php the_field("news_url"); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php the_date(); ?></p>
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
                <li><?php echo 	$paged?>/<?php echo 	$max_num_pages?></li>
                <li>
					<?php next_posts_link('次のページへ'); ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </main>

<?php
get_footer();

                      <p
                        class="p-news-list__item-tag p-news-list__item-tag--magazine"
                      >
                      <?php the_field("news_category"); ?>
                      </p>
                      <p class="p-news-list__item-title"><?php the_title(); ?></p>
                    </a>
                  </li>
                  <?php endwhile; ?>
                  
                 
                </ul>
              <ul class="p-news-list__pagenation">
                <li>
                  <a href=""><span class="u-icon-left-angle--black"></span></a>
                </li>
                <li>1/3</li>
                <li>
                  <a href=""><span class="u-icon-right-angle--black"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </main>
      </div>


<?php
get_footer();
