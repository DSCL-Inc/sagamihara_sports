<?php
/**
 * Template Name: 投稿ページ - 協会事業
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
            <?php if(have_rows('prpject_detail')): ?>
                <?php while(have_rows('prpject_detail')): the_row(); ?>
                <tr>
                <td><?php the_field("prpject_detail_head")?></td>
                <td><?php the_field("prpject_detail_body")?></td>
              </tr>
            <?php endwhile; ?>
            <?php endif; ?>
            </table>
            <?php
            $prpject_form_check = get_field('prpject_form');
            if ( $prpject_form_check == 1 ):?>
            <a class="c-btn--primary u-center u-m-top40">申し込む<span class="u-icon-link--white"></span></a>
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
