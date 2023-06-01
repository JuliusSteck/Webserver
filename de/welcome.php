<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/blog.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <script src="../script/layout.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

  <?php
    include 'header.php';
   ?>

  <section id="caption">
    <div class="container">
        <h1>Ich bin <span id="flexible_caption" class="flexible_caption"> </span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="blog">
    <div class="container">
      <div id="filter" class="filter">
        <input type="checkbox" id="dropdown">
        <label for="dropdown">
          <!--<span class="material-symbols-rounded">expand_more</span> -->
          <span class="material-symbols-rounded">arrow_drop_down</span>
        </label>

        <ul>
          <li><button type="button" id="button_alles" class="underline aktiv">Alles</button></li>
          <li><button type="button" id="button_arbeit" class="underline">Arbeit</button></li>
          <li><button type="button" id="button_freizeit" class="underline">Freizeit</button></li>
          <li><button type="button" id="button_ankuendigungen" class="underline">Ankündigungen</button></li>
          <li><button type="button" id="button_technologie" class="underline">Technologie</button></li>
          <li><button type="button" id="button_politik" class="underline">Politik</button></li>
        </ul>

      </div>

      <!-- <div class="line"></div> -->

      <div id="layout" class="layout">

        <?php
          $host = "localhost";
          $database = "JuliusSteckWebserver";
          $username = "JuliusSteck";
          $password = "JuliusSteckWebserver#1";

          $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

          $query = "SELECT EntryID, EntryTitle_de, EntryDate, EntryCover FROM Blog";
          $statement = $pdo->query($query);

          $entries = array();

          while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $entryID = $row['EntryID'];
              $entryTitle = $row['EntryTitle_de'];
              $entryDate = $row['EntryDate'];
              $entryCover = $row['EntryCover'];

              $entries[] = array($entryID, $entryTitle, $entryDate, $entryCover);
          }

          echo "<div class='flex' id='column_1'>";

          for ($i = 0; $i < count($entries); $i++) {
            if(($i  %  4) == 0){

              $entryID = $entries[count($entries) - ($i + 1)][0];
              $entryTitle = $entries[count($entries) - ($i + 1)][1];
              $entryDate = $entries[count($entries) - ($i + 1)][2];
              $entryCover = $entries[count($entries) - ($i + 1)][3];

              echo "<a href='blog.php?id=$entryID'>";
                echo "<div class='element'>";
                  echo "<img class='element_image' src='../images/$entryCover' alt='Entry Cover'>";
                  echo "<div class='element_background'>";
                    echo "<div class='element_description'>";
                      echo "<h3>$entryTitle</h3>";
                      echo "<p> $entryDate</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</a>";
              }
            }

          echo "</div>";

          echo "<div class='flex' id='column_2'>";

          for ($i = 0; $i < count($entries); $i++) {
            if(($i  %  4) == 1){

              $entryID = $entries[count($entries) - ($i + 1)][0];
              $entryTitle = $entries[count($entries) - ($i + 1)][1];
              $entryDate = $entries[count($entries) - ($i + 1)][2];
              $entryCover = $entries[count($entries) - ($i + 1)][3];

              echo "<a href='blog.php?id=$entryID'>";
                echo "<div class='element'>";
                  echo "<img class='element_image' src='../images/$entryCover' alt='Entry Cover'>";
                  echo "<div class='element_background'>";
                    echo "<div class='element_description'>";
                      echo "<h3>$entryTitle</h3>";
                      echo "<p> $entryDate</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</a>";
              }
            }

          echo "</div>";

          echo "<div class='flex' id='column_3'>";

          for ($i = 0; $i < count($entries); $i++) {
            if(($i  %  4) == 2){

              $entryID = $entries[count($entries) - ($i + 1)][0];
              $entryTitle = $entries[count($entries) - ($i + 1)][1];
              $entryDate = $entries[count($entries) - ($i + 1)][2];
              $entryCover = $entries[count($entries) - ($i + 1)][3];

              echo "<a href='blog.php?id=$entryID'>";
                echo "<div class='element'>";
                  echo "<img class='element_image' src='../images/$entryCover' alt='Entry Cover'>";
                  echo "<div class='element_background'>";
                    echo "<div class='element_description'>";
                      echo "<h3>$entryTitle</h3>";
                      echo "<p> $entryDate</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</a>";
              }
            }

          echo "</div>";

          echo "<div class='flex' id='column_4'>";

          for ($i = 0; $i < count($entries); $i++) {
            if(($i  %  4) == 3){

              $entryID = $entries[count($entries) - ($i + 1)][0];
              $entryTitle = $entries[count($entries) - ($i + 1)][1];
              $entryDate = $entries[count($entries) - ($i + 1)][2];
              $entryCover = $entries[count($entries) - ($i + 1)][3];

              echo "<a href='blog.php?id=$entryID'>";
                echo "<div class='element'>";
                  echo "<img class='element_image' src='../images/$entryCover' alt='Entry Cover'>";
                  echo "<div class='element_background'>";
                    echo "<div class='element_description'>";
                      echo "<h3>$entryTitle</h3>";
                      echo "<p> $entryDate</p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</a>";
              }
            }

          echo "</div>";
        ?>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
