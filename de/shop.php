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
  <link rel="stylesheet" href="../style/shop.css">
  <link rel="stylesheet" href="../style/footer.css">
  <script src="../script/header.js"></script>
  <script src="../script/caption.js"></script>
  <script src="../script/layout.js"></script>
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
        <h1>Der <span  class="flexible_caption">Shop </span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="shop">
    <div class="container">
      <h2>Erscheint in Kürze</h2>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>
</body>
</html>
