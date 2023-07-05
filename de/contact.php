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
    <link rel="stylesheet" href="../style/contact.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/popup.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
</head>

<body>

<noscript>
    <div class='noscript'>
      <div>
        <h2> JavaScript muss für die Nutzung der seite aktiviert sein.</h2>
      </div>
    </div>
  </noscript>

  <?php
    include 'header.php';
   ?>

  <section id="caption">
    <div class="container">
        <h1>Ich bin <span id="flexible_caption" class="flexible_caption"> </span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <form id="contact-form" action="message.php" method="post" class='center box'>
        <div class='text_input'>
          <input type="text" id="name" name="name" required maxlength="100">
          <label for="name" class='floating_label'>Name</label>
        </div>
        <div class='text_input'>
          <input type="text" id="headline" name="headline" required maxlength="100">
          <label for="headline" class='floating_label'>Betreff</label>
        </div>
        
        <div class="text_input">
          <input type="text" id="email" name="email" required>
          <label for="email" class="floating_label">Email</label>
        </div>

        <div class="text_input">
          <textarea id="message" name="message" required></textarea>
          <label for="message" class="floating_label">Nachricht</label>
        </div>

        <button type="submit" id="send-button">Senden</button>

        <div class='tooltip'>
          <img src='../icons/icon_help.svg' class='icon_small' alt='help'>
          <p>Achte darauf, dass du deine Email verschlüsselt verschickst. Die URL sollte mit https:// beginnen.</p>
        </div>
        <div class='tooltip'>
          <img src='../icons/icon_help.svg' class='icon_small' alt='help'>
          <p>Deine Nachricht wird am Server nicht gespeichert, sondern sofort an mein Email Postfach weiter geleitet.
            Wo deine Nachricht erhalten bleibt, bis unsere Unterhaltung vorbei ist, oder du eine Löschung wünschst.
          </p>
        </div>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
