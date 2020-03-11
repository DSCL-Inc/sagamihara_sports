<?php
/**
 * Template Name: アーカイブページ - スポーツ少年団/登録団体
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
                  'post_type' => 'junior_member',    //投稿タイプの指定
                  'posts_per_page' => -1
                );
    $posts = get_posts( $args );
    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
   
   <a class="c-card__item js-modal-show" data-modal="<?php the_ID(); ?>">
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
                  
                  </div>
                </div>
                </div>

<?php
get_footer();
