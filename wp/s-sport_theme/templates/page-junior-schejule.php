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
  <div class="p-calender-list">
				 <?php $month_reset=null; ?> 
				  <?php for($j =1;$j<=12;$j++):?>
				  <?php  if($j<=9):?>
				  		<?php
				  $year=$y;
				  $month=$j+3;
				  ?>  
				  <?php  else:?> 
					 <?php
				  		$year=$y+1;
					  if(isset($month_reset)):
					  		$month++;
					  else:
						   $month=1;
						   $month_reset=1;
					  endif;
					  ?>
				  <?php  endif;?>
				   <?php 
							$args[$j] = array(
								'wildcard_meta_key' => true,
								'post_type' => 'junior_project', 
								'posts_per_page' => -1,
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'orderby'=>'meta_value_num',
								'meta_query'=>array(
									'relation'=>"AND",
									array(
											'value'=>array(date($year."/".$month."/01"),date($year."/".$month."/31")),
											'compare'=>"BETWEEN",
											'type' => 'DATE',
										),
									array(
										'key'=>"junior_project_year",
										"value"=>$y,
										'compare'=>'=',
									)
								)							
);								
    $posts[$j] = get_posts( $args[$j] );
    if( $posts[$j] ) : ?>
              <div class="p-calender-list__row">
                <div class="p-calender-list__row__head"><?php echo $month;?>月</div>
                <div class="p-calender-list__row__body">
               <?php foreach( $posts[$j] as $post ) : setup_postdata( $post ); ?>		
					<?php
    				$date_from_get = get_sub_field( 'junior_project_date_item');
					$date_to_get = get_sub_field( 'junior_project_date_item_to');
						?>
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
                    <?php if(have_rows('junior_project_date')): ?>
						<?php $i=0;?>
                <?php while(have_rows('junior_project_date')): the_row(); ?>								
										<?php
						$date_from_get = get_sub_field( 'junior_project_date_item', false, false);
						$date_to_get = get_sub_field( 'junior_project_date_item_to', false, false);
							$date_from_data = new DateTime($date_from_get); 
							$date_to_data = new DateTime($date_to_get); 
							?>
										<?php if($i>0): echo "・";endif;?>
						<?php echo $date_from_data->format("j");?>
						<?php if($date_to_get):?>
							<?php echo " - ";?>
								<?php if($date_to_data->format("m")!=$date_from_data->format("m")):?>
										<?php echo $date_to_data->format("m/j"); ?>日
												<?php else:?>
														<?php echo $date_to_data->format("j"); ?>日
											<?php endif;?>
										<?php else:?>日
										<?php endif;?>
										<?php $i++;?>
								<?php endwhile; ?>
                    <?php endif;?>
                    </div>
                    <div class="p-calender-list__item__title">
                    <?php the_title(); ?>
                    </div>
                    <?php if(get_field("junior_project_thumbnail")):?>
                    <div class="p-calender-list__item__img">
                      <img src="<?php the_field("junior_project_thumbnail")?>" alt="<?php the_title(); ?>" />
                    </div>
                    <?php endif;?>
                  </a>
                  <?php endforeach; ?>
    <?php wp_reset_postdata(); //クエリのリセット ?>
                </div>
              </div>
	    <?php endif; ?>
   <?php endfor;?>
	  <?php 
							$undecided_args = array(
								'wildcard_meta_key' => true,
								'post_type' => 'junior_project', 
								'posts_per_page' => -1,
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'orderby'=>'meta_value_num',
								'meta_query'=>array(
									'relation'=>"AND",
									array(
										array(
											'key'=>"project_date_undecided",
												'value'=>"1",
												'compare'=>"="
											),
										array(
											'key'=>"project_year",
											"value"=>$y,
											'compare'=>'=',
										)
									)
									
								)							
);								
	$undecided_posts = get_posts( $undecided_args);
    if( $undecided_posts ) : ?>
				  		<?php
				  $year=$y;
				  ?>
				  <div class="p-calender-list__row">
					  <div class="p-calender-list__row__head">未定</div>
                <div class="p-calender-list__row__body">
               <?php foreach( $undecided_posts as $post ) : setup_postdata( $post ); ?>						
                  <a href="<?php the_permalink();?>" class="p-calender-list__item">
                    <div class="p-calender-list__item__date">
						<?php if(get_field('project_date_undecided_comment')): ?>
						<?php the_field('project_date_undecided_comment'); ?>
						<?php endif;?>
                    </div>
                    <div class="p-calender-list__item__title">
						<?php if(get_the_title()):?>
                    <?php the_title(); ?>
						<?php endif;?>
                    </div>
                    <?php if(get_field("project_thumbnail")):?>
                    <div class="p-calender-list__item__img">
                      <img src="<?php the_field("project_thumbnail")?>" alt="<?php the_title(); ?>" />
                    </div>
					  <?php endif;?>

                  </a>
                  <?php endforeach; ?>
    <?php wp_reset_postdata(); //クエリのリセット ?>
                </div>
              </div>
				      
<?php endif; ?>
				    
            </div>

</div>
</div>
			  <!--./c-page-section-->
			  <div class="c-page-section">
              <h3 class="c-page-section__title">種目別大会</h3>
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
			<a>
			<?php the_sub_field('junior_tournament_place'); ?><span class="u-icon--external"></span>
			</a>
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
                          <a class="p-tournament__table__icon-btn" href="<?php echo $tcp_file; ?>" target="_blank"><span class="u-icon-<?php 
							  if(strrchr($tcp_file, '.') == '.word'):
							  echo "word";
							  elseif(strrchr($tcp_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tcp_file, '.') == '.excel'):
							  echo "excel";
							  endif;
							  ?>"></span></a>
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
                        $tca = get_sub_field('junior_tournament_application');
                        $tca_radio=$tca['junior_tournament_application_radio'];
                        $tca_file=$tca['junior_tournament_application_file'];
                        $tca_comment=$tca['junior_tournament_application_comment'];
                        if ($tca_radio == 'ファイルあり'):
                        ?>
                        <a class="p-tournament__table__icon-btn" href="<?php echo $tca_file; ?>" target="_blank"><span class="u-icon-<?php 
							  if(strrchr($tcp_file, '.') == '.word'):
							  echo "word";
							  elseif(strrchr($tcp_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tcp_file, '.') == '.excel'):
							  echo "excel";
							  endif;
							  ?>"></span></a>
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
                        $tcr = get_sub_field('junior_tournament_result');
                        $tcr_radio=$tcr['junior_tournament_result_radio'];
                        $tcr_file=$tcr['junior_tournament_result_file'];
                        $tcr_comment=$tcr['junior_tournament_result_comment'];
                        if ($tcr_radio == 'ファイルあり'):
                        ?>
                        <a class="p-tournament__table__icon-btn" href="<?php echo $tce_file; ?>" target="_blank"><span class="u-icon-<?php 
							  if(strrchr($tcp_file, '.') == '.word'):
							  echo "word";
							  elseif(strrchr($tcp_file, '.') == '.pdf'):
							  echo "pdf";
							  elseif(strrchr($tcp_file, '.') == '.excel'):
							  echo "excel";
							  endif;
							  ?>"></span></a>
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
                        $tcf = get_sub_field('junior_tournament_form');
                        $tcf_radio=$tcf['junior_tournament_form_radio'];
                        $tcf_id=$tcf['junior_tournament_form_id'];		  
			    //  $tcf_comment=$tcf['tournament_competition_form_comment'];
			  					 if ($tcf_radio== 'フォームあり'):
                        ?>
			  <a class="p-tournament__table__form" href="<?php echo esc_url( home_url( '/' ) ); ?>tournament/form?id=<?php echo $tcf_id ?>" >申込フォーム</a>
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
          </div>
			 
	    
      </div>
      <?php get_template_part('advertise_banner'); ?>
      </main>
  


<?php
get_footer();
