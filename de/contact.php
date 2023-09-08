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
  <link rel="stylesheet" href="../style/noscript.css">
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
      <div class='center'>
        <h1>Schreib <span class="flexible_caption">mir</span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <form id="contact-form" action="../system/message.php" method="post" class='center box grid'>
        <div class='text_input left'>
          <input type="text" id="name" name="name" required maxlength="100">
          <label for="name" class='floating_label'>Name</label>
        </div>
        <div class='text_input left'>
          <input type="text" id="headline" name="headline" required maxlength="100">
          <label for="headline" class='floating_label'>Betreff</label>
        </div>
        
        <div class="text_input left">
          <input type="email" id="email" name="email" required>
          <label for="email" class="floating_label">Email</label>
        </div>

        <textarea class='right' id="message" name="message" placeholder='Nachricht' required></textarea>

        <button class='left' type="submit" id="send-button">Senden</button>

        <div class='min'>
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
        </div>
      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>
</body>
</html>
