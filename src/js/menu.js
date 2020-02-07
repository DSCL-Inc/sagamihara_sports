$(function() {
  $(".l-sp-menu--close").click(function() {
    $(this).removeClass("is-show");
    $(".l-header-nav,.l-sp-menu__bg").removeClass("is-open");
    $(".l-sp-menu--close").removeClass("is-show");

    $(".l-header-nav").addClass("is-close");
    $(".l-header-nav__item").stop();
    $(".l-header-nav__item").removeClass("is-show");
    $(".sp-l-header-nav__sns").removeClass("is-show");
  });

  $(".l-sp-menu").click(function() {
    $(".l-header-nav,.l-sp-menu__bg").addClass("is-open");
    $(".l-header-nav").removeClass("is-close");

    var delay = 200;
    var length = $(".l-header-nav__item").length;

    $(".l-header-nav__item").each(function(i) {
      $(this)
        .delay(i * delay)
        .queue(function() {
          $(this)
            .addClass("is-show")
            .dequeue();
        })
        .delay(length * delay)
        .queue(function() {
          $(".l-sp-menu--close")
            .addClass("is-show")
            .dequeue();
        });
    });
    $(".sp-l-header-nav__sns")
      .delay(length * delay + 300)
      .queue(function() {
        $(this)
          .addClass("is-show")
          .dequeue();
      });
  });

  $(".l-header-nav__item").click(function() {
    if ($(".l-header-nav").hasClass("is-open")) {
      $(".l-header-nav").removeClass("is-close");
    }
    $(".l-sp-menu--close").removeClass("is-show");
    $(".sp-l-header-nav__sns").removeClass("is-show");
    $(".l-header-nav,.l-sp-menu__bg").removeClass("is-open");
    $(".l-header-nav__item").removeClass("is-show");
    $(".l-header-nav__item").stop();
  });
});
