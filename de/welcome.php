<!DOCTYPE html>
<html lang='de'>
<head>
    <title>Julius Steck</title>
    <meta http-equiv='content-type' content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/welcome.css">
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

  <section id='caption'>
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
          <li><button type="button" id="button_alles" class="aktiv">Alles</button></li>
          <li><button type="button" id="button_arbeit" class="">Arbeit</button></li>
          <li><button type="button" id="button_freizeit" class="">Freizeit</button></li>
          <li><button type="button" id="button_ankuendigungen" class="">Ankündigungen</button></li>
          <li><button type="button" id="button_technologie" class="">Technologie</button></li>
          <li><button type="button" id="button_politik" class="">Politik</button></li>
        </ul>
      </div>

      <div id="layout" class="layout">

        <?php
          require_once '../database_connect.php';

          try {
            $query = "SELECT EntryID, EntryTitle_de, EntryDate, EntryCover, Category FROM Blog";
            $statement = $pdo->query($query);
            $entries = array();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $entryID = $row['EntryID'];
                $entryTitle = $row['EntryTitle_de'];
                $entryDate = $row['EntryDate'];
                $entryCover = $row['EntryCover'];
                $Category = $row['Category'];

                $entries[] = array($entryID, $entryTitle, $entryDate, $entryCover, $Category);
            }
            $count = count($entries);
            $stmt = null;
          } catch (PDOException $e) {
          echo "An error occurred: " . $e->getMessage();
          exit;
          }

          $pdo = null;

          for($j = 1; $j < 5; $j++){
            echo "<div class='flex' id='column_$j'>";

            for ($i = 0; $i < $count; $i++) {
              if(($i  %  4) == ($j - 1)){

                $entryID = $entries[$count - ($i + 1)][0];
                $entryTitle = $entries[$count - ($i + 1)][1];
                $entryDate = $entries[$count - ($i + 1)][2];
                $entryCover = $entries[$count - ($i + 1)][3];
                $Category = $entries[$count - ($i + 1)][4];

                echo "<a href='blog.php?id=$entryID' category='$Category' id='entry_$entryID'>";
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
          }

          echo "<div id='count' count='$count'>";
          echo "</div>";
        ?>

        <!--
        lass Calculator {
        public function add($num1, $num2) {
          return $num1 + $num2;
          }
        }

        $calc = new Calculator();
        $result = $calc->add(5, 3);
        echo $result;
        -->
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
