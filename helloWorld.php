<!DOCTYPE html>
<html>
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/caption.css">
    <link rel="stylesheet" href="style/blog.css">
    <link rel="stylesheet" href="style/footer.css">
    <script src="script/header.js"></script>
    <script src="script/caption.js"></script>
    <script src="script/blog.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <section id="blog">
      <div class="container">
        <div id="filter" class="filter">
          <input type="checkbox" id="dropdown">
          <label for="dropdown">
            <span class="material-symbols-rounded">expand_more</span>
          </label>

          <ul>
            <li><a href="" class="aktiv">Alles</a></li>
            <li><a href="">Arbeit</a></li>
            <li><a href="">Freizeit</a></li>
            <li><a href="">Ankündigungen</a></li>
            <li><a href="">Technologie</a></li>
            <li><a href="">Politik</a></li>
          </ul>
        </div>

        <div id="layout" class="layout">

          <?php
            $host = "localhost";
            $database = "JuliusSteckWebserver";
            $username = "JuliusSteck";
            $password = "JuliusSteckWebserver#1";

            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            $query = "SELECT EntryID, EntryTitle, EntryDate, EntryCover FROM Blog";
            $statement = $pdo->query($query);

            $entries = array();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $entryID = $row['EntryID'];
                $entryTitle = $row['EntryTitle'];
                $entryDate = $row['EntryDate'];
                $entryCover = $row['EntryCover'];

                $entries[] = array($entryID, $entryTitle, $entryDate, $entryCover);

                //echo "<h2>$entryTitle</h2>";
                //echo "<p>Date: $entryDate</p>";
                //echo "<img src='images/$entryCover' alt='Entry Cover'>";
            }

            echo "<div class='flex' id='column_1'>";

            for ($i = 0; $i < count($entries); $i++) {
              if(($i  %  4) == 0){

                $entryID = $entries[$i][0];
                $entryTitle = $entries[$i][1];
                $entryDate = $entries[$i][2];
                $entryCover = $entries[$i][3];

                echo "<a href='$entryID'>";
                  echo "<div class='element'>";
                    echo "<img class='element_image' src='images/$entryCover' alt='Entry Cover'>";
                    echo "<div class='element_background'>";
                      echo "<div class='element_description'>";
                        echo "<h3>$entryTitle</h3>";
                        echo "<p>Date: $entryDate</p>";
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

                $entryID = $entries[$i][0];
                $entryTitle = $entries[$i][1];
                $entryDate = $entries[$i][2];
                $entryCover = $entries[$i][3];

                echo "<a href='$entryID'>";
                  echo "<div class='element'>";
                    echo "<img class='element_image' src='images/$entryCover' alt='Entry Cover'>";
                    echo "<div class='element_background'>";
                      echo "<div class='element_description'>";
                        echo "<h3>$entryTitle</h3>";
                        echo "<p>Date: $entryDate</p>";
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

                $entryID = $entries[$i][0];
                $entryTitle = $entries[$i][1];
                $entryDate = $entries[$i][2];
                $entryCover = $entries[$i][3];

                echo "<a href='$entryID'>";
                  echo "<div class='element'>";
                    echo "<img class='element_image' src='images/$entryCover' alt='Entry Cover'>";
                    echo "<div class='element_background'>";
                      echo "<div class='element_description'>";
                        echo "<h3>$entryTitle</h3>";
                        echo "<p>Date: $entryDate</p>";
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

                $entryID = $entries[$i][0];
                $entryTitle = $entries[$i][1];
                $entryDate = $entries[$i][2];
                $entryCover = $entries[$i][3];

                echo "<a href='$entryID'>";
                  echo "<div class='element'>";
                    echo "<img class='element_image' src='images/$entryCover' alt='Entry Cover'>";
                    echo "<div class='element_background'>";
                      echo "<div class='element_description'>";
                        echo "<h3>$entryTitle</h3>";
                        echo "<p>Date: $entryDate</p>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</a>";
                }
              }

            echo "</div>";
          ?>

        <!--  <div class="flex" id="column_3">

            <a href="">
              <div class="element">
                <img class="element_image" src="../images/Julius_Strand_2022.jpg" />
                <div class="element_background">
                  <div class="element_description">
                    <h3>This image looks super neat.</h3>
                    <p>September 2022  </p>
                  </div>
                </div>
              </div>
            </a>

          </div>

          <div class="flex" id="column_4">

          </div> -->

        </div>
      </div>
    </section>
</body>
</html>
