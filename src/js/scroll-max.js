$(function () {
  $(".p-tournament__table__body").on("scroll", function () {
    var docH = $(".p-tournament__table__body>div").innerHeight(); //ページ全体の高さ
    var st = $(this).scrollTop() - 50;
    var winH = $(".p-tournament__table__body").innerHeight(); //ウィンドウの高さ
    var bottom = docH - winH; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
    if (bottom == st || docH < winH) {
      $(".p-tournament__table").addClass("is-scroll-hide");
    } else {
      $(".p-tournament__table").removeClass("is-scroll-hide");
    }
  });
});
