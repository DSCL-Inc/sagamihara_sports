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
			  <?php get_template_part('templates/project/project_detail'); ?> 
            </div>
		 </div>
		  
            <div class="p-project-back u-flex-center">
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>project"
            ><span class="u-icon-back-link--blue"></span>協会事業一覧へ戻る</a>
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>
   

<?php
get_footer();
