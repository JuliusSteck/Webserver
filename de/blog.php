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
      $query = "SELECT EntryID, EntryTitle_de, EntryDescription_de, EntryDate, EntryCover FROM Blog WHERE EntryID = $id";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $entryID = $row['EntryID'];
          $entryTitle = $row['EntryTitle_de'];
          $entryDescription = $row['EntryDescription_de'];
          $entryDate = $row['EntryDate'];
          $entryCover = $row['EntryCover'];
      } else {
        $entryID = "0";
        $entryTitle = "Fortsetzung folgt";
        $entryDescription = "Bleibt gespannt";
        $entryDate = "in der Zukunft";
        $entryCover = "Julius_Anzug_2020.jpg";
      }

      $query = "SELECT MAX(EntryID) AS MaxEntryID FROM Blog";
      $statement = $pdo->query($query);

      if ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $maxEntryID = $row['MaxEntryID'];
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
          echo "<div class='title'>";
            echo "<h1>$entryTitle</h1>";
            echo "<h3> $entryDate</h3>";
          echo "</div>";
          ?>
      </div>

      <div id="layout" class="layout">
        <?php
          echo "<div class='flex' id='column_1'>";
            echo "<p> $entryDescription</p>";
          echo "</div>";
          echo "<div class='flex' id='column_2'>";
            echo "<img class='' src='../images/$entryCover' alt='Entry Cover'>";
          echo "</div>";
        ?>
      </div>

      <div class="navigation">

        <?php
          if($entryID < $maxEntryID)
          {
            $nextID = $entryID + 1;
            echo "<a href='blog.php?id=$nextID'>";
            echo '<div class="navigation_link">';
          }
          else{
            echo '<div class="navigation_link disabled">';
          }
        ?>

          <span class="material-symbols-rounded">arrow_back_ios</span>

        <?php
          echo "</div>";
          if($entryID < $maxEntryID)
          {
            echo "</a>";
          }
        ?>

          <a href='welcome.php'>
            <div class="navigation_link home">
              <span class="material-symbols-rounded">apps</span>
            </div>
          </a>

        <?php
          if($entryID > 1) {
            $previousID = $entryID - 1;
            echo "<a href='blog.php?id=$previousID'>";
            echo "  <div class='navigation_link'>";
          }
          else{
            echo "<div class='navigation_link disabled'>";
          }
        ?>

          <span class="material-symbols-rounded">arrow_forward_ios</span>

        <?php
          echo "</div>";
          if($entryID > 1) {
            $previousID = $entryID - 1;
            echo "</a>";
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
