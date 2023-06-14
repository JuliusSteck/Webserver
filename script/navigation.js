document.addEventListener("DOMContentLoaded", function() {

  var buttonAlles = document.getElementById("button_alles");
  var buttonKategorie = document.getElementById("button_kategorie");
  var buttonGeschichte = document.getElementById("button_geschichte");

  var nextLink = document.getElementById("next");
  var previousLink = document.getElementById("previous");

  var buttons = [buttonAlles, buttonKategorie, buttonGeschichte];

  buttonAlles.addEventListener("click", function(){
    clear();
    if(nextLink.nextID != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.nextID;
    }
    if(previousLink.previousID != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.previousID;
    }
    styleActive(0);
  });

  buttonKategorie.addEventListener("click", function(){
    clear();
    if(nextLink.nextCategoryID != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.nextCategoryID;
    }
    if(previousLink.previousCategoryID != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.previousCategoryID;
    }
    styleActive(1);
  });

  buttonGeschichte.addEventListener("click", function(){
    clear();
    if(nextLink.nextStoryID != 0){
      nextLink.classList.remove('disabled');
      nextLink.href = 'blog.php?id=' + nextLink.nextStoryID;
    }
    if(previousLink.previousStoryID != 0){
      previousLink.classList.remove('disabled');
      previousLink.href = 'blog.php?id=' + previousLink.previousStoryID;
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
      console.log(parent);
      parent.classList.remove("aktiv");
    });
    console.log(button);
    buttons[button].classList.add("aktiv");
  }
});
