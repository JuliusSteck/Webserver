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

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
          $username = $_COOKIE['username'];
          $password = $_COOKIE['password'];
        }

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

        try {
          $query = "SELECT * FROM users WHERE username = :username AND password = PASSWORD(:password)";
          $statement = $pdo->prepare($query);

          $statement->bindParam(':username', $username, PDO::PARAM_STR);
          $statement->bindParam(':password', $password, PDO::PARAM_STR);

          $statement->execute();

          if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $admin = $row['admin'];
              $login = true;
          }
          $statement = null;
        } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
        exit;
        }

        $pdo = null;

        if($login){
          setcookie('username', $username, time() + 3600, "/", ".julius-steck.de", true, false);
          setcookie('password', $password, time() + 3600, "/", ".julius-steck.de", true, false);

          if($admin){

            echo
            "<div id='layout' class='grid'>
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

              <form action='../system/entry.php' method='POST' enctype='multipart/form-data' class='center box'>
                <h3> Beitrag </h3>

                <br>
                <div class='text_input'>
                  <input type='text' id='headline_de' name='headline_de' required>
                  <label for='headline_de' class='floating_label'>Headline</label>
                </div>

                <textarea id='message' name='message_de' required placeholder='Nachricht'></textarea>

                <br>
                <div class='text_input'>
                  <input type='text' id='headline_en' name='headline_en' required>
                  <label for='headline_en' class='floating_label'>Headline</label>
                </div>

                <textarea id='message' name='message_en' required placeholder='Nachricht'></textarea>

                <br>
                <div class='text_input'>
                  <input type='file' id='cover' name='cover' required>
                  <label for='cover' class='floating_label'>Headline</label>
                </div>

                <br>
                <div class='text_input'>
                  <input type='text' id='category' name='category' required>
                  <label for='category' class='floating_label'>Headline</label>
                </div>

                <br>
                <div class='text_input'>
                  <input type='text' id='story' name='story' required>
                  <label for='story' class='floating_label'>Headline</label>
                </div>

                <button type='submit' id='send-button'>Senden</button>
              </form>
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
