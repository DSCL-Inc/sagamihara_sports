<?php
/**
 * Template Name: アーカイブページ - 協会事業
 * Template Post Type: post, page
 */
get_header();
?>
<?php if($_GET['y']):?>
<?php $y=$_GET["y"];?>
<?php elseif(!$_GET['y']):?>
<?php $y=get_field("y_0_y_num");?>
<?php endif;?>
<main class="l-main">
   <?php get_template_part('template-parts/page-mv'); ?>
        <div class="c-page-container l-wrap">
			   <ul class="c-page-nav">
		   <?php if(have_rows("y")):while(have_rows('y')): the_row();?>
		   <li class="c-page-nav__item <?php ($y==get_sub_field("y_num")) ? print " is-current" : 0;?>"><a href="?y=<?php the_sub_field("y_num");?>" class="c-page-nav__item__link"><?php the_sub_field("y_wareki");?></a></li>
		   <?php endwhile;endif;?>
            </ul>
          <div class="l-content u-shadow">
            <div class="c-page-section">
				<h3 class="c-page-section__title">
				<?php if(have_rows("y")):while(have_rows('y')): the_row();?>
					<?php ($y==get_sub_field("y_num"))?the_sub_field("y_wareki"): 0;?><?php endwhile;?><?php endif;?>協会事業
				</h3>
              <div class="c-page-section__body">
              <?php get_template_part('templates/project/project_list'); ?>
        </div>
          </div>
			   
          </div>
		  </div>
		  <?php get_template_part('advertise_banner'); ?>
      </main>
   

<?php
get_footer();
