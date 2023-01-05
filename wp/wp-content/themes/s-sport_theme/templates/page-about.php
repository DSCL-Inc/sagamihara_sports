<?php
/**
 * Template Name: 固定ページ - スポーツ協会について
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
   <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
          <?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile;?>
<?php endif; ?>
            <div class="c-page-section">
              <h3 class="c-page-section__title">情報公開</h3>
              <div class="c-page-section__body">
                <div class="c-page-section__row">
                  <h4 class="c-page-section__title--md">基本情報</h4>
                  <div class="c-btn-wrap">
                  <?php if(have_rows('スポーツ協会について_基本情報')): ?>
          <?php while(have_rows('スポーツ協会について_基本情報')): the_row(); ?>
          <?php $group_name=get_sub_field('スポーツ協会について_基本情報_グループ'); ?>
          <?php if( $group_name ): ?>
            <a href="<?php echo $group_name['スポーツ協会について_基本情報_pdf'];?>" class="c-btn" target="_blank">
            <?php echo $group_name['スポーツ協会について_基本情報_ボタン名']; ?><span class='u-icon-<?php 
							  if(strrchr($group_name['スポーツ協会について_基本情報_pdf'], '.') == '.docx'||strrchr($group_name['スポーツ協会について_基本情報_pdf'], '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($group_name['スポーツ協会について_基本情報_pdf'], '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($group_name['スポーツ協会について_基本情報_pdf'], '.') == '.xls'||strrchr($group_name['スポーツ協会について_基本情報_pdf'], '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>'></span>
            </a>
          <?php endif; ?>
          <?php endwhile; ?>
          <?php endif; ?>

                  </div>
                </div>
                <div class="c-page-section__row">
                  <h4 class="c-page-section__title--md">
                  業務・財務
                  </h4>
                  <?php if(have_rows('about_disclosure_report')): ?>
                <?php while(have_rows('about_disclosure_report')): the_row(); ?>
                <div class="c-page-section__row__item">
                    <h5 class="c-page-section__title--sm"><?php the_sub_field('about_disclosure_report_year');?></h5>
                    <div class="c-btn-wrap">
                    <?php if(have_rows('about_disclosure_report_repeat')): ?>
                    <?php while(have_rows('about_disclosure_report_repeat')): the_row(); ?>
                    <?php $group_name2=get_sub_field('about_disclosure_report_group'); ?> 
                    <?php if( $group_name2 ): ?>
            <a href="<?php echo $group_name2['about_disclosure_report_pdf'];?>" class="c-btn" target="_blank">
            <?php echo $group_name2['about_disclosure_report_name']; ?><span class='u-icon-<?php 
							  if(strrchr($group_name2['about_disclosure_report_pdf'], '.') == '.docx'||strrchr($group_name2['about_disclosure_report_pdf'], '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($group_name2['about_disclosure_report_pdf'], '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($group_name2['about_disclosure_report_pdf'], '.') == '.xls'||strrchr($group_name2['about_disclosure_report_pdf'], '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>'></span>
            </a>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <div class="c-page-section__row">
                  <h4 class="c-page-section__title--md">共催・後援について</h4>
                  <div class="c-btn-wrap">
                  <?php if(have_rows('スポーツ協会について_共済・後援について')): ?>
          <?php while(have_rows('スポーツ協会について_共済・後援について')): the_row(); ?>
          <?php $group_name=get_sub_field('スポーツ協会について_共済・後援について_グループ'); ?>
          <?php if( $group_name ): ?>
            <a href="<?php echo $group_name['スポーツ協会について_共済・後援について_pdf'];?>" class="c-btn" target="_blank">
            <?php echo $group_name['スポーツ協会について_共済・後援について_ボタン名']; ?><span class='u-icon-<?php 
							  if(strrchr($group_name['スポーツ協会について_共済・後援について_pdf'], '.') == '.docx'||strrchr($group_name['スポーツ協会について_共済・後援について_pdf'], '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($group_name['スポーツ協会について_共済・後援について_pdf'], '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($group_name['スポーツ協会について_共済・後援について_pdf'], '.') == '.xls'||strrchr($group_name['スポーツ協会について_共済・後援について_pdf'], '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>'></span>
            </a>
          <?php endif; ?>
          <?php endwhile; ?>
          <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>


<?php
get_footer();
