<?php 

    $tournament_head="tournament";

?>
<div class="p-tournament__table">
       <div class="p-tournament__table__head">
      <div>種目</div>
		   <div>種別</div>
      <div>開催日</div>
      <div>会 場</div>
      <div class="p-tournament__table__doc">
		  <div>開催要項</div>
		  <div>申込用紙<span>(申込期間)</span></div>
		  <div>結果</div>
		  <div>申込フォーム</div>
    </div>
    </div>
    <div class="p-tournament__table__body">
		   <?php if(have_rows($tournament_head)): ?>
        <?php while(have_rows($tournament_head)): the_row(); ?>
      <div class="p-tournament__table__row">
      <div class="p-tournament__table__row__title"><?php the_sub_field('tournament_name'); ?></div>
      <div class="p-tournament__table__row__item-wrap">
		   <?php if(have_rows($tournament_head.'_type_row')): ?>
        <?php while(have_rows($tournament_head.'_type_row')): the_row(); ?>
      <div  class="p-tournament__table__row__item">
		  <div><?php  the_sub_field($tournament_head.'_type');?></div>
      <div><?php  the_sub_field($tournament_head.'_date');?></div>
        <div>
			<?php the_sub_field($tournament_head.'_place'); ?><span class="u-icon--external"></span>
		  </div>
        <div  class="p-tournament__table__doc">
          <div>
			 <?php
                          $tcp = get_sub_field($tournament_head.'_point');
                          $tcp_radio=$tcp[$tournament_head.'_point_radio'];
                          $tcp_file=$tcp[$tournament_head.'_point_file'];
                          $tcp_comment=$tcp[$tournament_head.'_point_comment'];
                          if ($tcp_radio == 'ファイルあり'):
                          ?>
			  <a class="p-tournament__table__icon-btn" href="<?php echo $tcp_file; ?>" target="_blank">開催要項<span class='u-icon-<?php 
							  if(strrchr($tcp_file, '.') == '.docs'||strrchr($tcp_file, '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($tcp_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tcp_file, '.') == '.xls'||strrchr($tcp_file, '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>'></span></a>
                          
                        <?php endif;?>
			  <?php if($tcp_comment):?>
                          <?php echo $tcp_comment;?>
                          <?php endif;?>
			</div>
          <div>
			  <?php
                        $tca = get_sub_field($tournament_head.'_application');
                        $tca_radio=$tca[$tournament_head.'_application_radio'];
                        $tca_file=$tca[$tournament_head.'_application_file'];
                        $tca_comment=$tca[$tournament_head.'_application_comment'];
                        if ($tca_radio == 'ファイルあり'):
                        ?>
			  <a class="p-tournament__table__icon-btn" href="<?php echo $tca_file; ?>" target="_blank">申込用紙<span class='u-icon-<?php 
							  if(strrchr($tca_file, '.') == '.docs'||strrchr($tca_file, '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($tca_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tca_file, '.') == '.xls'||strrchr($tca_file, '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>'></span></a>
							<?php elseif($tca_radio == 'フォーム'):?>
							<a class="u-text-link" href="" target="_blank">フォーム</a>
                        
                        <?php endif;?>
			  <?php if($tca_comment):?>
			  <span>
                        <?php echo $tca_comment;?>
			  </span>
                        <?php endif;?>
			</div>
          <div>
			<?php
                        $tcr = get_sub_field($tournament_head.'_result');
                        $tcr_radio=$tcr[$tournament_head.'_result_radio'];
                        $tcr_file=$tcr[$tournament_head.'_result_file'];
                        $tcr_comment=$tcr[$tournament_head.'_result_comment'];
                        if ($tcr_radio == 'ファイルあり'):
                        ?><a class="p-tournament__table__icon-btn" href="<?php echo $tcr_file; ?>" target="_blank">結果<span class="u-icon-<?php 
							  if(strrchr($tcr_file, '.') == '.docs'||strrchr($tcr_file, '.') == '.doc'):
							  echo "word";
							  elseif(strrchr($tcr_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tcr_file, '.') == '.xls'||strrchr($tcr_file, '.') == '.xlsx'):
							  echo "excel";
							  endif;
							  ?>"></span></a>
                        
                        <?php endif;?>
			  <?php if($tcr_comment):?>
			   <span>
                        <?php echo $tcr_comment;?>
				   </span>
                        <?php endif;?>
			</div>
          <div>
			  <?php
                        $tcf = get_sub_field($tournament_head.'_form');
                        $tcf_radio=$tcf[$tournament_head.'_form_radio'];
                        $tcf_id=$tcf[$tournament_head.'_form_id'];	
			  					$tcf_comment=$tcf[$tournament_head.'_form_comment'];
			  					 if ($tcf_radio== 'フォームあり'):
                        ?>
			  <a class="p-tournament__table__form" href="<?php echo esc_url( home_url( '/' ) ); ?>tournament/form?id=<?php echo $tcf_id ?>" >申込フォーム</a>          
                        <?php endif;?>
			  <?php if($tcf_comment):?>
			  <span>
                        <?php echo $tcf_comment;?>
				  </span>
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