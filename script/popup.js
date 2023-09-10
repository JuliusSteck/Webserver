document.addEventListener("DOMContentLoaded", function() {

  const buttonClose = document.getElementById("close");
  const popup = document.getElementById("popup");

  buttonClose.addEventListener("change", () => {
    if ( buttonClose.checked) {
      popup.classList.add("invisible");

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../system/.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      var postData = "newMessage=" + encodeURIComponent("New asynchronous message");

      xhr.onload = function() {
        if (xhr.status === 200) {
          //location.reload(); 
        } else {
          alert("An error occurred");
        }
      };

      xhr.onerror = function() {
        
      };

      xhr.send(postData);
    } 
  });
});