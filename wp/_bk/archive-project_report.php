<?php
/**
 * Template Name: アーカイブページ - 協会事業 - 過去のレポート
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="c-page-section" id="<?php the_title();?>">
              <h3 class="c-page-section__title"><?php the_title();?></h3>
              <div class="c-page-section__body">
                <div class="u-flex">
                  <div class="u-overflow-hidden">
                    <div class="u-col-wrap">
                      <div class="u-col u-col-4 p-event-report-img">
                        <img src='<?php the_field("project_past_thumbnail");?>' lt="<?php the_title(); ?>">
                      </div>
                      <table class="u-col u-col-8 c-table">
                      <?php if(have_rows('project_past_detail')): ?>
                <?php while(have_rows('project_past_detail')): the_row(); ?>
                <tr>
                <td><?php the_sub_field("project_past_detail_head")?></td>
                <td><?php the_sub_field("project_past_detail_body")?></td>
              </tr>
            <?php endwhile; ?>
            <?php endif; ?>
                      </table>
                    </div>
                    <p class="c-desc u-m-top20">
                    <?php the_field("project_past_comment")?>                    </p>
                  </div>
                  <?php
$images = get_field('project_past_gallery'); 
if( $images ): 
?>
                  <div class="p-event-report__gallery">
                  <?php foreach( $images as $image ): ?>
                    <a href="<?php echo $image; ?>"  class="p-event-report__gallery__item fancybox">
                      <img src="<?php echo $image;?>" alt="<?php the_title(); ?>" />
                      <span class="u-icon-gallery-zoom"></span>
                    </a>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
              </div>  
            </div>
          </div>

      </main>
   

<?php
get_footer();
