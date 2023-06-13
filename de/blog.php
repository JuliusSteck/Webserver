<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/blog.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

  <?php
    include 'header.php';
    $id = $_GET['id'];

    require_once '../database_connection.php';

    try {
      $query = "SELECT EntryID, EntryTitle_de, EntryDescription_de, EntryDate, EntryCover, Category, story FROM Blog WHERE EntryID = $id";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $entryID = $row['EntryID'];
          $entryTitle = $row['EntryTitle_de'];
          $entryDescription = $row['EntryDescription_de'];
          $entryDate = $row['EntryDate'];
          $entryCover = $row['EntryCover'];
          $entryStory = $row['story'];
          $entryCategory = $row['Category'];
      } else {
        $entryID = "0";
        $entryTitle = "Fortsetzung folgt";
        $entryDescription = "Bleibt gespannt";
        $entryDate = "in der Zukunft";
        $entryCover = "Julius_Anzug_2020.jpg";
        $entryStory = $row['-'];
        $entryCategory = $row['-'];
      }

      $query = "SELECT MAX(EntryID) AS MaxEntryID FROM Blog";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $maxEntryID = $row['MaxEntryID'];
        if($maxEntryID > $entryID){
          $nextID = $entryID + 1;
        } else {
          $nextID = '0';
        }
      }

      if($entryID > 1){
        $previousID = $entryID - 1;
      } else {
        $previousID = '0';
      }

      $query = "SELECT EntryID FROM Blog WHERE Category = '$entryCategory' AND EntryID > $entryID ORDER BY EntryID ASC LIMIT 1;";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $nextCategoryID = $row['EntryID'];
      } else {
        $nextCategoryID = "0";
      }

      $query = "SELECT EntryID FROM Blog WHERE Category = '$entryCategory' AND EntryID < $entryID ORDER BY EntryID ASC LIMIT 1;";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $previousCategoryID = $row['EntryID'];
      } else {
        $previousCategoryID = "0";
      }

      $query = "SELECT EntryID FROM Blog WHERE story = '$entryStory' AND EntryID > $entryID ORDER BY EntryID ASC LIMIT 1;";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $nextStoryID = $row['EntryID'];
      } else {
        $nextStoryID = "0";
      }

      $query = "SELECT EntryID FROM Blog WHERE story = '$entryStory' AND EntryID < $entryID ORDER BY EntryID ASC LIMIT 1;";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $previousStoryID = $row['EntryID'];
      } else {
        $previousStoryID = "0";
      }

      $statement = null;
    } catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
    exit;
    }

    $pdo = null;
   ?>

  <section id="blog">
    <div class="container">
      <div>
        <?php
          echo
          "<div class='title'>
            <h1>$entryTitle</h1>
            <h3> $entryDate</h3>
          </div>";
          ?>
      </div>

      <div id="layout" class="layout">
        <?php
          echo
          "<div class='flex' id='column_1'>
            <p> $entryDescription</p>
          </div>
          <div class='flex' id='column_2'>
            <img class='' src='../images/$entryCover' alt='Entry Cover'>
           </div>";
        ?>
      </div>

      <div id="filter" class="filter">
        <input type="checkbox" id="dropdown">
        <label for="dropdown">
          <span class="material-symbols-rounded">arrow_drop_down</span>
        </label>

        <ul>
          <li><h3>Navigation sortiert nach:<h3></li>
          <li><button type="button" id="button_alles" class="aktiv">Chronologisch</button></li>
          <li><button type="button" id="button_arbeit" class="">In der Kategorie</button></li>
          <li><button type="button" id="button_freizeit" class="">In der Geschichte</button></li>
        <!--  <li><button type="button" id="button_ankuendigungen" class="">In den Suchergebnissen</button></li> -->
        </ul>
      </div>

      <div class="navigation">

        <?php
          if($nextID > 0)
          {
            echo
            "<a href='blog.php?id=$nextID'>
              <div class='navigation_link' nextID='$nextID' nextCategoryID='$nextCategoryID' nextStoryID='$nextStoryID'>
              <span class='material-symbols-rounded'>arrow_back_ios</span>
              </div>
            </a>";
          }
          else{
            echo
            "<a href=''>
              <div class='navigation_link disabled' nextID='$nextID' nextCategoryID='$nextCategoryID' nextStoryID='$nextStoryID'>
              <span class='material-symbols-rounded'>arrow_back_ios</span>
              </div>
            </a>";
          }
        ?>

          <a href='welcome.php'>
            <div class="navigation_link home">
              <span class="material-symbols-rounded">apps</span>
            </div>
          </a>

          <?php
            if($previousID > 0)
            {
              echo
              "<a href='blog.php?id=$previoustID'>
                <div class='navigation_link' nextID='$previousID' nextCategoryID='$previousCategoryID' nextStoryID='$previousStoryID'>
                <span class='material-symbols-rounded'>arrow_back_ios</span>
                </div>
              </a>";
            }
            else{
              echo
              "<a href=''>
                <div class='navigation_link disabled' nextID='$previousID' nextCategoryID='$previousCategoryID' nextStoryID='$previousStoryID'>
                <span class='material-symbols-rounded'>arrow_back_ios</span>
                </div>
              </a>";
            }
          ?>

      </div>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
