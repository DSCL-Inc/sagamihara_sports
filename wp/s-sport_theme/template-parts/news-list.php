<?php
require_once '../../../../wp-load.php';

$news_term= isset( $_POST['news_data'] ) ? $_POST['news_data'] : 1;
if($news_term!= "all"):
$ajax_query = new WP_Query(
  array(
    'posts_per_page' => '5',
    'post_type' => 'news' ,
	'tax_query' => array(
                    array(
                        'taxonomy' => 'news_category',
						            'field' => 'slug',
                        'terms' => $news_term, 
                    ),
                )
  )
);
else:
  $ajax_query = new WP_Query(
    array(
      'posts_per_page' => '5',
      'post_type' => 'news'
    )
  );
endif;
?>
<?php if ( $ajax_query->have_posts() ) : ?>
  <?php while ( $ajax_query->have_posts() ) : ?>
    <?php $ajax_query->the_post(); ?>
					  <?php 
                          if ($terms = get_the_terms($post->ID, 'news_category')) {
                            foreach ( $terms as $term ) {
                              $term_name = $term -> name;
                              $term_slug = $term -> slug;
                            }
							    }
                            ?>
   <li class="p-news-list__item" data-news-category="<?php echo $term_slug ;?>">
                    <a href="<?php (get_field("news_url")) ? the_field("news_url")  : the_permalink(); ?>" class="p-news-list__item__link">
                      <p class="p-news-list__item-date"><?php the_time('Y年m月d日'); ?></p>
 <p class="p-news-list__item-tag p-news-list__item-tag--<?php echo esc_html($term_slug);?>"
                      >
                      <?php echo esc_html($term_name);?>
                      </p>        
                      <p class="p-news-list__item-title"><?php the_title(); ?></p>
                    </a>
                  </li>
                  <?php endwhile; ?>
<?php endif; ?>
  <?php wp_reset_postdata(); //クエリのリセット ?>