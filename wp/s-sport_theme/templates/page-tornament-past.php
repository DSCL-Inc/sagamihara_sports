<?php
/**
 * Template Name: 固定ページ - 市民選手権大会 過去の結果
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <div class="c-page-mv">
          <h2 class="c-page-mv__title"><?php the_title(); ?></h2>
        </div>
    
        
        <div class="c-page-container l-wrap">
          <div class="l-content">
            <div class="c-page-section">
              <div class="c-page-section__body">
                <div class="c-page-section__row">
                  <?php if(have_rows('tournament_past')): ?>
                <?php while(have_rows('tournament_past')): the_row(); ?>
                <div class="c-page-section__row__item">
                    <h5 class="c-page-section__title--sm"><?php the_sub_field('tournament_past_year');?></h5>
                    <div class="c-btn-wrap">
                    <?php if(have_rows('tournament_past_pdf_repeat')): ?>
                    <?php while(have_rows('tournament_past_pdf_repeat')): the_row(); ?>
            <a href="<?php the_sub_field("tournament_past_pdf_file")?>" class="c-btn" target="_blank">
            <?php the_sub_field("tournament_past_pdf_name")?><span class="u-icon-pdf"></span>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
   
    </div>


<?php
get_footer();
