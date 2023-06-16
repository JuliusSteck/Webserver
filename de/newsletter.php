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
    <link rel="stylesheet" href="../style/newsletter.css">
    <link rel="stylesheet" href="../style/welcome.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <script src="../script/layout.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

  <?php
    include 'header.php';
   ?>

  <section id="caption">
    <div class="container">
        <h1>Der  <span  class="flexible_caption">Newsletter</span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="newsletter" class='newsletter'>
    <div class="container">
      <form id="newsletter-form" action="../system/registration.php" method="post">
        <label for="name">Name: </label>
        <input type="text" id="name" placeholder="Name" name="name">
        <label for="email">Email:</label>
        <input type="text" id="email" placeholder="EMail" name="email">
        <button type="submit" id="registration-button">Abbonieren</button>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
