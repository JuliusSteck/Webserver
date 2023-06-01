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
    if (element) {
      columns.push(element);
    }
  }

  console.log(entries);
  console.log(columns);

  buttonAlles.addEventListener("click", function() {
    var display = entries;
    for (var i = 0; i < display.length;  i++){
      switch (i % 4) {
        case 0:
          columns[i + 1].appendChild(display[display.length - i]);
          break;
        case 1:
          columns[i + 2].appendChild(display[display.length - i]);
          break;
        case 2:
          columns[i + 3].appendChild(display[display.length - i]);
          break;
        case 3:
          columns[i + 4].appendChild(display[display.length - i]);
          break;
        default:
          break;
      }
    }
    console.log("Alles button clicked");
  });

  buttonArbeit.addEventListener("click", function() {
    restructure("Work");
    console.log("Arbeit button clicked");
  });

  buttonFreizeit.addEventListener("click", function() {
    restructure("Freetime");
    console.log("Freizeit button clicked");
  });

  buttonAnkuendigungen.addEventListener("click", function() {
    restructure("Announcement");
    console.log("Ankündigungen button clicked");
  });

  buttonTechnologie.addEventListener("click", function() {
    restructure("Technology");
    console.log("Technologie button clicked");
  });

  buttonPolitik.addEventListener("click", function() {
    restructure("Politics");
    console.log("Politik button clicked");
  });

  function restructure(filter) {
    var display = [];
    for(var i = 0; i < entries.length; i++){
      if(entries[i].getAttribute('category') == filter){
        display.push(entries[i]);
      }
    }

    for (var i = 0; i < display.length;  i++){
      switch (i % 4) {
        case 0:
          columns[i + 1].appendChild(display[display.length - i]);
          break;
        case 1:
          columns[i + 2].appendChild(display[display.length - i]);
          break;
        case 2:
          columns[i + 3].appendChild(display[display.length - i]);
          break;
        case 3:
          columns[i + 4].appendChild(display[display.length - i]);
          break;
        default:
          break;
      }
    }
  }
});
