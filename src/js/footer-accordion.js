$(window).on("load resize", function() {
  var w = $(window).width();
  var x = 768;
  if (w <= x) {
    $(function() {
      $(".js-sp-accordion").on("click", function() {
        $(this).toggleClass("is-open");
        $(this)
          .next()
          .slideToggle();
      });
    });
  }
});
