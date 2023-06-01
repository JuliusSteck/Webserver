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

  for (var i = 1; i <= count; i++) {
    var elementID = "entry_" + i;
    var element = document.getElementById(elementID);
    if (element) {
      entries.push(element);
    }
  }

  for (var i = 1; i <= 4; i++) {
    var columnID = "column_" + i;
    var column = document.getElementById(columnID);
    if (column) {
      columns.push(column);
    }
  }

  console.log(entries);
  console.log(columns);

  buttonAlles.addEventListener("click", function() {
    console.log("Alles button clicked");
    clear();
    var display = entries;
    for (var i = 0; i < display.length;  i++){
      switch (i % 4) {
        case 0:
          columns[1].appendChild(display[display.length - 1 - i]);
          break;
        case 1:
          columns[2].appendChild(display[display.length - 1 - i]);
          break;
        case 2:
          columns[3].appendChild(display[display.length - 1 - i]);
          break;
        case 3:
          columns[4].appendChild(display[display.length - 1 - i]);
          break;
        default:
          break;
      }
    }
  });

  buttonArbeit.addEventListener("click", function() {
    console.log("Arbeit button clicked");
    clear();
    restructure("Work");
  });

  buttonFreizeit.addEventListener("click", function() {
    console.log("Freizeit button clicked");
    clear();
    restructure("Freetime");
  });

  buttonAnkuendigungen.addEventListener("click", function() {
    console.log("Ankündigungen button clicked");
    clear();
    restructure("Announcement");
  });

  buttonTechnologie.addEventListener("click", function() {
    console.log("Technologie button clicked");
    clear();
    restructure("Technology");
  });

  buttonPolitik.addEventListener("click", function() {
    console.log("Politik button clicked");
    clear();
    restructure("Politics");
  });

  function restructure(filter) {
    console.log(filter);
    var display = [];
    for(var i = 0; i < entries.length; i++){
      if(entries[i].getAttribute('category') == filter){
        display.push(entries[i]);
        console.log(entries[i]);
      }
    }

    console.log(display);

    for (var i = 0; i < display.length;  i++){
      switch (i % 4) {
        case 0:
          columns[1].appendChild(display[display.length - 1 - i]);
          break;
        case 1:
          columns[2].appendChild(display[display.length - 1 - i]);
          break;
        case 2:
          columns[3].appendChild(display[display.length - 1 - i]);
          break;
        case 3:
          columns[4].appendChild(display[display.length -1 - i]);
          break;
        default:
          break;
      }
    }
  }

  function clear(){
    console.log("clear");
    columns.forEach(function(parent) {
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
      }

    });
  }
});
