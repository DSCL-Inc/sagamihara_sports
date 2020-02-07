

$(function(){
//sp-menu
    $('.sp-menu').click(function () {
        if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(".page_header_nav").slideToggle(150);

        }
        else{
            $(this).addClass("open");
            $(".page_header_nav").slideToggle(150);
        }

        
    });
   

    //アコーディオン
    $(document).ready(function() {
        if($(window).width()<768){
        $('.page_header_menu_itm-parent').click(function () {
            $(this).find(".page_header_smenu").slideToggle(150);
            $(this).toggleClass("show");
        });
        }
    });

var url = location.href;

//スクロール

    var btn_show = $(".page_main").offset();
    $(window).on('scroll', _.throttle(updatePosition, 200));
  
  function updatePosition() {
  if ($(this).scrollTop() > btn_show.top) {
    $('.wd_area').fadeIn(200);
  } else {
    $('.wd_area').fadeOut(200);
    if($(".contact").hasClass("show")){
            $(".contact").removeClass("show");
            $(".btn_contact").removeClass("btn_contact--open");
            
    }
  }
}




$("#contact").click(function(){
    if(!$(".contact").hasClass("show")){
        $(".contact").addClass("show");
        $(this).addClass("btn_contact--open");
        
    }
    else{
        $(".contact").removeClass("show");
        $(this).removeClass("btn_contact--open");
    }
    });


//ページトップ
    // #で始まるアンカーをクリックした場合に処理
    $('#pagetop').click(function() {
       // スクロールの速度
       var speed = 400;
       $('body,html').animate({scrollTop:0}, speed, 'swing');
       return false;
    });

});