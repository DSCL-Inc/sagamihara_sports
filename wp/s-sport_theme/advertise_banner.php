<div class="l-wrap">
        <section class="p-top-advertisement p-top__section">
            <div class="p-top-section__head">
              <h4 class="p-top-section__head__title">
                <span
                  class="p-top-section__head__character p-top-section__head__character--ad">
                  </span>広告バナー
              </h4>
              <a class="p-top-head__btn u-shadow" href="<?php echo esc_url( home_url( '/' ) ); ?>banner-guide"
                >詳しく見る<span class="u-icon-right-angle"></span
              ></a>
            </div>
            <div class="l-content u-shadow">
              <div class="p-top-advertisement__list">
                <?php
                  $i=0;
                  $vacant_img_url = get_template_directory_uri()."/assets/image/p-top-advertisement_dummy.png"; //空き枠画像URL
                  if(have_rows('top_advertisement',12)):
                    while(have_rows('top_advertisement',12)):the_row();
                      $top_advertisement=get_sub_field('top_advertisement_group'); 
                      if($top_advertisement):
//ヒアドキュメント開始
echo <<<EOT
<a href="{$top_advertisement['top_advertisement_url']}" target="_blank" rel="noopener" class="p-top-advertisement__list__item">
<img src="{$top_advertisement['top_advertisement_img']}" alt="{$top_advertisement['top_advertisement_name']} ?>"/>
</a>
EOT;
//ヒアドキュメント終了

                      endif;
                      $i++;
                    endwhile;
                  endif;
                  if($i < 10):
                    for($i = $i; $i < 10; $i++):
//ヒアドキュメント開始
echo <<<EOT
<a class="p-top-advertisement__list__item">
  <img src="{$vacant_img_url}" />
</a>
EOT;
//ヒアドキュメント終了
                  endfor; 
                endif;
                ?>
              </div>
            </div>
          </section>
          </div>