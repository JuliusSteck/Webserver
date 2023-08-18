<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/blog.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/noscript.css">
    <script src="../script/header.js"></script>
    <script src="../script/navigation.js"></script>
</head>

<body>

<noscript>
  <div class='noscript'>
    <div>
      <h2> JavaScript muss für die Nutzung der seite aktiviert sein.</h2>
    </div>
  </div>
</noscript>

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
      $entryID = 0;
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
        $nextID = 0;
      }
    }

    if($entryID > 1){
      $previousID = $entryID - 1;
    } else {
      $previousID = 0;
    }

    $query = "SELECT EntryID FROM Blog WHERE Category = '$entryCategory' AND EntryID > $entryID ORDER BY EntryID ASC LIMIT 1;";
    $statement = $pdo->query($query);

    if ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $nextCategoryID = $row['EntryID'];
    } else {
      $nextCategoryID = 0;
    }

    $query = "SELECT EntryID FROM Blog WHERE Category = '$entryCategory' AND EntryID < $entryID ORDER BY EntryID ASC LIMIT 1;";
    $statement = $pdo->query($query);

    if ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $previousCategoryID = $row['EntryID'];
    } else {
      $previousCategoryID = 0;
    }

    $query = "SELECT EntryID FROM Blog WHERE story = '$entryStory' AND EntryID > $entryID ORDER BY EntryID ASC LIMIT 1;";
    $statement = $pdo->query($query);

    if ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $nextStoryID = $row['EntryID'];
    } else {
      $nextStoryID = 0;
    }

    $query = "SELECT EntryID FROM Blog WHERE story = '$entryStory' AND EntryID < $entryID ORDER BY EntryID ASC LIMIT 1;";
    $statement = $pdo->query($query);

    if ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $previousStoryID = $row['EntryID'];
    } else {
      $previousStoryID = 0;
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
        </div>

        <div id='layout' class='layout'>
          <div class='flex' id='column_1'>
            <p> $entryDescription</p>
          </div>
          <div class='flex' id='column_2'>
            <img class='' src='../system/image?id=$entryID' alt='Entry Cover'>
          </div>
        </div>";
        ?>
      </div>

      <div id="filter" class="filter">
        <input type="checkbox" id="dropdown">
        <label for="dropdown">
          <img src='../icons/icon_arrow_dropdown.svg' class='icon' alt='dropdown'>
        </label>

        <ul>
          <li><h3>Navigation sortiert nach:<h3></li>
          <li><button type="button" id="button_alles" class="aktiv">Chronologisch</button></li>
          <li><button type="button" id="button_kategorie" class="">In der Kategorie</button></li>
          <li><button type="button" id="button_geschichte" class="">In der Geschichte</button></li>
        <!--  <li><button type="button" id="button_suche" class="">In den Suchergebnissen</button></li> -->
        </ul>
      </div>

      <div class="navigation">

        <?php
          if($nextID > 0)
          {
            echo
            "<a href='blog.php?id=$nextID' id='next' nextID='$nextID' nextCategoryID='$nextCategoryID' nextStoryID='$nextStoryID'>
              <div class='navigation_link'>
                <img src='../icons/icon_arrow_backwards.svg' class='icon' alt='forward'>
              </div>
            </a>";
          }
          else{
            echo
            "<a href='' class='disabled' id='next' nextID='$nextID' nextCategoryID='$nextCategoryID' nextStoryID='$nextStoryID'>
              <div class='navigation_link'>
                <img src='../icons/icon_arrow_backwards.svg' class='icon' alt='forward'>
              </div>
            </a>";
          }
        ?>

          <a href='welcome.php'>
            <div class="navigation_link home">
              <img src='../icons/icon_apps.svg' class='icon' alt='apps'>
            </div>
          </a>

          <?php
            if($previousID > 0)
            {
              echo
              "<a href='blog.php?id=$previousID' id='previous' previousID='$previousID' previousCategoryID='$previousCategoryID' previousStoryID='$previousStoryID'>
                <div class='navigation_link'>
                  <img src='../icons/icon_arrow_forward.svg' class='icon' alt='backward'>
                </div>
              </a>";
            }
            else{
              echo
              "<a href='' class='disabled' id='previous' previousID='$previousID' previousCategoryID='$previousCategoryID' previousStoryID='$previousStoryID'>
                <div class='navigation_link'>
                  <img src='../icons/icon_arrow_forward.svg' class='icon' alt='backward'>
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
