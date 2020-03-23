<?php
/**
 * Template Name: スポーツ少年団/会員専用ページ TOP
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <div class="c-page-section__body">
          <?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
              </div>
              <?php endwhile;?>
<?php endif; ?>
<div class="c-card c-card--5 u-m-top40">
<?php 
                $args = array(
                  'post_type' => 'junior_member',    //投稿タイプの指定
                  'posts_per_page' => -1
                );
    $posts = get_posts( $args );
    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
   
   <a class="c-card__item js-modal-show" data-modal="<?php the_ID(); ?>">
                  <div class="c-card__item__img">
                    <img src="<?php the_field("junior_member_thumbnail"); ?>" alt="<?php the_title(); ?>" />
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
        <?php get_template_part('advertise_banner'); ?>
</main>
      <div class="p-member__modal p-member__modal--junior js-modal-content">
                <div class="p-member__modal__bg"></div>
                <div class="p-member__modal__container">
					<div class="p-member__modal__container__inner">
                </div>
                <button class="p-member__modal__close-btn js-modal-close">
                  閉じる
                  </button>
                </div>
		  </div>

<?php
get_footer();
