<!DOCTYPE html>
<html>
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <?php
      echo "Hello World!";
    ?>

    <?php

      $host = "localhost";
      $database = "JuliusSteckWebserver";
      $username = "JuliusSteck";
      $password = "JuliusSteckWebserver#1";

      $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);


      $query = "SELECT EntryID, EntryTitle, EntryDate, EntryCover FROM Blog";
      $statement = $pdo->query($query);


      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $entryID = $row['EntryID'];
          $entryTitle = $row['EntryTitle'];
          $entryDate = $row['EntryDate'];
          $entryCover = $row['EntryCover'];


          echo "<h2>$entryTitle</h2>";
          echo "<p>Date: $entryDate</p>";
          echo "<img src='data:image/jpeg;base64," . base64_encode($entryCover) . "' alt='Entry Cover'>";
          echo "<hr>";
      }
    ?>


    <div class="container">

    </div>
</body>
</html>
