<?php
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
                      <p class="p-news-list__item-date"><?php the_date(); ?></p>
                     <?php 
                          if ($terms = get_the_terms($post->ID, 'news_category')) {
                            foreach ( $terms as $term ) {
                              $term_name = $term -> name;
                              $term_slug = $term -> slug;
                            }
                            ?>
                            <?php
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

<?php
get_footer();
