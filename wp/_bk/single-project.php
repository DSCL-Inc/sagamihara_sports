<?php
/**
 * Template Name: 投稿ページ - 協会事業
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
        <div class="c-page-container l-wrap-md">
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <div class="c-page-section__body">
                <div class="u-col-wrap">
              <div class="u-col u-col-8">
              <h4 class="c-page-section__title">
              <?php the_title(); ?>
              </h4>
              <p class="c-desc">
              <?php the_field("project_lead");?>
              </p>
            </div>
            <div class="u-col u-col-8">
            <?php if(get_field("project_thumbnail")):?>
              <div class="c-page-section__img"><img src="<?php the_field("project_thumbnail");?>"/></div>
            <?php endif;?>
              </div>
            </div>
            <table class="c-table--event u-m-top40">
            <?php if(have_rows('project_detail')): ?>
                <?php while(have_rows('project_detail')): the_row(); ?>
                <tr>
                <td><?php the_sub_field("project_detail_head")?></td>
                <td><?php the_sub_field("project_detail_body")?></td>
              </tr>
            <?php endwhile; ?>
            <?php endif; ?>
				<?php if(have_rows('project_past_btn')): ?>
				 	<tr>
						<td>過去のレポート
						<td>
                <?php while(have_rows('project_past_btn')): the_row(); ?>
						<a href="http://sagamihara-sport.or.jp/s-sport/project_report?year=<?php the_sub_field("project_past_btn_year");?>#<?php the_title(); ?>" class="c-text-btn"><?php the_sub_field("project_past_btn_year");?>年度<span class="u-icon-link--blue"></span></a>
            <?php endwhile; ?>
							</td>
						 </tr>
            <?php endif; ?>
					
            </table>
            <?php
            $project_form_check = get_field('project_form');
            if ( $project_form_check == 1 ):?>
            <a class="c-btn--primary u-center u-m-top40">申し込む<span class="u-icon-link--white"></span></a>
            <?php endif; ?>
                </div>
               
              </div>
             
            </div>
            <div class="u-m-top40 u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>project"
            ><span class="u-icon-back-link--blue"></span>協会事業一覧へ戻る</a
          >
        </div>
          </div>

      </main>
   

<?php
get_footer();
