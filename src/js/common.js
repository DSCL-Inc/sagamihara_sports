$(function() {
  $(".js-slick").slick({
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000
  });
  //sp-menu
  $(".sp-menu").click(function() {
    if ($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(".page_header_nav").slideToggle(150);
    } else {
      $(this).addClass("open");
      $(".page_header_nav").slideToggle(150);
    }
  });

  $(".message-slide").slick({
    autoplay: true,
    speed: 1500,
    fade: true,
    arrows: "false",
    swipe: false,
    pauseOnHover: false
  });

  //アコーディオン
  $(document).ready(function() {
    if ($(window).width() < 768) {
      $(".page_header_menu_itm-parent").click(function() {
        $(this)
          .find(".page_header_smenu")
          .slideToggle(150);
        $(this).toggleClass("show");
      });
    }
  });

  //スクロール

  $("#contact").click(function() {
    if (!$(".contact").hasClass("show")) {
      $(".contact").addClass("show");
      $(this).addClass("btn_contact--open");
    } else {
      $(".contact").removeClass("show");
      $(this).removeClass("btn_contact--open");
    }
  });

  //ページトップ
  // #で始まるアンカーをクリックした場合に処理
  $("#pagetop").click(function() {
    // スクロールの速度
    var speed = 400;
    $("body,html").animate({ scrollTop: 0 }, speed, "swing");
    return false;
  });
});
