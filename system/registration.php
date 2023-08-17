<?php
  require_once '../database_connection.php';

  $email = $_POST['email'];
  $name = $_POST['name'];
  $available = true;

  try {
    $query = "SELECT * FROM newsletter WHERE email = :email";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $available = false;
    }
  } catch (PDOException $e) {
  echo "An error occurred: " . $e->getMessage();
  }

  try {
    if($available){
      $query = "INSERT INTO newsletter (email, name) VALUES (:email, :name)";
      $statement = $pdo->prepare($query);

      $statement->bindParam(':email', $email, PDO::PARAM_STR);
      $statement->bindParam(':name', $name, PDO::PARAM_STR);

      $statement->execute();

      if ($statement->rowCount() > 0) {
        $headers = "From: kontakt@julius-steck.de";
        $mailSent = mail($email, "Willkommen zu meinem Newsletter", "Hi $name, \nDanke, dass du meinen Newsletter abonniert hast. \nViele Grüße \ndein Julius \n\n\nDies ist eine automatisierte Mail, auf Antworten
        kann ich nicht reagieren\n", $headers);

        if ($mailSent) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }

      } else {
        echo "Failed to create a new entry.";
      }
    }

    $statement = null;
  } catch (PDOException $e) {
  echo "An error occurred: " . $e->getMessage();
  exit;
  }

  $pdo = null;

  if($available){
    header("Location: ../de/success.php");
  } else {
    header("Location: ../de/failure.php");
  }
?>
