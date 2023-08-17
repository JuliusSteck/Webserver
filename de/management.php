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
    <link rel="stylesheet" href="../style/management.css">
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
        <h1>Das  <span  class="flexible_caption">Management </span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="management">
    <div class="container">
      <?php
        require_once '../database_connection.php';

        require_once '../session.php';

        try {
          $query = "SELECT COUNT(id) as countNewsletter FROM newsletter ";
          $statement = $pdo->prepare($query);

          $statement->execute();

          if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $countNewsletter = $row['countNewsletter'];
          }
        } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
        }

        $login = false;

        $pdo = null;

        if($_SESSION['login']){
          

          if($_SESSION['admin']){

            echo
            "<div id='layout' class='grid'>
              <div class='flex'>
                <form action='../system/email.php' method='POST' class='center box'>
                  <h3> Newsletter </h3>
                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline' name='headline' required>
                    <label for='headline' class='floating_label'>Headline</label>
                  </div>

                  <textarea id='message' name='message' required placeholder='Nachricht'></textarea>


                  <button type='submit' id='send-button'>Senden</button>

                  <p>Abbonenten: $countNewsletter</p>
                </form>
              </div>

              <div class='flex'>
                <form action='../system/entry.php' method='POST' enctype='multipart/form-data' class='center box'>
                  <h3> Beitrag </h3>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline_de' name='headline_de' required>
                    <label for='headline_de' class='floating_label'>Headline Deutsch</label>
                  </div>

                  <textarea id='message' name='message_de' required placeholder='Nachricht Deutsch'></textarea>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='headline_en' name='headline_en' required>
                    <label for='headline_en' class='floating_label'>Headline Englisch</label>
                  </div>

                  <textarea id='message' name='message_en' required placeholder='Nachricht Englisch'></textarea>

                  <br>
                  <div class='text_input'>
                    <input type='file' id='cover' name='cover' required>
                    <label for='cover' class='floating_label'>Cover Image</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='category' name='category' required>
                    <label for='category' class='floating_label'>Kategorie</label>
                  </div>

                  <br>
                  <div class='text_input'>
                    <input type='text' id='story' name='story' required>
                    <label for='story' class='floating_label'>Geschichte</label>
                  </div>

                  <button type='submit' id='send-button'>Senden</button>
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
