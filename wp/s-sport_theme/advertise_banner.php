<div class="l-wrap">
        <section class="p-top-advertisement p-top__section">
            <div class="p-top-section__head">
              <h4 class="p-top-section__head__title">
                <span
                  class="p-top-section__head__character p-top-section__head__character--ad"
                ></span
                >広告バナー
              </h4>
              <a class="p-top-head__btn u-shadow" href="<?php echo esc_url( home_url( '/' ) ); ?>banner-guide"
                >詳しく見る<span class="u-icon-right-angle"></span
              ></a>
            </div>
            <div class="l-content u-shadow">
              <div class="p-top-advertisement__list">
              <?php $i=0; ?>
        <?php if(have_rows('top_advertisement')):?>
              <?php while(have_rows('top_advertisement')):the_row(); ?>
              <?php $top_advertisement=get_sub_field('top_advertisement_group'); ?>
              <?php if($top_advertisement): ?>
                <a href="<?php echo $top_advertisement['top_advertisement_url']; ?>" class="p-top-advertisement__list__item">
                  <img src="<?php echo $top_advertisement['top_advertisement_img'];?>" alt="<?php echo $top_advertisement['top_advertisement_name']; ?>"/>
                </a>
                
              <?php endif; ?>
              <?php $i++;?>
              <?php endwhile; ?>
              <?php endif; ?>
            <?php if($i < 10): ?>
                <?php for($i = $i; $i < 10; $i++):?>
              <a class="p-top-advertisement__list__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/p-top-advertisement_dummy.png" />
                </a>
              <?php endfor; ?>
        <?php endif; ?>
              </div>
            </div>
          </section>
          </div>