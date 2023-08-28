document.addEventListener("DOMContentLoaded", function() {

  var buttonAlles = document.getElementById("button_alles");
  var buttonArbeit = document.getElementById("button_arbeit");
  var buttonFreizeit = document.getElementById("button_freizeit");
  var buttonAnkuendigungen = document.getElementById("button_ankuendigungen");
  var buttonTechnologie = document.getElementById("button_technologie");
  var buttonPolitik = document.getElementById("button_politik");
  var buttons = [buttonAlles, buttonArbeit, buttonFreizeit, buttonAnkuendigungen, buttonTechnologie, buttonPolitik];

  var lazyElements = document.getElementsByClassName('entry');
  var entries = [];
  
  for (var i = 1; i <= Array.from(lazyElements).length; i++){
    var elementID = "entry_" + i;
    var element = document.getElementById(elementID);
    if (element) {
      entries.push(element);
    }
  }
  
  var columnsAll = Array.from(document.getElementsByClassName('column'));
  var columns = [];

  function isMobileDevice() {
    return window.innerWidth <= 800; 
  }

  function isTabletDevice() {
    return window.innerWidth <= 1200; 
  }

  function arrangeColumns(){
    if (isMobileDevice()) {
      columns = columnsAll.slice(0,1);
    } else if (isTabletDevice()){
      columns = columnsAll.slice(0,2);
    } else{
      columns = columnsAll;
    }
  }

  var display = [];
  
  buttonAlles.addEventListener("click", function(){
    clear();
    restructure("all");
    styleActive(0);
  });

  buttonArbeit.addEventListener("click", function(){
    clear();
    restructure("Work");
    styleActive(1);
  });

  buttonFreizeit.addEventListener("click", function(){
    clear();
    restructure("Freetime");
    styleActive(2);
  });

  buttonAnkuendigungen.addEventListener("click", function(){
    clear();
    restructure("Announcement");
    styleActive(3);
  });

  buttonTechnologie.addEventListener("click", function(){
    clear();
    restructure("Technology");
    styleActive(4);
  });

  buttonPolitik.addEventListener("click", function(){
    clear();
    restructure("Politics");
    styleActive(5);
  });

  function restructure(filter){
    arrangeColumns();
    display = [];
    for(var i = entries.length -1 ; i >= 0; i--){
      if(entries[i].getAttribute('category') == filter || filter == "all"){
        display.push(entries[i]);
      }
    }

    for (var j = 0; j < display.length;  j++){
      switch (j % columns.length) {
        case 0:
          columns[0].appendChild(display[j]);
          break;
        case 1:
          columns[1].appendChild(display[j]);
          break;
        case 2:
          columns[2].appendChild(display[j]);
          break;
        case 3:
          columns[3].appendChild(display[j]);
          break;
        default:
          break;
      }
    }

    lazyLoad();
  }

  function clear(){
    columns.forEach(function(parent){
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
      }
    });
    
    entries.forEach(function(element){
        element.style.opacity = 0;
    });
  }

  function styleActive(button){
    buttons.forEach(function(parent){
      parent.classList.remove("aktiv");
    });
    buttons[button].classList.add("aktiv");
  }
 
  function isElementInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= window.innerHeight &&
        rect.right <= window.innerWidth
      );
  }

  function lazyLoad() {
    for (var i = 0 ; i < display.length; i++){
        if (isElementInViewport(display[i]) || i < 4) {
              display[i].style.opacity = 1;
        }
    }
  }

  clear();
  
  window.addEventListener('scroll', lazyLoad);
   
  window.onload = function() {
    restructure("all");
  }

});