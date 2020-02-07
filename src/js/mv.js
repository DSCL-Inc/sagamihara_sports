$(window).on("load", function() {
  var timer = null;
  var cnt = 0;
  var gage = 0;
  var index = 1;
  var gage_max = $(".p-mv-carousel-progress__gage").width();
  var interval = 8000;
  $(".p-mv-carousel__item:first-child").addClass("is-animation");
  $(".carousel-progress__num-total").text($(".p-mv-carousel__item").length);
  function count() {
    cnt++;
    gage = (cnt * gage_max * 10) / interval;
    $(".p-mv-carousel-progress__gage>span").css({
      width: gage
    });

    if (cnt * 10 >= interval && timer != null) {
      if (index >= 4) {
        index = 1;
      } else {
        index++;
      }
      $(".carousel-progress__num-current").text(index);
      setInterval(timer);
      $(".p-mv-carousel-progress__gage>span").css({
        width: 0
      });
      cnt = 0;
      $(".p-mv-carousel__item.is-animation").addClass("is-leave");

      $(".p-mv-carousel-wrap,.btn-mv,.p-mv-carousel-text").removeClass(function(
        index,
        className
      ) {
        return (className.match(/\bis-\S+/g) || []).join(" ");
      });

      if (
        $(".p-mv-carousel__item.is-animation")
          .next()
          .size()
      ) {
        $(".p-mv__carousel-wrap,.btn-mv,.p-mv-carousel-text").addClass(
          "is-" +
            $(".p-mv-carousel__item.is-animation")
              .next()
              .data("carousel-name")
        );
        //スライド名とキャプション入れ替え
        $(".p-mv-carousel-title").text(
          $(".p-mv-carousel__item.is-animation")
            .next()
            .data("carousel-name")
        );
        $(".p-mv-carousel-caption").text(
          $(".p-mv-carousel__item.is-animation")
            .next()
            .data("carousel-caption")
        );
        //.スライド名とキャプション入れ替え
        $(".btn-mv").attr(
          "href",
          "#" +
            $(".p-mv-carousel__item.is-animation")
              .next()
              .data("carousel-name")
        );

        $(".p-mv-carousel__item.is-animation")
          .next()
          .addClass("is-animation");
      } else {
        $(".btn-mv").attr(
          "href",
          "#" +
            $(".p-mv-carousel__item:first-child")
              .next()
              .data("carousel-name")
        );
        //スライド名とキャプション入れ替え
        $(".p-mv-carousel-title").text(
          $(".p-mv-carousel__item:first-child").data("carousel-name")
        );
        $(".p-mv-carousel-caption").text(
          $(".p-mv-carousel__item:first-child").data("carousel-caption")
        );
        //.スライド名とキャプション入れ替え
        $(".p-mv__carousel-wrap,.btn-mv,.p-mv-carousel-text").addClass(
          "is-" + $(".p-mv-carousel__item:first-child").data("carousel-name")
        );
        $(".p-mv-carousel__item:first-child").addClass("is-animation");
      }
      var mv_text_show = function() {
        $(".p-mv-carousel-text,.btn-mv").addClass("is-show");
      };
      setTimeout(mv_text_show, 800);

      var mv_leave = function() {
        $(".p-mv-carousel__item.is-leave").removeClass("is-leave is-animation");
      };
      setTimeout(mv_leave, 1200);
    }
  }
  timer = setInterval(count, 10);
});
