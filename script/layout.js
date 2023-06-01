document.addEventListener("DOMContentLoaded", function() {

  var buttonAlles = document.getElementById("button_alles");
  var buttonArbeit = document.getElementById("button_arbeit");
  var buttonFreizeit = document.getElementById("button_freizeit");
  var buttonAnkuendigungen = document.getElementById("button_ankuendigungen");
  var buttonTechnologie = document.getElementById("button_technologie");
  var buttonPolitik = document.getElementById("button_politik");

  var entryIDs = document.getElementById("count").getAttribute('count');
  var matchingItems = [];

  for (var i = 1; i <= entryIDs; i++)) {
    var elementID = "entry_" + entryID;
    var element = document.getElementById(elementID);
    if (element) {
      matchingItems.push(element);
    }
  });

  console.log(matchingItems);



  buttonAlles.addEventListener("click", function() {
    alert("Alles button clicked");
    console.log("Alles button clicked");
  });

  buttonArbeit.addEventListener("click", function() {
    alert("Arbeit button clicked");
    console.log("Arbeit button clicked");
  });

  buttonFreizeit.addEventListener("click", function() {
    alert("Freizeit button clicked");
    console.log("Freizeit button clicked");
  });

  buttonAnkuendigungen.addEventListener("click", function() {
    alert("Ankündigungen button clicked");
    console.log("Ankündigungen button clicked");
  });

  buttonTechnologie.addEventListener("click", function() {
    alert("Technologie button clicked");
    console.log("Technologie button clicked");
  });

  buttonPolitik.addEventListener("click", function() {
    alert("Politik button clicked");
    console.log("Politik button clicked");
  });
});
