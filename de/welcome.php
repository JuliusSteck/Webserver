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

  <div id="black" class="invisible"></div>

  <header id="header">
    <div class="top container">
      <a href="welcome.php">
        <h2>
          Julius_Steck
        </h2>
      </a>

      <input type="checkbox" id="menu">
      <label for="menu">
          <span class="material-symbols-rounded"> menu</span>
      </label>

      <nav>
        <ul>
          <li><a href="welcome.php" class="underline aktiv">Blog</a></li>
          <li><a href="about_me.php" class="underline">Über_mich</a></li>
          <li><a href="podcast.php" class="underline">Podcast</a></li>
          <li><a href="shop.php" class="underline">Shop</a></li>
          <li><a href="contact.php" class="underline">Kontakt</a></li>
          <li class="search">
            <input type="checkbox" id="magnifying_glass">
            <label for="magnifying_glass">
              <span class="material-symbols-rounded">search</span>
            </label>

            <form id="search-form">
              <input type="text" id="search-input" placeholder="Suchen" name="search">
              <button type="submit" id="search-button">suchen</button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>



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
          <li><a href="" class="underline aktiv">Alles</a></li>
          <li><a href="" class="underline">Arbeit</a></li>
          <li><a href="" class="underline">Freizeit</a></li>
          <li><a href="" class="underline">Ankündigungen</a></li>
          <li><a href="" class="underline">Technologie</a></li>
          <li><a href="" class="underline">Politik</a></li>
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

          for ($i = count($entries) - 1; $i >= 0; $i--) {
            if(($i  %  4) == 1){

              $entryID = $entries[$i][0];
              $entryTitle = $entries[$i][1];
              $entryDate = $entries[$i][2];
              $entryCover = $entries[$i][3];

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

          for ($i = count($entries) - 1; $i >= 0; $i--) {
            if(($i  %  4) == 2){

              $entryID = $entries[$i][0];
              $entryTitle = $entries[$i][1];
              $entryDate = $entries[$i][2];
              $entryCover = $entries[$i][3];

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

          for ($i = count($entries) - 1; $i >= 0; $i--) {
            if(($i  %  4) == 3){

              $entryID = $entries[$i][0];
              $entryTitle = $entries[$i][1];
              $entryDate = $entries[$i][2];
              $entryCover = $entries[$i][3];

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

          for ($i = count($entries) - 1; $i >= 0; $i--) {
            if(($i  %  4) == 0){

              $entryID = $entries[$i][0];
              $entryTitle = $entries[$i][1];
              $entryDate = $entries[$i][2];
              $entryCover = $entries[$i][3];

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

  <footer>
    <div class="container">
      <ul>
        <li><a href="impressum.php" class="underline">Impressum</a></li>
        <li><a href="data_protection.php" class="underline">Datenschutz</a></li>
        <li><a href="login.php" class="underline">Login</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>
