$(window).on("load", function() {
  $(function() {
    $("html,body").css({
      overflow: "initial"
    });
    $(".l-loader")
      .delay(1000)
      .queue(function() {
        $(this)
          .addClass("is-loaded")
          .dequeue();
      });

    $(".l-loader")
      .delay(500)
      .queue(function() {
        $(this)
          .remove()
          .dequeue();
      });
  });
});
