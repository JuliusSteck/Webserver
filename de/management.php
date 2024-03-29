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
    <link rel="stylesheet" href="../style/management.css">
    <link rel="stylesheet" href="../style/footer.css">
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
        <h1>Das  <span  class="flexible_caption">Management </span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="management">
    <div class="container">
      <?php
        $countNewsletter = countSubscribers();

        require_once '../close_database_connection.php';

        if($_SESSION['login']){
          if($_SESSION['admin']){
            echo
            "<div id='layout' class='grid'>
              <div class='flex'>
                <form action='../system/email.php' method='POST' class='center box'>
                  <h3> Newsletter </h3>
                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required placeholder=' '>
                    <label for='headline' class='floating_label'>Headline</label>
                  </div>

                  <textarea id='message' name='message' required placeholder='Nachricht'></textarea>


                  <button type='submit' id='send-button'>Senden</button>

                  <p>Abbonenten: $countNewsletter</p>
                </form>
                <!--
                <form action='../system/caption.php' method='POST' class='center box'>
                  <h3> Captions </h3>
                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                  </div>

                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                  </div>

                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                  </div>

                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                  </div>

                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                  </div>

                  <button type='submit' id='deliveryd-button'>Senden</button>

                </form>-->
              </div>

              <div class='flex'>
                <form action='../system/entry.php' method='POST' enctype='multipart/form-data' class='center box'>
                  <h3> Beitrag </h3>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline_de' name='headline_de' class='wide' required>
                    <label for='headline_de' class='floating_label'>Headline Deutsch</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline_en' name='headline_en' class='wide' required>
                    <label for='headline_en' class='floating_label'>Headline Englisch</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <input type='file' id='cover' name='cover' class='wide' required>
                    <label for='cover' class='hovering_label'>Cover Bild</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <select id='category' name='category' class='wide' required>
                        <option value=''>-- Auswahl --</option>
                        <option value='Work'>Arbeit</option>
                        <option value='Freetime'>Freizeit</option>
                        <option value='Announcement'>Annkündigung</option>
                        <option value='Technology'>Technologie</option>
                        <option value='Politics'>Politik</option>
                    </select>
                    <label for='category' class='hovering_label'>Kategorie</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='story' name='story' class='wide' required>
                    <label for='story' class='floating_label'>Geschichte</label>
                  </div>

                  <button type='submit' id='subbmit-button' class='wide'>Senden</button>
                </form>
              </div>
            </div>";
          } else {
            echo
            '<p> user login muss noch programmiert werden :)</p>';
          }
        }else{
          header("Location: login.php");
        }
      ?>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>
</body>
</html>
