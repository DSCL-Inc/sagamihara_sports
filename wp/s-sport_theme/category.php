<?php
/**
 * Template Name: 新着情報 - カテゴリー 
 * Template Post Type: post, page

 */
get_header();
?>
<main class="l-main">
        <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title">新着情報 - カテゴリー</h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content u-flex u-shadow">
            <ul class="p-news-nav">
              <li class="p-news-nav__item p-news-nav__item--all">全て</li>
              <li class="p-news-nav__item p-news-nav__item--news is-active">
                お知らせ
              </li>
              <li class="p-news-nav__item p-news-nav__item--event">
                イベント情報
              </li>
              <li class="p-news-nav__item p-news-nav__item--boys">
                スポーツ少年団
              </li>
              <li class="p-news-nav__item p-news-nav__item--member">
                加盟団体
              </li>
              <li class="p-news-nav__item p-news-nav__item--magazine">
                広報さがみはら
              </li>
            </ul>
            <div class="p-news-list-wrap">
            <ul class="p-news-list">
            <?php while ( have_posts() ) : the_post(); ?>
   <li class="p-news-list__item">
                    <a href="<?php the_field("news_url"); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php the_date(); ?></p>
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
        <?php get_template_part('advertise_banner'); ?>
      </main>
      </div>


<?php
get_footer();
