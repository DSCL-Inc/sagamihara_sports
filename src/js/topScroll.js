$("a[href^=#]").click(function() {
  var speed = 800;
  var href = $(this).attr("href");
  var target = $(href == "#" || href == "" ? "html" : href);
  var position = target.offset().top - 80;
  $("html, body").animate({ scrollTop: position }, speed, "easeOutQuint");
  return false;
});
