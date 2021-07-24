$("a").hover(
  function () {
    $(".cursor").css({
      transform: "matrix(2, 0, 0, 2, 0, 0)",
      border: "1px solid #6b6b6b6b",
    });
  },
  function () {
    $(".cursor").css({
      transform: "matrix(1, 0, 0, 1, 0, 0)",
      border: "2px solid #6b6b6b",
    });
  }
);

$("body").mousemove(function () {
  $(".cursor").css({
    top: event.clientY - 10 + "px",
    left: event.clientX - 10 + "px",
    display: "block",
  });
});
