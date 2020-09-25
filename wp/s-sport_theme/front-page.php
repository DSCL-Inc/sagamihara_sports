<?php
get_header();
?>

      <main class="l-main">
        <section class="p-top-mv">
			<picture>
            <source
              media="(min-width: 768px)"
              srcset="<?php echo get_template_directory_uri(); ?>/assets/image/p-top_mv.jpg"
              alt="公益社団法人 相模原市体育協会"
            />
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/image/p-top_mv_sp.jpg"
              alt="公益社団法人 相模原市体育協会"
            />
          </picture>
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
            <div class="p-top-news">
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
              <div class="l-content  u-shadow">
                <ul class="p-news-nav">
                  <li class="p-news-nav__item p-news-nav__item--all js-news-category is-active" data-news-category="all">全て</li>
                  <li class="p-news-nav__item p-news-nav__item--news  js-news-category" data-news-category="news">
                    お知らせ
                  </li>
                  <li class="p-news-nav__item p-news-nav__item--event  js-news-category" data-news-category="event">
                    イベント情報
                  </li>
                  <li class="p-news-nav__item p-news-nav__item--junior  js-news-category" data-news-category="junior">
                    スポーツ少年団
                  </li>
                  <li class="p-news-nav__item p-news-nav__item--magazine  js-news-category" data-news-category="magazine">
                    広報さがみはら
                  </li>
                </ul>
				  <ul class="p-news-list">
					<?php $args = array(
				  'posts_per_page' => '5',
					'post_type' => 'news' 
				  );
  $customPosts = get_posts($args);
?>
<?php
  if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
  ?>
   <li class="p-news-list__item" data-news-category="<?php echo $term_slug ;?>">
                    <a href="<?php (get_field("news_url")) ? the_field("news_url")  : the_permalink(); ?>" class="p-news-list__item__link" <?php if(get_field("news_blank")):echo 'target="_blank"'; endif;?>>
                      <p class="p-news-list__item-date"><?php the_time('Y年m月d日'); ?></p> 
						 <?php 
                          if ($terms = get_the_terms($post->ID, 'news_category')) {
                            foreach ( $terms as $term ) {
								 $term_name = $term -> name;
								 $term_slug = $term -> slug;
						?>
                      <p
                        class="p-news-list__item-tag p-news-list__item-tag--<?php echo esc_html($term_slug);?>"
                      >
						   <?php 
                             
								 echo esc_html($term_name);
                            ?>
                      </p>
						 <?php 
                            }
							    }
                            ?>
                      <p class="p-news-list__item-title"><?php the_title(); ?></p>
                    </a>
                  </li>
  <?php endforeach; ?>
  <?php endif;
  wp_reset_postdata(); ?>
         
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
                  <div
                    class="fb-page"
                    data-href="https://www.facebook.com/sagamihara.sport.association/"
                    data-width="700"
                    data-tabs="timeline,events"
                    data-hide-cover="false"
                    data-show-facepile="true"
                    data-small-header="false"
                    data-adapt-container-width="true"
                  ></div>
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
                <a class="p-top-activity__main__item" href="<?php echo esc_url( home_url( '/' ) ); ?>project">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--event"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    イベント情報<span class="u-icon-link--white"> </span>
                  </p>
                </a>
                <a class="p-top-activity__main__item" href="<?php echo esc_url( home_url( '/' ) ); ?>junior">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--junior"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    スポーツ少年団<span class="u-icon-link--white"> </span>
                  </p>
                </a>
                <a class="p-top-activity__main__item" href="<?php echo esc_url( home_url( '/' ) ); ?>member">
                  <div
                    class="p-top-activity__main__item__img p-top-activity__main__item__img--member"
                  ></div>
                  <p class="p-top-activity__main__item__title">
                    加盟団体<span class="u-icon-link--white"> </span>
                  </p>
                </a>
              </div>
              <div class="p-top-activity__sub">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>supportingmember" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--support"></span>
                    賛助会員
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>award" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--award"></span>
                    表彰
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>character" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--character"></span>
                    マスコットキャラクター
                  </p>
                  <span class="u-icon-link--blue"></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>facility" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--facility"></span>指定管理者施設
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>volunteer" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--volunteer"></span>
                    スポーツボランティア
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>kanbajji" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--badge"></span>
                    オリジナル缶バッチ
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>support-activities" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--cooperation"></span>
                    震災支援活動への協力
                  </p>
                  <span class="u-icon-link--blue"> </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine" class="c-btn">
                  <p class="c-btn__title">
                    <span class="u-icon-activity--magazine"></span>
					  スポーツさがみはら</p>
                  <span class="u-icon-link--blue"> </span>
                </a>
              </div>
            </div>
          </section>
        </div>
        
        <?php get_template_part('advertise_banner'); ?>

      </main>


<?php
get_footer();
