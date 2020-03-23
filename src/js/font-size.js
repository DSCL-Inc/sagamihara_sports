$(function() {
  $(".js-font-size").click(function() {
    if (!$(this).hasClass("is-active")) {
      $(".js-font-size").removeClass("is-active");
      $(this).addClass("is-active");
    }
  });
  $(".js-font-size--normal").click(function() {
    $(".l-container").css("fontSize", "1rem");
  });
  $(".js-font-size--large").click(function() {
    $("p,li,a").css("fontSize", "105%");
  });
});
