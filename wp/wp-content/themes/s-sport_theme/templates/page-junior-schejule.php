<?php
/**
 * Template Name: 固定ページ - スポーツ少年団/年間行事予定
 * Template Post Type: post, page

 */
get_header();

if($_GET["y"]):
$y=$_GET["y"];
else:
$y=get_field("y_0_y_num");
endif;

?>
         
      <main class="l-main">
		  <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
	   <ul class="c-page-nav">
		   <?php if(have_rows("y")):while(have_rows('y')): the_row();?>
		   <li class="c-page-nav__item <?php ($y==get_sub_field("y_num")) ? print " is-current" : 0;?>"><a href="?y=<?php the_sub_field("y_num");?>" class="c-page-nav__item__link"><?php the_sub_field("y_wareki");?></a></li>
		   <?php endwhile;endif;?>
            </ul>
          <div class="l-content u-shadow">
<!--c-page-section-->
<div class="c-page-section">
  <div class="c-page-section__body">
  <?php get_template_part('templates/project/project_list'); ?>
</div>
</div>
			  <!--./c-page-section-->
			  <div class="c-page-section">
              <h3 class="c-page-section__title">種目別大会</h3>
              <div class="c-page-section__body">
                <div class="p-tournament__table">
       <div class="p-tournament__table__head">
      <div>種目</div>
		   <div>種別</div>
      <div>開催日</div>
      <div>会 場</div>
      <div class="p-tournament__table__doc">
		  <div>開催要項</div>
		  <div>申込用紙</div>
		  <div>結果</div>
		  <div>申込フォーム</div>
    </div>
    </div>
    <div class="p-tournament__table__body">
		   <?php
						$the_query = new WP_Query(
							array(
								'posts_per_page' => '-1',
								'post_type' => 'junior__tournament' ,
								'meta_query'=>array(
									'relation'=>"AND",
										array(
										'key'=>"junior_tournament_year",
										"value"=>$y,
										'compare'=>'=',
									)
								)		
							)
						);
						?>
<?php if ( $the_query->have_posts() ) : ?>
		<div>
  <?php while ( $the_query->have_posts() ) : ?>
    <?php $the_query->the_post(); ?>
      <div class="p-tournament__table__row">
      <div  class="p-tournament__table__row__title"><?php the_field('junior_tournament_name'); ?></div>
      <div  class="p-tournament__table__row__item-wrap">
		   <?php if(have_rows('junior_tournament_type_row')): ?>
        <?php while(have_rows('junior_tournament_type_row')): the_row(); ?>
      <div  class="p-tournament__table__row__item">
		  <div><?php  the_sub_field('junior_tournament_type');?></div>
      <div><?php  the_sub_field('junior_tournament_date');?></div>
        <div>
			<?php the_sub_field('junior_tournament_place'); ?><span class="u-icon--external"></span>
		  </div>
        <div  class="p-tournament__table__doc">
          <div>
			 <?php
                          $tcp = get_sub_field('junior_tournament_point');
                          $tcp_radio=$tcp['junior_tournament_point_radio'];
                          $tcp_file=$tcp['junior_tournament_point_file'];
                          $tcp_comment=$tcp['junior_tournament_point_comment'];
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
			  <span>
                          <?php echo $tcp_comment;?>
				  </span>
                          <?php endif;?>
			</div>
          <div>
			  <?php
                        $tca = get_sub_field('junior_tournament_application');
                        $tca_radio=$tca['junior_tournament_application_radio'];
                        $tca_file=$tca['junior_tournament_application_file'];
                        $tca_comment=$tca['tournament_application_comment'];
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
                        <?php endif;?>
			  <?php if($tcp_comment):?>
			  <span>
                          <?php echo $tcp_comment;?>
				  </span>
                          <?php endif;?>
			</div>
          <div>
			<?php
                        $tcr = get_sub_field('junior_tournament_result');
                        $tcr_radio=$tcr['junior_tournament_result_radio'];
                        $tcr_file=$tcr['junior_tournament_result_file'];
                        $tcr_comment=$tcr['junior_tournament_result_comment'];
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
                        $tcf = get_sub_field('junior_tournament_form');
                        $tcf_radio=$tcf['junior_tournament_form_radio'];
                        $tcf_id=$tcf['junior_tournament_form_id'];		 
			  $tcf_comment=$tcf['tournament_form_comment'];
			  					 if ($tcf_radio== 'フォームあり'):
                        ?>
			  <a class="p-tournament__table__form" href="<?php echo esc_url( home_url( '/' ) ); ?>junior/form?id=<?php echo $tcf_id ?>" >申込フォーム</a>
                        
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
		</div>
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
