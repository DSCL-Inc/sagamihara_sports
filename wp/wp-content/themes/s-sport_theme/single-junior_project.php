<?php
/**
 * Template Name: 投稿ページ - スポ少年間行事予定
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
          <a class="c-text-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>/junior/schejule"
            ><span class="u-icon-back-link--blue"></span>スポ少年間行事予定一覧へ戻る</a
          >
        </div>
        <?php get_template_part('advertise_banner'); ?>
      </main>
   

<?php
get_footer();
