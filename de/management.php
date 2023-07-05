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
    <link rel="stylesheet" href="../style/welcome.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/popup.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>
    <script src="../script/layout.js"></script>
</head>

<body>

  <?php
    include 'header.php';
   ?>

  <noscript>
    <div class='popup'>
      <div>
        <h2> JavaScript muss für die Nutzung der seite aktiviert sein.</h2>
        <button id='button_popup'>Verstanden</button>
      </div>
    </div>
  </noscript>

  <section id="caption">
    <div class="container">
        <h1>Das  <span  class="flexible_caption">Management </span><span id="cursor" class="cursor">_</span> </h1>
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
            '<form action="../system/email.php" method="POST">
                <div class="text_input">
                  <input type="text" id="headline" name="headline" required>
                  <label for="headline" class="floating_label">Headline</label>
                </div>

                <div class="text_input">
                  <textarea id="message" name="message" required></textarea>
                  <label for="message" class="floating_label">Nachricht</label>
                </div>

                <button type="submit" id="send-button">Senden</button>
            </form>';
          } else {
            echo
            '<p> user login </p>';
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
