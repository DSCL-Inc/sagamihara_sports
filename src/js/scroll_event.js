$(window).scroll(function() {
  $(".style__block,.js-text-show,.js-img-show").each(function(index) {
    var targetPos = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= targetPos - windowHeight + windowHeight / 5) {
      $(this).addClass("is-show");
    }
  });
});
