<?php
/**
 * Template Name: 固定ページ - 市民選手権大会
 * Template Post Type: post, page

 */
get_header();
?>
      <main class="l-main">
   <?php get_template_part('template-parts/page-mv'); ?>
    
        
        <div class="c-page-container l-wrap">
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <h3 class="c-page-section__title">競技科目一覧</h3>
              <div class="c-page-section__body">
              
  <div class="p-tournament__table">
       <div class="p-tournament__table__head">
      <div>競技名</div>
		   <div>種別</div>
      <div>開催日</div>
      <div>会 場</div>
      <div class="p-tournament__table__doc">
      <div>開催要項</div>
      <div>申請方法</div>
      <div>結果</div>
      <div>申込フォーム</div>
    </div>
    </div>
    <div class="p-tournament__table__body">
		   <?php if(have_rows('tournament')): ?>
        <?php while(have_rows('tournament')): the_row(); ?>
      <div class="p-tournament__table__row">
      <div  class="p-tournament__table__row__title"><?php the_sub_field('tournament_competition_name'); ?></div>
      <div  class="p-tournament__table__row__item-wrap">
		   <?php if(have_rows('tournament_type_row')): ?>
        <?php while(have_rows('tournament_type_row')): the_row(); ?>
      <div  class="p-tournament__table__row__item">
		  <div><?php  the_sub_field('tournament_type');?></div>
      <div><?php  the_sub_field('tournament_date');?></div>
        <div>
			<a>
			<?php the_sub_field('tournament_competition_place_name'); ?><span class="u-icon--external"></span>
			</a>
		  </div>
        <div  class="p-tournament__table__doc">
          <div>
			 <?php
                          $tcp = get_sub_field('tournament_point');
                          $tcp_radio=$tcp['tournament_point_radio'];
                          $tcp_file=$tcp['tournament_point_file'];
                          $tcp_comment=$tcp['tournament_point_comment'];
                          if ($tcp_radio == 'ファイルあり'):
                          ?>
                          <a class="p-tournament__table__icon-btn" href="<?php echo $tcp_file; ?>" target="_blank"><span class="u-icon-word"></span></a>
                          <?php elseif($tcp_radio == 'ファイルなし'):?>
                          <?php if($tcp_comment):?>
                          <?php echo $tcp_comment;?>
                          <?php else:?>
                          -
                          <?php endif;?>
                        <?php endif;?>
			</div>
          <div>
			  <?php
                        $tca = get_sub_field('tournament_application');
                        $tca_radio=$tca['tournament_application_radio'];
                        $tca_file=$tca['tournament_application_file'];
                        $tca_comment=$tca['tournament_application_comment'];
                        if ($tca_radio == 'ファイルあり'):
                        ?>
                        <a class="p-tournament__table__icon-btn" href="<?php echo $tca_file; ?>" target="_blank"><span class="u-icon-excel"></span></a>
							<?php elseif($tca_radio == 'フォーム'):?>
							<a class="u-text-link" href="" target="_blank">フォーム</a>
                        <?php elseif($tca_radio == 'ファイルなし'):?>
                        <?php if($tca_comment):?>
                        <?php echo $tca_comment;?>
                        <?php else:?>
                        -
                        <?php endif;?>
                        <?php endif;?>
			</div>
          <div>
			<?php
                        $tcr = get_sub_field('tournament_result');
                        $tcr_radio=$tcr['tournament_result_radio'];
                        $tcr_file=$tcr['tournament_result_file'];
                        $tcr_comment=$tcr['tournament_result_comment'];
                        if ($tcr_radio == 'ファイルあり'):
                        ?>
                        <a class="p-tournament__table__icon-btn" href="<?php echo $tce_file; ?>" target="_blank"><span class="u-icon-pdf"></span></a>
                        <?php elseif($tcr_radio == 'ファイルなし'):?>
                        <?php if($tcr_comment):?>
                        <?php echo $tcr_comment;?>
                        <?php else:?>
                        -
                        <?php endif;?>
                        <?php endif;?>
			</div>
          <div>
			  <?php
                        $tcf = get_sub_field('tournament_form');
                        $tcf_radio=$tcf['tournament_form_radio'];
                        $tcf_id=$tcf['tournament_form_id'];		  
			    //  $tcf_comment=$tcf['tournament_competition_form_comment'];
			   if ($tcf_radio== 'フォームあり'):
                        ?>
								<form method="post" action="/page-b">
									<input type="text" name="tournament_form_id" value="<?php echo $tcf_id ?>">
									<input type="submit" value="申込フォーム">
									</form>
                        <a class="p-tournament__table__icon-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>tournament/form" ></a>
                        <?php elseif($tcf_radio == 'フォームなし'):?>
                        <?php if($tcf_comment):?>
                        <?php echo $tcf_comment;?>
                        <?php else:?>
                        -
                        <?php endif;?>
                        <?php endif;?>
			</div>
      </div>
      </div>
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
<!--c-page-section-->
<div class="c-page-section">
  <h3 class="c-page-section__title">大会概要</h3>
  <div class="c-page-section__body">
  <?php the_field("tournament_about")?>
</div>
<!--./c-page-section-->

</div>

          </div>
			  </div>
      </main>
   


<?php
get_footer();
