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
    <div class="container">
      <div class='center'>
        <h1>Hier <span  class="flexible_caption">anmelden</span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="login" class="login">
    <div class="container">
      <form id="login-form" action="management.php" method="post" class='center'>
        <div class='text_input'>
          <input type="text" id="username" name="username" required>
          <label for="username" class='floating_label'>Username</label>
        </div>
        <div class='text_input'>
          <input type="password" id="password" name="password" required>
          <label for="password" class='floating_label'>Passwort</label>
        </div>
        <div class='button_box'>
          <input type="checkbox" id="show_password">
          <label for="show_password">Passwort anzeigen </label>
        </div>
        <br>
        <button type="submit" id="login-button">Login</button>
        <button type="submit" id="login-button">Passwort vergessen</button>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
