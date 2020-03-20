$(function() {
  var php_url =
    "https://sagamihara-sport.or.jp/s-sport/wp-content/themes/s-sport_theme/template-parts/news-list.php";

  $(".js-news-category").click(function() {
    $(".js-news-category").removeClass("is-active");
    $(this).addClass("is-active");
    $(".p-news-list").empty();
    var news_data = $(this).data("news-category");
    var flag = false;
    if (!flag) {
      flag = true;
      jQuery.ajax({
        type: "POST",
        url: php_url,
        data: {
          news_data: news_data
        },
        success: function(response) {
          $(".p-news-list").append(response);
          flag = false;
        }
      });
    }
  });
});
