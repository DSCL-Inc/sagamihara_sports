$(function() {
  var php_url;
  $(window).bind("load", function() {
    // 現在ページのURL取得
    var page_url = location.href;
    if (page_url == "https://sagamihara-sport.or.jp/junior/member") {
      php_url =
        "https://sagamihara-sport.or.jp/s-sport/wp-content/themes/s-sport_theme/template-parts/modal-junior-member.php";
    } else if (page_url == "https://sagamihara-sport.or.jp/member") {
      php_url =
        "https://sagamihara-sport.or.jp/s-sport/wp-content/themes/s-sport_theme/template-parts/modal-member.php";
    }

    $(".js-modal-show").click(function() {
      var member_data = $(this).data("modal");
      $(".js-modal-content").addClass("is-show");
      var flag = false;
      if (!flag) {
        flag = true;
        jQuery.ajax({
          type: "POST",
          url: php_url,
          data: {
            member: member_data
          },
          success: function(response) {
            $(".p-member__modal__container__inner").append(response);
            flag = false;
          }
        });
      }
    });
    $(".js-modal-close").click(function() {
      $(".js-modal-content").removeClass("is-show");
      $(".p-member__modal__container__inner").empty();
    });
  });
});
