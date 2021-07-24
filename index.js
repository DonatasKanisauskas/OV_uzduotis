$("a").hover(
  function () {
    $(".cursor").css("transform", "matrix(2, 0, 0, 2, 0, 0)");
  },
  function () {
    $(".cursor").css("transform", "matrix(1, 0, 0, 1, 0, 0)");
  }
);

$("body").mousemove(function () {
  $(".cursor").css({
    top: event.clientY - 10 + "px",
    left: event.clientX - 10 + "px",
    display: "block",
  });
});
