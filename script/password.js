document.addEventListener("DOMContentLoaded", function() {

    var passwordInput = document.getElementById("password");
    var showPasswordCheckbock = document.getElementById("show_password");
  
    function toggleInputType() {
        if (showPasswordCheckbock.checked) {
          passwordInput.type = "text";
        } else {
          passwordInput.type = "password";
        }
      }
      
      showPasswordCheckbock.addEventListener("click", toggleInputType);
});
  