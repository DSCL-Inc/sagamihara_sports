(function(d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");

$(document).ready(function($) {
  if ($(".fb-page").length) {
    // iframeリロードの[ON/OFF]を切り替えるウィンドウサイズ。
    var reloadWidth = 768;

    $(function() {
      // まずウインドウの横幅を変数に入れる
      var timer = false;
      var winWidth = $(window).width();
      var winWidth_resized;

      // ウインドウのリサイズイベントに処理をバインド
      $(window).on("resize", function() {
        // リサイズ後の放置時間が指定ミリ秒以下なら何もしない(リサイズ中に何度も処理が行われるのを防ぐ)
        if (timer !== false) {
          clearTimeout(timer);
        }
        // 放置時間が指定ミリ秒以上なので処理を実行
        timer = setTimeout(function() {
          // リサイズ後のウインドウの横幅を取得
          winWidth_resized = $(window).width();

          // リサイズ前のウインドウ幅とリサイズ後のウインドウ幅が異なる場合
          if (winWidth != winWidth_resized) {
            var windowWidth = parseInt($(window).width());
            if (windowWidth >= reloadWidth) {
              // 画面サイズ大のとき
              //location.reload();
            } else {
              // 画面サイズ小のとき
              location.reload();
            }
            // 次回以降使えるようにリサイズ後の幅をウインドウ幅に設定する
            winWidth = $(window).width();
          }
        }, 200);
      });
    });
  }
});
