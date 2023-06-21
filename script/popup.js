document.addEventListener("DOMContentLoaded", function() {

  const buttonPopup = document.getElementById("button_popup");
  const popup = document.getElementById("popup");

  buttonPopup.addEventListener("click", function(){
    popup.classList.add('invisible');
  });
});
