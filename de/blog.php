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

  require_once '../database_connection.php';
  require_once '../session.php';
  require_once '../system/database_methods.php';

  $id = 0;
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
  }
  
  $entryID = 0;
  $entryTitle = "Fortsetzung folgt";
  $entryDate = "in der Zukunft";
  $entryCover = "Julius_Anzug_2020.jpg";
  $entryStory = '-';
  $entryCategory = '-';

  try {
    $entry = getEntry($id);

    $entryID = $entry[0];
    $entryTitle = $entry[1];
    $entryDate = $entry[2];
    $entryCover = $entry[3];
    $entryStory = $entry[4];
    $entryCategory = $entry[5];


    $nextID = getNextNotEmptyId();
    $nextCategoryID = getNextNotEmptyIdByCategory();
    $nextStoryID = getNextNotEmptyIdByStory();
    $previousID = getPreviousNotEmptyId();
    $previousCategoryID = getPreviousNotEmptyIdByCategory();
    $previousStoryID = getPreviousNotEmptyIdByStory();

    $chapters = getChapters($id);
  } catch (PDOException $e){
  echo "An error occurred: " . $e->getMessage();
  exit;
  }

  require_once '../close_database_connection.php';
?>

<section id="blog">
  <div class="container">
    <div>
      <?php
        echo
        "<div class='title'>
          <h1>$entryID $entryTitle</h1>
          <h3> $entryDate</h3>";

          if($_SESSION['admin']){
            echo"<a href='../system/deleteEntry.php?id=$entryID'>löschen</a>";
          }

        echo"
        </div>
        <br>";

        echo"
        <div id='layout' class='layout'>";
        for($j = 0; $j < 2; $j++){
          echo "<div class='column flex'>";

          for ($i = 0; $i < count($chapters); $i++) {
            $id = $chapters[$i][0];
            $title = $chapters[$i][1];
            $text = $chapters[$i][2];
            $image = $chapters[$i][3];

            if(($i  %  2) == $j && $j == 0){
              echo"
              <div>";

              if($title != NULL){
                echo"
                <h3>$title</h3>
                <br>
                <br>";
              }

              if($image != NULL){
                echo"
                <img src='../images/$image' alt='$title'>
                <br>
                <br>";
              }
                
              if($text != NULL){
                echo"
                <p> $text</p>
                <br>
                <br>";
              }
                
              if($_SESSION['admin']){
                echo"<a href='../system/deleteChapter.php?id=$entryID&chapter_id=$id'>löschen</a>";
              }
                
              echo"
              </div>";
            }

            if(($i  %  2) == $j && $j == 1){
              echo"
              <div>";

              if($title != NULL){
                echo"
                <h3>$title</h3>
                <br>
                <br>";
              }
                
              if($text != NULL){
                echo"
                <p> $text</p>
                <br>
                <br>";
              }

              if($image != NULL){
                echo"
                <img src='../images/$image' alt='$title'>
                <br>
                <br>";
              }
                
              if($_SESSION['admin']){
                echo"<a href='../system/deleteChapter.php?id=$entryID&chapter_id=$id'>löschen</a>";
              }
                
              echo"
              </div>";
            }
          }
          echo "</div>";
        }
        echo
        "</div>";
      ?>
    </div>
    
    <?php
      if($_SESSION['admin']){
        echo"
        <div class='flex'>
          <form action='../system/chapter.php' method='POST' enctype='multipart/form-data' class='center box'>
            <h3> Kapitel </h3>

            <input type='hidden' name='id' value='$entryID'>

            <br>
            <div class='text_input'>
              <input type='text' id='title' name='title' class='wide' required>
              <label for='title' class='floating_label'>Überschrift</label>
            </div>

            <br>
            <textarea id='text' name='text' class='wide' required placeholder='Text'></textarea>

            <br>
            <div class='text_input'>
              <input type='file' id='image' name='image' class='wide' required>
              <label for='image' class='hovering_label'>Cover Bild</label>
            </div>

            <br>
            <div class='text_input'>
              <select id='language' name='language' class='wide' required>
                  <option value=''>-- Auswahl --</option>
                  <option value='german'>Deutsch</option>
                  <option value='english'>Englisch</option>
              </select>
              <label for='language' class='hovering_label'>Kategorie</label>
            </div>

            <button type='submit' id='send-button' class='wide'>Senden</button>
          </form>
        </div>";
      }
    ?>

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
      </ul>
    </div>

    <div class="navigation">

      <?php
        if($nextID > 0){
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
      
        echo"
        <a href='welcome.php'>
          <div class='navigation_link home'>
            <img src='../icons/icon_apps.svg' class='icon' alt='apps'>
          </div>
        </a>";

        if($previousID > 0){
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
