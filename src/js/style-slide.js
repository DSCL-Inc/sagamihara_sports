var style_block_num = $(".style__block").length;
var style_block_name = [];
for (var i = 1; i <= style_block_num; i++) {
  style_block_name[i] = ".style__block" + ":nth-child" + "(" + i + ")";

  var mainSlider = style_block_name[i] + " .style-carousel";

  $(mainSlider).slick({
    autoplay: false,
    speed: 500,
    arrows: false,
    fade: true
  });
}

$(style_block_name[1] + " .style-carousel-thumbnail__item").on(
  "click",
  function() {
    if (!$(this).hasClass("is-active")) {
      $(this)
        .siblings()
        .removeClass("is-active");
      $(this).addClass("is-active");
    }
    var index = $(style_block_name[1] + " .style-carousel .slick-current").attr(
      "data-slick-index"
    );
    var thumb_index = $(this).index();
    if (index != thumb_index) {
      $(style_block_name[1] + " .style-carousel").slick(
        "slickGoTo",
        thumb_index,
        false
      );
      $(".style-carousel-nav--prev").slick("slickGoTo", thumb_index, false);
    } else {
      return false;
    }
  }
);

$(style_block_name[1] + " .style-carousel-nav--prev").on("click", function() {
  var prev_index = $(style_block_name[1] + " .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!prev_index) {
    prev_index = $(style_block_name[1] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[1] + " .style-carousel").slick(
    "slickGoTo",
    prev_index,
    false
  );
});
$(style_block_name[1] + " .style-carousel-nav--next").on("click", function() {
  var next_index = $(style_block_name[1] + " .style-carousel .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!next_index) {
    next_index = $(style_block_name[1] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[1] + " .style-carousel").slick(
    "slickGoTo",
    next_index,
    false
  );
});

$(style_block_name[2] + " .style-carousel-thumbnail__item").on(
  "click",
  function() {
    var index = $(style_block_name[2] + " .style-carousel .slick-current").attr(
      "data-slick-index"
    );
    if (!$(this).hasClass("is-active")) {
      $(this)
        .siblings()
        .removeClass("is-active");
      $(this).addClass("is-active");
    }
    var thumb_index = $(this).index();
    if (index != thumb_index) {
      $(style_block_name[2] + " .style-carousel").slick(
        "slickGoTo",
        thumb_index,
        false
      );
    } else {
      return false;
    }
  }
);

$(style_block_name[2] + " .style-carousel-nav--prev").on("click", function() {
  var prev_index = $(style_block_name[2] + " .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!prev_index) {
    prev_index = $(style_block_name[2] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[2] + " .style-carousel").slick(
    "slickGoTo",
    prev_index,
    false
  );
});
$(style_block_name[2] + " .style-carousel-nav--next").on("click", function() {
  var next_index = $(style_block_name[2] + " .style-carousel .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!next_index) {
    next_index = $(style_block_name[2] + " .style-carousel .slick-slide")
      .length;
  }
  if (!$(this).hasClass("is-active")) {
    $(this)
      .siblings()
      .removeClass("is-active");
    $(this).addClass("is-active");
  }
  $(style_block_name[2] + " .style-carousel").slick(
    "slickGoTo",
    next_index,
    false
  );
});

$(style_block_name[3] + " .style-carousel-thumbnail__item").on(
  "click",
  function() {
    var index = $(style_block_name[3] + " .style-carousel .slick-current").attr(
      "data-slick-index"
    );
    if (!$(this).hasClass("is-active")) {
      $(this)
        .siblings()
        .removeClass("is-active");
      $(this).addClass("is-active");
    }
    var thumb_index = $(this).index();
    if (index != thumb_index) {
      $(style_block_name[3] + " .style-carousel").slick(
        "slickGoTo",
        thumb_index,
        false
      );
    } else {
      return false;
    }
  }
);

$(style_block_name[3] + " .style-carousel-nav--prev").on("click", function() {
  var prev_index = $(style_block_name[3] + " .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!prev_index) {
    prev_index = $(style_block_name[3] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[3] + " .style-carousel").slick(
    "slickGoTo",
    prev_index,
    false
  );
});
$(style_block_name[3] + " .style-carousel-nav--next").on("click", function() {
  var next_index = $(style_block_name[3] + " .style-carousel .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!next_index) {
    next_index = $(style_block_name[3] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[3] + " .style-carousel").slick(
    "slickGoTo",
    next_index,
    false
  );
});

$(style_block_name[4] + " .style-carousel-thumbnail__item").on(
  "click",
  function() {
    var index = $(style_block_name[4] + " .style-carousel .slick-current").attr(
      "data-slick-index"
    );
    if (!$(this).hasClass("is-active")) {
      $(this)
        .siblings()
        .removeClass("is-active");
      $(this).addClass("is-active");
    }
    var thumb_index = $(this).index();
    if (index != thumb_index) {
      $(style_block_name[4] + " .style-carousel").slick(
        "slickGoTo",
        thumb_index,
        false
      );
    } else {
      return false;
    }
  }
);
$(style_block_name[4] + " .style-carousel-nav--prev").on("click", function() {
  var prev_index = $(style_block_name[4] + " .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!prev_index) {
    prev_index = $(style_block_name[4] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[4] + " .style-carousel").slick(
    "slickGoTo",
    prev_index,
    false
  );
});
$(style_block_name[4] + " .style-carousel-nav--next").on("click", function() {
  var next_index = $(style_block_name[4] + " .style-carousel .slick-current")
    .prev()
    .attr("data-slick-index");
  if (!next_index) {
    next_index = $(style_block_name[4] + " .style-carousel .slick-slide")
      .length;
  }
  $(style_block_name[4] + " .style-carousel").slick(
    "slickGoTo",
    next_index,
    false
  );
});

$(".l-header-nav__item").each(function() {
  $(".style-carousel-thumbnail__item:first-child").addClass("is-active");
});
