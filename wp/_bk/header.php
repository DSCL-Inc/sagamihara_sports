<!DOCTYPE html>

<html>

	<head>
    
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Googleで検索した時に見えるキャプション" />
<meta property="og:url" content="http://xxxxxx.com" />
<meta property="og:title" content="SNSで共有した時に見えるページ名" />
<meta property="og:type" content="website" />
<meta property="og:description" content="SNSで共有した時に見えるキャプション" />
<meta property="og:image" content="http://xxxx.png" />
<meta property="og:site_name" content="SNSで共有した時に見えるサイト名" />
<meta property="og:locale" content="ja_JP" />
<meta property="fb:app_id" content="App-ID（15文字の半角数字）" />
<meta name="twitter:card" content="summary_large_image" />
<link href="" rel="apple-touch-icon" />
<link rel="shortcut icon" href="../../../favicon.ico" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
<script
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
  type="text/javascript"
  defer
></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js" type="text/javascript" defer></script>

		<?php wp_head(); ?>
	</head>
<div class="l-container">
	
	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
<header class="l-header">
  <div class="l-header-nav">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-header__logo">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/image/l-header-logo.png"
        alt="公益財団法人相模原市スポーツ協会"
      />
    </a>
    <ul class="l-header__menu">
      <li class="l-header__menu__item l-header__menu__item--about">
        <a class="l-header__menu__item__link">
          <span class="u-icon-header-menu--about"></span>
          <p class="l-header__menu__item-name">スポーツ協会</p>
          <ul class="l-header__dropdown-menu">
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>about" class="l-header__dropdown-menu__item__link"
                >スポーツ協会について</a
              >
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>facility" class="l-header__dropdown-menu__item__link"
                >指定管理施設</a
              >
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>access" class="l-header__dropdown-menu__item__link"
                >営業・アクセス</a
              >
            </li>
          </ul>
        </a>
      </li>
      <li class="l-header__menu__item l-header__menu__item--event">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>project" class="l-header__menu__item__link">
          <span class="u-icon-header-menu--event"></span>
          <p class="l-header__menu__item-name">イベント情報</p>
          <ul class="l-header__dropdown-menu">
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>project" class="l-header__dropdown-menu__item__link"
                >協会事業</a
              >
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>tournament" class="l-header__dropdown-menu__item__link"
                >市民選手権大会</a
              >
            </li>
          </ul>
        </a>
      </li>
      <li class="l-header__menu__item l-header__menu__item--junior">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior" class="l-header__menu__item__link">
          <span class="u-icon-header-menu--junior"></span>
          <p class="l-header__menu__item-name">スポーツ少年団</p>
          <ul class="l-header__dropdown-menu">
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior" class="l-header__dropdown-menu__item__link"
                >スポーツ少年団とは</a>
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior/register" class="l-header__dropdown-menu__item__link"
                >登録・更新方法</a>
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior/member" class="l-header__dropdown-menu__item__link"
                >登録団体</a>
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior/schejule" class="l-header__dropdown-menu__item__link"
                >年間行事予定</a>
            </li>
          </ul>
        </a>
      </li>
      <li class="l-header__menu__item l-header__menu__item--member">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>member" class="l-header__menu__item__link">
          <span class="u-icon-header-menu--member"></span>
          <p class="l-header__menu__item-name">加盟団体</p>
        </a>
      </li>
    </ul>
    <div class="l-header__submenu">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>access" class="l-header__submenu__item">
        <span class="u-icon-header-submenu--access"></span>
        <p class="l-header__menu__item-name">営業・アクセス</p>
      </a>
      <a href="" class="l-header__submenu__item">
        <span class="u-icon-header-submenu--login"></span>
        <p class="l-header__menu__item-name">関係者専用</p>
      </a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact" class="l-header__submenu__item">
        <span class="u-icon-header-submenu--contact"></span>
        <p class="l-header__menu__item-name">お問い合わせ</p>
      </a>
    </div>
  </div>
</header>

		<!-- #site-header -->

		<?php
		// Output the menu modal.
		//get_template_part( 'template-parts/modal-menu' );
