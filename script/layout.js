document.addEventListener("DOMContentLoaded", function() {

  var buttonAlles = document.getElementById("button_alles");
  var buttonArbeit = document.getElementById("button_arbeit");
  var buttonFreizeit = document.getElementById("button_freizeit");
  var buttonAnkuendigungen = document.getElementById("button_ankuendigungen");
  var buttonTechnologie = document.getElementById("button_technologie");
  var buttonPolitik = document.getElementById("button_politik");

  var count = document.getElementById("count").getAttribute('count');
  var entries = [];
  var columns = [];
  var buttons = [buttonAlles, buttonArbeit, buttonFreizeit, buttonAnkuendigungen, buttonTechnologie, buttonPolitik];

  for (var i = 1; i <= count; i++){
    var elementID = "entry_" + i;
    var element = document.getElementById(elementID);
    if (element) {
      entries.push(element);
    }
  }

  for (var i = 1; i <= 4; i++){
    var columnID = "column_" + i;
    var column = document.getElementById(columnID);
    if (column) {
      columns.push(column);
    }
  }

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
    var display = [];
    for(var i = 0; i < entries.length; i++){
      entries[i].getElementsByClassName('element').style.opacity = 0;
      if(entries[i].getAttribute('category') == filter || filter == "all"){
        display.push(entries[i]);
      }
    }

    for (var i = 0; i < display.length;  i++){
      switch (i % 4) {
        case 0:
          columns[0].appendChild(display[display.length - 1 - i]);
          break;
        case 1:
          columns[1].appendChild(display[display.length - 1 - i]);
          break;
        case 2:
          columns[2].appendChild(display[display.length - 1 - i]);
          break;
        case 3:
          columns[3].appendChild(display[display.length -1 - i]);
          break;
        default:
          break;
      }
    }
  }

  function clear(){
    columns.forEach(function(parent){
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
      }
    });
  }

  function styleActive(button){
    buttons.forEach(function(parent){
      console.log(parent);
      parent.classList.remove("aktiv");
    });
    console.log(button);
    buttons[button].classList.add("aktiv");
  }

  //const lazyElements = document.getElementsByClassName('element');
  //const lazyElementsArray = Array.from(lazyElements);
 
  function isElementInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
          rect.top >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
      );
  }

  function lazyLoad() {
      entries.forEach(element => {
          if (isElementInViewport(element)) {
              element.style.opacity = 1;
          }
      });
  }

  lazyLoad();

  window.addEventListener('scroll', lazyLoad);
});

