document.addEventListener("DOMContentLoaded", function() {

  var buttonAlles = document.getElementById("button_alles");
  var buttonKategorie = document.getElementById("button_kategorie");
  var buttonGeschichte = document.getElementById("button_geschichte");

  var nextLink = document.getElementById("next");
  var previousLink = document.getElementById("previous");

  var buttons = [buttonAlles, buttonKategorie, buttonGeschichte];

  buttonAlles.addEventListener("click", function(){
    clear();
    if(nextLink.getAttribute('nextID') != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.getAttribute('nextID');
    }
    if(previousLink.getAttribute('previousID') != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.getAttribute('previousID');
    }
    styleActive(0);
  });

  buttonKategorie.addEventListener("click", function(){
    clear();
    if(nextLink.getAttribute('nextCategoryID') != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.getAttribute('nextCategoryID');
    }
    if(previousLink.getAttribute('previousCategoryID') != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.getAttribute('previousCategoryID');
    }
    styleActive(1);
  });

  buttonGeschichte.addEventListener("click", function(){
    clear();
    if(nextLink.getAttribute('nextStoryID') != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.getAttribute('nextStoryID');
    }
    if(previousLink.getAttribute('previousStoryID') != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.getAttribute('previousStoryID');
    }
    styleActive(2);
  });

  function clear(){
    nextLink.classList.add('disabled');
    nextLink.href = '';
    previousLink.classList.add('disabled');
    previousLink.href = '';
  }

  function styleActive(button){
    buttons.forEach(function(parent){
      parent.classList.remove("aktiv");
    });
    buttons[button].classList.add("aktiv");
  }
});
