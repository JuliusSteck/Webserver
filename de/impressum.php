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
  <link rel="stylesheet" href="../style/impressum.css">
  <link rel="stylesheet" href="../style/footer.css">
  <link rel="stylesheet" href="../style/noscript.css">
  <script src="../script/header.js"></script>
  <script src="../script/caption.js"></script>
  <script src="../script/popup.js"></script>
  <script src="../script/search.js"></script>
</head>

<body>

  <?php
    include 'header.php';
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once '../system/database_methods.php';
  
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
      echo "
      <div id='popup' class='popup'>
        <h3>{$_SESSION['message']}</h3>
        <input type='checkbox' id='close'>
        <label for='close'>
          <img src='../icons/icon_close.svg' class='icon' alt='close'>
        </label>
      </div>";
    }

    require_once '../close_database_connection.php';
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
        <h1>Das <span class="flexible_caption">Impressum </span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="impressum">
    <div class="container">
      <div class="devider">
        <div class="line"></div>
        <h3> Impressum</h3>
        <div class="line"></div>
      </div>
      <p>
        <br>
        Dieses Impressum gilt für die Seite www.julius-steck.de sowie für die Seiten von Julius Steck in sozialen Netzwerken und den Podcast "Die Generaldebatte".
        <br>
        <br>
        Julius Steck
        <br>
        <br>
        Karlshulderstraße 11a
        85051 Ingolstadt
        <br>
        <br>
        Kontakt:
        <br>
        E-Mail: kontakt@julius-steck.de
        <br>
        Telefon: +49 01575 1200 817
        <br>
        <br>
        Julius Steck ist zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle weder bereit noch dazu verpflichtet.
        <br>
        <br>
      </p>
      <a href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home.chooseLanguage" class = underline>
        Plattform der EU-Kommision zur Online-Streitbeilegung
      </a>

      <p>
        <br>
        Alle Bilder und Texte auf dieser Website gehören mir.
        <br>
        Kommerzielle Nutzung ist nur mit meinem Einverständniss erlaubt.
        <br>
        Nicht kommerzielle ist unter Verwendung einer Quellenangabe erlaubt.
        <br>
        Nutzung für das Training von KI (Künstlicher Intelligenz) Anwendungen ist in keinem Fall erlaubt.
      </p>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>
</body>
</html>
