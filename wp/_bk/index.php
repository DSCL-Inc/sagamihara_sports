<?php
get_header();
?>

      <main class="l-main">
        <section class="p-top-mv">
          <img
            src="<?php echo get_template_directory_uri(); ?>/assets/image/p-top_mv.jpg"
            alt="公益社団法人 相模原市体育協会"
          />
          <div class="p-top-mv-slide__cover"></div>
        </section>
        <section class="p-top-banner">
        <?php if(have_rows('top_mv_under_banner')): ?>
          <div class="p-top-banner__slide js-slick">
          <?php while(have_rows('top_mv_under_banner')): the_row(); ?>
          <?php $group_name=get_sub_field('top_mv_under_banner_group'); ?>
          <?php if( $group_name ): ?>
            <a href="<?php echo $group_name['top_mv_under_banner_url']; ?>" class="p-top-banner__slide__item" <?php if($group_name['top_mv_under_banner_tab']):echo 'target="_blank"';endif; ?>>
              <img class="u-shadow" src="<?php echo $group_name['top_mv_under_banner_img']; ?>"/>
            </a>
          <?php endif; ?>
          <?php endwhile; ?>
          </div>
          <?php endif; ?>
          <div class="p-top-banner__btn p-top-banner__btn--prev">
            <span class="u-icon-top-banner--prev"></span>
          </div>
          <div class="p-top-banner__btn p-top-banner__btn--next">
            <span class="u-icon-top-banner—-next"></span>
          </div>
        </section>
        <div class="l-wrap">
          <section class="p-top-info p-top__section u-flex">
            <div class="p-news">
              <div class="p-top-section__head">
                <h2 class="p-top-section__head__title">
                  <span
                    class="p-top-section__head__character p-top-section__head__character--news"
                  ></span
                  >新着情報
                </h2>
                <a class="p-top-head__btn u-shadow" href="<?php echo esc_url( home_url( '/' ) ); ?>news/"
                  >一覧を見る<span class="u-icon-right-angle"></span
                ></a>
              </div>
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
                  <li class="p-news-nav__item p-news-nav__item--magazine">
                    広報さがみはら
                  </li>
                </ul>
                <ul class="p-news-list">
                <?php $args = array(
    'numberposts' => 5, 
    'post_type' => 'news' 
  );
  $customPosts = get_posts($args);
?>
<?php
  if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
  ?>
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
  <?php endforeach; ?>
  <?php else : //記事が無い場合 ?>
  <p>ただいま新着情報はございません</p>
  <?php endif;
  wp_reset_postdata(); //クエリのリセット ?>

                  
                 
                </ul>
              </div>
            </div>

            <div class="p-top-sns">
              <div class="p-top-section__head">
                <div class="p-top-section__head__title">
                  <span class="u-icon-facebook"></span>
                  facebook
                </div>
              </div>
              <div class="l-content u-shadow">
                <div class="p-top-sns__facebook">
                  <iframe
                    name="f92103b4eafa8"
                    title="fb:page Facebook Social Plugin"
                    frameborder="0"
                    allowtransparency="true"
                    allowfullscreen="true"
                    scrolling="no"
                    allow="encrypted-media"
                    src="https://www.facebook.com/v2.5/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D45%23cb%3Df265630a96056ac%26domain%3Dwww.jade.dti.ne.jp%26origin%3Dhttp%253A%252F%252Fwww.jade.dti.ne.jp%252Ff1c8f16b86e1df4%26relation%3Dparent.parent&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsagamihara.sports.association%2F&amp;locale=ja_JP&amp;sdk=joey&amp;show_facepile=false&amp;tabs=timeline&amp;"
                    class=""
                  ></iframe>
                </div>
              </div>
            </div>
          </section>
          <section class="p-top-activity p-top__section">
            <div class="p-top-section__head">
              <h3 class="p-top-section__head__title">
                <span
                  class="p-top-section__head__character p-top-section__head__character--activity"
                ></span
                >相模原市スポーツ協会の活動
              </h3>
            </div>
            <div class="l-content u-shadow">
              <div class="p-top-activity__main">
                <a class="p-top-activity__main__item" src="">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--event"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    イベント情報<span class="u-icon-link--white"> </span>
                  </p>
                </a>
                <a class="p-top-activity__main__item" src="">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--junior"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    スポーツ少年団<span class="u-icon-link--white"> </span>
                  </p>
                </a>
                <a class="p-top-activity__main__item" src="">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--member"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    加盟団体<span class="u-icon-link--white"> </span>
                  </p>
                </a>
              </div>
              <div class="p-top-activity__sub">
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--support"></span>
                    賛助会員募
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--award"></span>
                    表彰
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--character"></span>
                    マスコットキャラクター
                  </p>
                  <span class="u-icon-link--blue"></span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--facility"></span>
                    指定管理施設
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--volunteer"></span>
                    スポーツボランティア
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--badge"></span>
                    オリジナル缶バッチ
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--cooperation"></span>
                    震災支援活動への協力
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="" class="c-btn--gray">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--magazine"></span>
                    広報
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
              </div>
            </div>
          </section>
          <section class="p-top-advertisement p-top__section">
            <div class="p-top-section__head">
              <h4 class="p-top-section__head__title">
                <span
                  class="p-top-section__head__character p-top-section__head__character--ad"
                ></span
                >広告バナー
              </h4>
              <a class="p-top-head__btn u-shadow" href=""
                >一覧を見る<span class="u-icon-right-angle"></span
              ></a>
            </div>
            <div class="l-content u-shadow">
              <div class="p-top-advertisement__list">
              <?php $i=0; ?>
        <?php if(have_rows('top_advertisement')):?>
              <?php while(have_rows('top_advertisement')):the_row(); ?>
              <?php $top_advertisement=get_sub_field('top_advertisement_group'); ?>
              <?php if($top_advertisement): ?>
                <a href="<?php echo $top_advertisement['top_advertisement_url']; ?>" class="p-top-advertisement__list__item">
                  <img src="<?php echo $top_advertisement['top_advertisement_img'];?>" alt="<?php echo $top_advertisement['top_advertisement_name']; ?>"/>
                </a>
                
              <?php endif; ?>
              <?php $i++;?>
              <?php endwhile; ?>
              <?php endif; ?>
            <?php if($i < 10): ?>
                <?php for($i = $i; $i < 10; $i++):?>
              <a class="p-top-advertisement__list__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/p-top-advertisement_dummy.png" />
                </a>
              <?php endfor; ?>
        <?php endif; ?>
              </div>
            </div>
          </section>
        </div>
      </main>


<?php
get_footer();
