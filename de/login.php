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
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/noscript.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <script src="../script/password.js"></script>
</head>

<body>

<noscript>
    <div class='popup'>
      <div>
        <h2> JavaScript muss f端r die Nutzung der seite aktiviert sein.</h2>
      </div>
    </div>
  </noscript> 

  <?php
    include 'header.php';
    
    require_once '../database_connection.php';

    require_once '../session.php';

    if ($_SESSION['admin']) {
        header("Location: management.php");
    } 

  ?>

  <section id="caption">
    <div class="container">
      <div class='center'>
        <h1>Hier <span  class="flexible_caption">anmelden</span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="login" class="login">
    <div class="container">
      <form id="login-form" action="management.php" method="post" class='center box'>
        <div class='text_input'>
          <input type="text" id="username" name="username" required maxlength="100">
          <label for="username" class='floating_label'>Username</label>
        </div>
        <div class='text_input'>
          <input type="password" id="password" name="password" required maxlength="100">
          <label for="password" class='floating_label'>Passwort</label>
        </div>
        <div class='button_box'>
          <input type="checkbox" id="show_password">
          <label for="show_password">Passwort anzeigen </label>
        </div>
        <br>
        <button type="submit" id="login-button">Login</button>
        <div class='tooltip'>
          <img src='../icons/icon_help.svg' class='icon_small' alt='help'>
          <p>Achte darauf, dass du deine Email verschl端sselt verschickst. Die URL sollte mit https:// beginnen.</p>
        </div>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
