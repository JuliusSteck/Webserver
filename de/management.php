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
        <h1>Das  <span  class="flexible_caption">Management </span><span id="cursor" class="cursor">_</span> </h1>
    </div>
  </section>

  <section id="management">
    <div class="container">
      <?php
        require_once '../database_connection.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = false;

        try {
          $query = "SELECT * FROM users WHERE username = :username AND password = PASSWORD(:password))";
          $statement = $pdo->prepare($query);

          $statement->bindParam(':username', $username, PDO::PARAM_STR);
          $statement->bindParam(':password', $password, PDO::PARAM_STR);
          $statement = $pdo->query($query);

          if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $username = $row['username'];
              $login = true;
          }
          $statement = null;
        } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
        exit;
        }

        $pdo = null;

        if($login){
          echo "Hallo $username";
        }
       ?>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
