<?php
/**
 * Template Name: 固定ページ - 市民選手権大会
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
      <div class="c-page-mv">
          <h2 class="c-page-mv__title"><?php the_title(); ?></h2>
          <nav class="c-page-nav">
            <a class="c-page-nav__item"
              >スポーツ協会概要<span class="u-icon-under-angle"></span
            ></a>
            <a class="c-page-nav__item"
              >組織図<span class="u-icon-under-angle"></span
            ></a>
            <a class="c-page-nav__item"
              >情報公開<span class="u-icon-under-angle"></span
            ></a>
          </nav>
        </div>
    
        
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <h3 class="c-page-section__title">競技科目一覧</h3>
              <div class="c-page-section__body">
                <table class="c-table--tournament">
                    <thead>
                    <tr>
                    <th>競技名</th>
                    <th>開催日</th>
                    <th>会 場</th>
                    <th class="c-table__th__10w">開催要項</th>
                    <th class="c-table__th__10w">申請方法</th>
                    <th class="c-table__th__10w">結果</th>
                    </tr></thead>
                    <tbody>
                    <?php if(have_rows('tournament_competition')): ?>
                    
                        <?php while(have_rows('tournament_competition')): the_row(); ?>
                        <tr>
                        <td>
                        <?php if( get_sub_field('tournament_competition_name') ):
                            the_sub_field('tournament_competition_name');
                        else:
                            echo "-";
                        endif;
                            ?>
                        </td>
                        <td>
                        <?php if(have_rows('tournament_competition_date')): ?>
                            <?php while(have_rows('tournament_competition_date')): the_row(); ?>
                            <p><?php the_sub_field('tournament_competition_date_title');?>：<?php the_sub_field('tournament_competition_date_num');?></p>
                            <?php  endwhile;?>
                        <?php else: ?>
                            -
                        <?php  endif;?>
                        </td>
                        <td>
                        <?php if(have_rows('tournament_competition_place')): ?>
                            <?php while(have_rows('tournament_competition_place')): the_row(); ?>
                            <?php if( get_sub_field('tournament_competition_place_url')): ?>
                            <a href="<?php the_sub_field('tournament_competition_place_url'); ?>" class="u-text-link"><?php the_sub_field('tournament_competition_place_name'); ?><span class="u-icon-external--blue"></span></a>
                            <?php else: ?>
                            <?php the_sub_field('tournament_competition_place_name'); ?>
                            <?php endif; ?>
                            <?php  endwhile;?>
                            <?php else: ?>
                            -
                        <?php  endif;?></td>
                        <td>
                        <?php
                          $tcp = get_sub_field('tournament_competition_point');
                          $tcp_radio=$tcp['tournament_competition_point_radio'];
                          $tcp_file=$tcp['tournament_competition_point_file'];
                          $tcp_comment=$tcp['tournament_competition_point_comment'];
                          if ($tcp_radio == 'ファイルあり'):
                          ?>
                          <a class="c-table--tournament__icon-btn" href="<?php echo $tcp_file; ?>" target="_blank"><span class="u-icon-word"></span></a>
                          <?php elseif($tcp_radio == 'ファイルなし'):?>
                          <?php if($tcp_comment):?>
                          <?php echo $tcp_comment;?>
                          <?php else:?>
                          -
                          <?php endif;?>
                        <?php endif;?>
                        </td>
                        <td>
                        <?php
                        $tca = get_sub_field('tournament_competition_application');
                        $tca_radio=$tca['tournament_competition_application_radio'];
                        $tca_file=$tca['tournament_competition_application_file'];
                        $tca_comment=$tca['tournament_competition_application_comment'];
                        if ($tca_radio == 'ファイルあり'):
                        ?>
                        <a class="c-table--tournament__icon-btn" href="<?php echo $tca_file; ?>" target="_blank"><span class="u-icon-excel"></span></a>
                        <?php elseif($tca_radio == 'ファイルなし'):?>
                        <?php if($tca_comment):?>
                        <?php echo $tca_comment;?>
                        <?php else:?>
                        -
                        <?php endif;?>
                        <?php endif;?>
                        </td>
                        <td>
                        <?php
                        $tcr = get_sub_field('tournament_competition_result');
                        $tcr_radio=$tcr['tournament_competition_result_radio'];
                        $tcr_file=$tcr['tournament_competition_result_file'];
                        $tcr_comment=$tcr['tournament_competition_result_comment'];
                        if ($tcr_radio == 'ファイルあり'):
                        ?>
                        <a class="c-table--tournament__icon-btn" href="<?php echo $tce_file; ?>" target="_blank"><span class="u-icon-pdf"></span></a>
                        <?php elseif($tcr_radio == 'ファイルなし'):?>
                        <?php if($tcr_comment):?>
                        <?php echo $tcr_comment;?>
                        <?php else:?>
                        -
                        <?php endif;?>
                        <?php endif;?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                        <?php endif; ?>
                
                </tbody>
                </table>
                </div>
            </div>
            <!--c-page-section-->
            <div class="c-page-section">
<h3 class="c-page-section__title">お申し込み</h3>
<div class="c-page-section__body">
  <div class="u-col-wrap">
  <?php $tournament_form=get_field('tournament_form'); ?> 
    <?php if( $tournament_form ): ?>
    <div class="u-col u-col-8">
   <div class="c-desc">
    <?php echo $tournament_form['tournament_form_outline'];?>
    </div>

    <a class="c-btn u-m-top20">申し込みフォームへ
      <span class="u-icon-link--blue"></span>
</a>
    </div>
    <div class="u-col u-col-4 u-border-left">
      <p class="c-page-section__title--sm">郵送の場合</p>
      <div class="c-desc">
      <?php echo $tournament_form['tournament_form_address'];?>
      </div>
    </div>
    <?php endif; ?>
  </div>
 </div>
</div>
<!--./c-page-section-->
<!--c-page-section-->
<div class="c-page-section">
  <h3 class="c-page-section__title">大会概要</h3>
  <div class="c-page-section__body">
  <?php the_field("tournament_about")?>
  <a class="c-btn u-m-top40 u-center" href="<?php echo esc_url( home_url( '/' ) ); ?>tournament-past">過去の市民選手権大会
    <span class="u-icon-link--blue"></span>
</a>
</div>
<!--./c-page-section-->
</div>

          </div>
      </main>
   
    </div>


<?php
get_footer();
