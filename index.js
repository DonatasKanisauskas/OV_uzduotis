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

let mouseX = (mouseY = ballX = ballY = 0);
let speed = 0.1;

function animate() {
  console.log("asd");
  let distX = mouseX - ballX;
  let distY = mouseY - ballY;
  ballX += distX * speed;
  ballY += distY * speed;
  $(".cursor").css({
    left: ballX - 10 + "px",
    top: ballY - 10 + "px",
    display: "block",
  });
  requestAnimationFrame(animate);
}
animate();

$("body").mousemove(function (event) {
  mouseX = event.clientX;
  mouseY = event.clientY;
});
