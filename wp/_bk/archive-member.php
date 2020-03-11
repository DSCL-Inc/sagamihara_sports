<?php
/**
 * Template Name: アーカイブページ - 加盟団体
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <div class="c-page-mv c-page-mv--news">
          <h2 class="c-page-mv__title"><?php the_title(); ?></h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <div class="c-page-section__body">
          <?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
              </div>
              <?php endwhile;?>
<?php endif; ?>
<div class="c-card c-card--5">
<?php 
                $args = array(
                  'post_type' => 'member',    //投稿タイプの指定
                  'posts_per_page' => -1
                );
    $posts = get_posts( $args );
    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
   
   <a class="c-card__item js-modal-show" data-modal="<?php echo $post->post_name";?>>
                  <div class="c-card__item__img">
                    <img src="<?php the_field("member_thumbnail"); ?>" alt="<?php the_title(); ?>" />
                  </div>
                  <p class="c-card__item__name">
                  <?php the_title(); ?><span class="u-icon-link--blue"></span>
                  </p>
                </a>
                  <?php endforeach; ?>
    <?php else : //記事が無い場合 ?>
        <li><p>記事はまだありません。</p></li>
    <?php endif;
    wp_reset_postdata(); //クエリのリセット ?>
    </div>
            </div>
        </div>


      </main>
      <div class="c-junior__type__mordal js-modal-content">
                <div class="c-junior__type__mordal__bg"></div>
                <div class="c-junior__type__mordal__container">
                  <button class="c-junior__type__mordal__close-btn js-modal-close">
                    <span class="u-icon-close"></span>
                  </button>
                  <div class="c-junior__type__mordal__inner">
                  <div class="c-junior__type__mordal__top">
                    <div class="u-col-wrap">
                      <div class="u-col u-col-6">
                        <div class="c-junior__type__img">
                          <img src="http://sagamihara-sport.or.jp/s-sport/wp-content/uploads/2020/03/p-spotch_shorinji-kempo.png" alt="" />
                        </div>
                      </div>
                      <div class="u-col u-col-6">
                        <h4 class="c-page-section__title">
                          カヌー協会
                        </h4>
                        <table class="c-table--event u-m-top40">
                          <tr>
                            <td>設立</td>
                            <td>昭和２９年設立</td>
                          </tr>
                          <tr>
                            <td>代表</td>
                            <td><a href="">中田　修（なかた　おさむ）</a></td>
                          </tr>
                          <tr>
                            <td>加盟団体数</td>
                            <td>
                              10団体
                            </td>
                          </tr>
                          <tr>
                            <td>web</td>
                            <td>https//:XXXXXXXX</td>
                          </tr>
                          <tr>
                            <td>電話番号</td>
                            <td>042-756-0369（自宅）</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="c-junior__type__event-table">
                    <h4 class="c-junior__type__event-table__head">
                      カヌー協会が主催している大会・行事
                    </h4>
                    <div class="c-junior__type__event-table__body">
                      <table class="c-table--equal">
                        <thead>
                          <tr>
                            <th>大会・行事名</th>
                            <th>連絡担当者</th>
                            <th>連絡先</th>
                            <th>開催日</th>
                            <th>会場</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>初心者講座</td>
                            <td>担当者名</td>
                            <td>080-xxxx-xxxx</td>
                            <td>６月１６日</td>
                            <td>市体育館弓道場</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  </div>
                  </div>
                </div>

<?php
get_footer();
