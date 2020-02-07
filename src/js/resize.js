var w = $(window).width();
var x = 480;
if (w <= x) {
  $(".p-mv-carousel__item").each(function() {
    var src = $(this)
      .find("img")
      .attr("src")
      .replace(".jpg", "-sp.jpg");
    $(this)
      .find("img")
      .attr("src", src);
  });
}
