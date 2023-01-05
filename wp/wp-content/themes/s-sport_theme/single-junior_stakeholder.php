<?php
/**
 * Template Name: 投稿ページ - スポーツ少年団/会員専用ページ　記事詳細ページ
 * Template Post Type: post, page

 */
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
      <main class="l-main">
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
          <header class="p-news-detail__head">
              <div class="p-news-detail__head__top">
                <p class="p-news-detail__head__top__date"><?php echo get_the_time("Y/m/j");?></p>
              </div>
              <h4 class="p-news-detail__head__title">
              <?php the_title(); ?>
              </h4>
            </header>
            <div class="p-news-detail__body">
          <?php the_content(); ?>
          </div>
            </div>
            <div class="u-m-top40 u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>junior-stakeholder"
            ><span class="u-icon-back-link--blue"></span>記事一覧へ戻る</a
          >
        </div>
          </div>
          <?php get_template_part('advertise_banner'); ?>
      </main>
      <?php endwhile;?>
<?php endif; ?>

<?php
get_footer();
