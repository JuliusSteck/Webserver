<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <?php
    include 'header.php';
   ?>

  <section id="caption">
    <div class="container">
        <h1>Hier <span  class="flexible_caption">anmelden</span><span id="cursor" class="cursor">_</span> </h1>
    </div>

  </section>

  <section id="login" class="login">
    <div class="container">
      <form id="login-form" action="management.php" method="post">
        <label for="username">Username: </label>
        <input type="text" id="username" placeholder="Username" name="username">
        <label for="password">Passwort: <span class="material-symbols-rounded">key </span></label>
        <input type="text" id="password" placeholder="Password" name="password">
        <button type="submit" id="login-button">Login</button>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
