<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/entry.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <script src="../script/layout.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

  <?php
  $host = "localhost";
  $database = "JuliusSteckWebserver";
  $username = "JuliusSteck";
  $password = "JuliusSteckWebserver#1";

  $id = $_GET['id'];

  $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

  $query = "SELECT EntryID, EntryTitle_de, EntryDescription_de, EntryDate, EntryCover FROM Blog WHERE EntryID = $id";
  $statement = $pdo->query($query);

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $entryID = $row['EntryID'];
      $entryTitle = $row['EntryTitle_de'];
      $entryDescription = $row['EntryDescription_de'];
      $entryDate = $row['EntryDate'];
      $entryCover = $row['EntryCover'];

  }

   ?>

  <div id="black" class="invisible"></div>

  <header id="header">
    <div class="top container">
      <h2>
        Julius_Steck
      </h2>

      <input type="checkbox" id="menu">
      <label for="menu">
          <span class="material-symbols-rounded"> menu</span>
      </label>

      <nav>
        <ul>
          <li><a href="about_me.php">Über_mich</a></li>
          <li><a href="welcome.php" class="aktiv">Blog</a></li>
          <li><a href="podcast.php">Podcast</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="contact.php">Kontakt</a></li>
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

      <?php
        echo "<div class='description'>";
          echo "<h3>$entryTitle</h3>";
          echo "<p> $entryDate</p>";
        echo "</div>";
      ?>

      <div id="entry" class="entry">
        <?php
          echo "<div class='description'>";
            echo "<p> $entryDescription</p>";
          echo "</div>";
          echo "<img class='' src='../images/$entryCover' alt='Entry Cover'>";
        ?>
    </div>
  </section>

  <footer>
    <div class="container">
      <ul>
        <li><a href="impressum.php">Impressum</a></li>
        <li><a href="data_protection.php">Datenschutz</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>
