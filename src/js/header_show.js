var startPos = 0,
  winScrollTop = 0,
  headerHeight = $(".l-header").height();
$(window).on("scroll", function() {
  winScrollTop = $(this).scrollTop();
  if (winScrollTop >= headerHeight) {
    if (winScrollTop <= startPos) {
      $(".l-header.is-hide").addClass("is-show");
      $(".l-header.is-hide").css("top", -headerHeight);
      setTimeout(function() {
        $(".l-header").css("top", "0px");
      }, 100);
      setTimeout(function() {
        $(".l-header").removeClass("is-hide");
      }, 200);
    } else {
      $(".l-header").css("top", -headerHeight);
      setTimeout(function() {
        $(".l-header").removeClass("is-show");
      }, 200);
      $(".l-header").addClass("is-hide");
    }
  } else {
    $(".l-header").css("top", 0);
    setTimeout(function() {
      $(".l-header").removeClass("is-show");
    }, 200);
  }
  startPos = winScrollTop;
});
