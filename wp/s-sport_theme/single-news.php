<?php
/**
 * Template Name: 投稿ページ - 新着情報
 * Template Post Type: post, page

 */
get_header();
?>
<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
  <?php 
      if ($terms = get_the_terms($post->ID, 'news_category')) {
        foreach ( $terms as $term ) {
          $term_name = $term -> name;
          $term_slug = $term -> slug;
        }
      }
    ?>
      <main class="l-main">
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
          <header class="p-news-detail__head">
              <div class="p-news-detail__head__top">
                <p class="p-news-detail__head__top__date"><?php echo get_the_time("Y/m/j");?></p>
				   <?php 
                          if ($terms = get_the_terms($post->ID, 'news_category')) {
                            foreach ( $terms as $term ) {
								 $term_name = $term -> name;
								 $term_slug = $term -> slug;
						?>
                      <p
                        class="p-news-detail__head__top__tag p-news-detail__head__top__tag--<?php echo $term_slug;?>"
                      >
						   <?php 
                             
								 echo esc_html($term_name);
                            ?>
                      </p>
						 <?php 
                            }
							    }
                            ?>
				  
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
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>news"
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
