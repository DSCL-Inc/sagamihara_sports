<?php
/**
 * Template Name: アーカイブページ - スポーツさがみはら
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <div class="c-page-mv c-page">
          <h2 class="c-page-mv__title">スポーツさがみはら</h2>
        </div>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
<div class="c-card c-card--5">
<?php 
                $args = array(
                  'post_type' => 'magazine',    //投稿タイプの指定
                  'posts_per_page' => 20
                );
    $posts = get_posts( $args );
    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
   <a class="c-card__item" target="_blank" href="<?php the_field("magazine_pdf");?>">
                  <div class="c-card__item__img">
                    <img src="<?php the_field("magazine_thumbnail"); ?>" alt="<?php the_title(); ?>" />
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

<?php
get_footer();
