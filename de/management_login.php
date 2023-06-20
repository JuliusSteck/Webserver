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
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
</head>

<body>
  <?php
    include 'header.php';

    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    header("Location: management.php");
    }

    //fix
  ?>

  <section id="caption">
    <div class="container center">
        <h1>Hier <span  class="flexible_caption">anmelden</span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="login" class="login center">
    <div class="container">
      <form id="login-form" action="management.php" method="post">
        <label for="username">Username: </label>
        <input type="text" id="username" placeholder="Username" name="username">
        <label for="password">Passwort: </label> <img src='../icons/icon_key.svg' class='icon small' alt='key'>
        <input type="text" id="password" placeholder="Passwort" name="password">
        <label for="show_passord">Passwort anzeigen </label>
        <input type="checkbox" id="show_password">
        <div class='button_box'>
          <button type="submit" id="login-button">Login</button>
        </div>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
