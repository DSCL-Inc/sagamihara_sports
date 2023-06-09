<?php
/**
 * Template Name: 固定ページ - 市民選手権大会
 * Template Post Type: post, page

 */
get_header();
?>
<?php if($_GET['y']):?>
<?php $y=$_GET["y"];?>
<?php elseif(!$_GET['y']):?>
<?php $y=get_field("y_0_y_num");?>
<?php endif;?>
   <?php get_template_part('template-parts/page-mv'); ?>
         <?php 
							$args = array(
								'wildcard_meta_key' => true,
								'post_type' => 'civic_tournament', 
								'posts_per_page' => -1,
								'order' => 'ASC',
								'meta_query'=>array(
									'relation'=>"AND",
							array(
										'key'=>"tournament_year",
										"value"=>$y,
										'compare'=>'=',
									)
								)							
);								
?>
      <main class="l-main">

					
        <div class="c-page-container l-wrap">
			
	   <ul class="c-page-nav">
		   <?php if(have_rows("y")):while(have_rows('y')): the_row();?>
		   <li class="c-page-nav__item <?php ($y==get_sub_field("y_num")) ? print " is-current" : 0;?>"><a href="?y=<?php the_sub_field("y_num");?>" class="c-page-nav__item__link"><?php the_sub_field("y_wareki");?></a></li>
		   <?php endwhile;endif;?>
            </ul>
		   <?php   $posts= get_posts( $args );
    if( $posts ) : ?>
               <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>		
          <div class="l-content u-shadow">
            <div class="c-page-section">
              <h3 class="c-page-section__title">種目一覧</h3>
              <div class="c-page-section__body">
       
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
		   <?php if(have_rows('tournament')): ?>
		<div>
        <?php while(have_rows('tournament')): the_row(); ?>
      <div class="p-tournament__table__row">
      <div  class="p-tournament__table__row__title"><?php the_sub_field('tournament_name'); ?></div>
      <div  class="p-tournament__table__row__item-wrap">
		   <?php if(have_rows('tournament_type_row')): ?>
        <?php while(have_rows('tournament_type_row')): the_row(); ?>
      <div  class="p-tournament__table__row__item">
		  <div><?php  the_sub_field('tournament_type');?></div>
      <div><?php  the_sub_field('tournament_date');?></div>
        <div>
			<?php the_sub_field('tournament_place'); ?><span class="u-icon--external"></span>
		  </div>
        <div  class="p-tournament__table__doc"><div>
			 <?php
                          $tcp = get_sub_field('tournament_point');
                          $tcp_radio=$tcp['tournament_point_radio'];
                          $tcp_file=$tcp['tournament_point_file'];
                          $tcp_comment=$tcp['tournament_point_comment'];
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
			</div><div><?php
                        $tca = get_sub_field('tournament_application');
                        $tca_radio=$tca['tournament_application_radio'];
                        $tca_file=$tca['tournament_application_file'];
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
                        $tcr = get_sub_field('tournament_result');
                        $tcr_radio=$tcr['tournament_result_radio'];
                        $tcr_file=$tcr['tournament_result_file'];
                        $tcr_comment=$tcr['tournament_result_comment'];
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
                        $tcf = get_sub_field('tournament_form');
                        $tcf_radio=$tcf['tournament_form_radio'];
                        $tcf_id=$tcf['tournament_form_id'];	
			  					$tcf_comment=$tcf['tournament_form_comment'];
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
		</div>
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
		  
	     <?php endforeach; ?>
	<?php endif; ?>
    <?php wp_reset_postdata(); //クエリのリセット ?>
    <?php get_template_part('advertise_banner'); ?>
      </main>
   


<?php
get_footer();
