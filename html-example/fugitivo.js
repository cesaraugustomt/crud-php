document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("acessarBotao");
  let isMoving = false;

  button.addEventListener("mouseenter", function () {
    if (isMoving) return;
    isMoving = true;

    const maxWidth = window.innerWidth - button.offsetWidth;
    const maxHeight = window.innerHeight - button.offsetHeight;

    const randomX = Math.floor(Math.random() * maxWidth);
    const randomY = Math.floor(Math.random() * maxHeight);

    button.style.position = "absolute";
    button.style.left = randomX + "px";
    button.style.top = randomY + "px";

    isMoving = false;
  });
});
