document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('header');
  window.addEventListener("scroll", () => {
    if (window.scrollY >= 10) {
      navbar.classList.remove("header_not_scrolled");
      navbar.classList.add("header_scrolled");
    } else {
      navbar.classList.remove("header_scrolled");
      navbar.classList.add("header_not_scrolled");
    }
  });

  const flexible_caption = document.getElementById('flexible_caption');

});
