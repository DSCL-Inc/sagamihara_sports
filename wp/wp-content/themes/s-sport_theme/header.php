<!DOCTYPE html>
<html>
	<head> 
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140389676-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140389676-2');
</script>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>公益財団法人相模原市スポーツ協会</title>
<link href="<?php echo get_template_directory_uri(); ?>/assets/image/apple-touch-icon.png" rel="apple-touch-icon" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/image/favicon.ico" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

		<script
  src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
  type="text/javascript"
  defer
></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
  type="text/javascript"
  defer
></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js" type="text/javascript" defer></script>
		<?php wp_head(); ?>
	</head>
<div class="l-container">
	<body <?php body_class(); ?> id="backtotop">
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
      <li class="l-header__menu__item l-header__menu__item--about" ontouchstart="">
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
                >指定管理者施設</a
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
      <li class="l-header__menu__item l-header__menu__item--event" ontouchstart="">
        <a class="l-header__menu__item__link">
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
      <li class="l-header__menu__item l-header__menu__item--junior" ontouchstart="">
        <a class="l-header__menu__item__link">
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
    <ul class="l-header__submenu">
    <li class="l-header__submenu__item">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>access" class="l-header__submenu__item__link">
        <span class="u-icon-header-submenu--access"></span>
		  <p class="l-header__menu__item-name">営業・アクセス</p>
      </a>
      </li>
      <li class="l-header__submenu__item" ontouchstart="">
      <a class="l-header__submenu__item__link">
        <span class="u-icon-header-submenu--login"></span>
        <p class="l-header__menu__item-name">関係者専用</p>
        
      </a>
      <ul class="l-header__dropdown-menu">
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>junior-stakeholder" class="l-header__dropdown-menu__item__link"
                >スポーツ少年団</a
              >
            </li>
            <li class="l-header__dropdown-menu__item">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>member-stakeholder" class="l-header__dropdown-menu__item__link"
                >加盟団体</a
              >
            </li>
          </ul>
    </ul>
	  <div class="l-header__font-size">
      <span>文字サイズ</span>
      <div class="l-header__font-size__btn">
        <button class="js-font-size js-font-size--normal">
          標準
        </button>
        <button class="js-font-size js-font-size--large">大</button>
      </div>
    </div>
  </div>
</header>

		<!-- #site-header -->

