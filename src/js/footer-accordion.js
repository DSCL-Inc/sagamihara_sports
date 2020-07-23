$(function() {
  $(document).on("click", ".js-sp-accordion", function() {
    $(this).toggleClass("is-open");

    if (!$(this).hasClass("is-open")) {
      $(this)
        .next()
        .slideUp();
    } else {
      $(this)
        .next()
        .slideDown();
    }
  });
});
