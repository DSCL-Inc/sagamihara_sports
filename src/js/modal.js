$(function() {
  url =
    "https://sagamihara-sport.or.jp/s-sport/wp-content/themes/s-sport_theme/template-parts/modal-member.php";

  $(".js-modal-show").click(function() {
    var juniorMember = $(this).data("modal");
    $(".js-modal-content").addClass("is-show");

    var flag = false;
    if (!flag) {
      flag = true;
      jQuery.ajax({
        type: "POST",
        url: url,
        data: {
          junior_member: juniorMember
        },
        success: function(response) {
          $(".c-junior__type__mordal__inner").append(response);
          flag = false;
        }
      });
    }
  });
  $(".js-modal-close").click(function() {
    $(".js-modal-content").removeClass("is-show");
    $(".c-junior__type__mordal__inner").empty();
  });
});
