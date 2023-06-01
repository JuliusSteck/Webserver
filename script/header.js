document.addEventListener('DOMContentLoaded', () => {

  const navbar = document.getElementById('header');
  const menu = document.getElementById('menu');
  const black = document.getElementById('black');
  menu.checked = false;

  window.addEventListener("scroll", () => {
    if (window.scrollY >= 10) {
      navbar.classList.remove("header_not_scrolled");
      navbar.classList.add("header_scrolled");
    } else {
      navbar.classList.remove("header_scrolled");
      navbar.classList.add("header_not_scrolled");
    }
  });

  menu.addEventListener("change", () => {
    if (menu.checked) {
      black.classList.remove("invisible");
      black.classList.add("visible");
      header.classList.add("inverse");
    } else {
      black.classList.remove("visible");
      black.classList.add("invisible");
      header.classList.remove("inverse");
    }
  });
});
