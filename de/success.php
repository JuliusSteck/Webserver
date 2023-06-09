<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/success.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/noscript.css">
    <link rel="stylesheet" href="../style/blog.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
</head>

<body>

<?php
    include 'header.php';

    require_once '../database_connection.php';

    try {
      $query = "SELECT EntryID, EntryTitle_de, EntryDescription_de, EntryDate, EntryCover, Category, story FROM Blog ORDER BY EntryID DESC
      LIMIT 1";
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

      $statement = null;
    } catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
    exit;
    }

    $pdo = null;
   ?>

  <noscript>
    <div class='noscript'>
      <div>
        <h2> JavaScript muss für die Nutzung der seite aktiviert sein.</h2>
      </div>
    </div>
  </noscript>

  <section id="caption">
    <div class="container">
        <h1>Erfolgreich <span  class="flexible_caption">durchgeführt</span><span id="cursor" class="cursor">_</span> </h1>
        

        <?php
          echo 
          "<h3>Hier geht es zu meinem neusten Beitrag</h3>
          <a href='blog.php?id=$entryID' class='underline'>$entryTitle</a>";
          ?>
    </div>
  </section>
  
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
            <img class='' src='../images/$entryCover' alt='Entry Cover'>
          </div>
        </div>";
        ?>
      </div>
    </div>
  </section>
  
  <?php
    include 'footer.php';
   ?>
</body>
</html>
