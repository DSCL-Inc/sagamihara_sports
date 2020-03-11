<?php
/**
 * Template Name: 投稿ページ - スポーツ少年団/年間行事予定 詳細ページ
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
        <div class="c-page-container l-wrap">
          <div class="l-content">
            <div class="c-page-section">
              <div class="c-page-section__body">
                <div class="u-col-wrap">
              <div class="u-col u-col-8">
              <h4 class="c-page-section__title">
              <?php the_title(); ?>
              </h4>
              <p class="c-desc">
              <?php the_field("junior_project_lead");?>
              </p>
            </div>
            <div class="u-col u-col-8">
            <?php if(get_field("junior_project_thumbnail")):?>
              <div class="c-page-section__img"><img src="<?php the_field("junior_project_thumbnail");?>"/></div>
            <?php endif;?>
              </div>
            </div>
            <table class="c-table--event u-m-top40">
            <?php if(have_rows('junior_project_detail')): ?>
                <?php while(have_rows('junior_project_detail')): the_row(); ?>
                <tr>
                <td><?php the_sub_field("junior_project_detail_head");?></td>
                <td><?php the_sub_field("junior_project_detail_body");?></td>
              </tr>
            <?php endwhile; ?>
            <?php endif; ?>
            </table>
            <?php
            $project_form_check = get_field('junior_project_form');
            if ( $project_form_check == 1 ):?>
            <a class="c-btn--primary u-center u-m-top40">申し込む<span class="u-icon-link--white"></span></a>
            <?php endif; ?>
                </div>
               
              </div>
             
            </div>
            <div class="u-m-top40 u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>junior/schejule"
            ><span class="u-icon-back-link--blue"></span>協会事業一覧へ戻る</a
          >
          </div>
        </div>
      </main>
   


<?php
get_footer();
