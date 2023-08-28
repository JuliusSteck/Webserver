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
    <link rel="stylesheet" href="../style/newsletter.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/noscript.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
</head>

<body>

  <?php
    include 'header.php';
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
       <div class='center'>
         <h1>Der <span  class="flexible_caption">Newsletter</span><span id="cursor" class="cursor">_</span> </h1>
       </div>
     </div>
   </section>

  <section id="newsletter">
    <div class="container">
      <form id="newsletter-form" action="../system/registration.php" method="post" class='center box'>
        <div class='text_input'>
          <input type="text" id="name" name="name" required maxlength="100" placeholder=' '>
          <label for="name" class='floating_label'>Name</label>
        </div>
        <div class='text_input'>
          <input type="text" id="email" name="email" required maxlength="100" placeholder=' '>
          <label for="email" class='floating_label'>Email</label>
        </div>
        <br>
        <button type="submit" id="registration-button">Abbonieren</button>
        <div class='tooltip'>
          <img src='../icons/icon_help.svg' class='icon_small' alt='help'>
          <p>Achte darauf, dass du deine Email verschlüsselt verschickst. Die URL sollte mit https:// beginnen.</p>
        </div>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
