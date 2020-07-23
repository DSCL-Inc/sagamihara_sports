$(function() {
  if ($.cookie("fontSize_large")) {
    $(".js-font-size--normal").removeClass("is-active");
    $(".l-container").css("fontSize", "120%");
    $(".js-font-size--large").addClass("is-active");
  } else if ($.cookie("fontSize_normal")) {
    $(".js-font-size--normal").addClass("is-active");
    $(".l-container").css("fontSize", "16px");
  } else {
    $(".js-font-size--normal").addClass("is-active");
  }
});
$(function() {
  $(".js-font-size").click(function() {
    if (!$(this).hasClass("is-active")) {
      $(".js-font-size").removeClass("is-active");
      $(this).addClass("is-active");
    }
  });
  $(".js-font-size--normal").click(function() {
    $(".l-container").css("fontSize", "16px");
    $.cookie("fontSize_normal", "on", {
      expires: 7,
      path: "/"
    });
    $.removeCookie("fontSize_large", {
      path: "/"
    });
  });
  $(".js-font-size--large").click(function() {
    $(".l-container").css("fontSize", "120%");
    $.cookie("fontSize_large", "on", {
      expires: 7,
      path: "/"
    });
    $.removeCookie("fontSize_normal", {
      path: "/"
    });
  });
});

$(window).on("load resize", function() {
  var w = $(window).width();
  var x = 768;
  if (w <= x) {
    $(function() {
      $.removeCookie("fontSize_normal", {
        path: "/"
      });
      $.removeCookie("fontSize_large", {
        path: "/"
      });
    });
  }
});
