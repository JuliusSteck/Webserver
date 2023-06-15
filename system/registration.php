<?php
  require_once '../database_connection.php';

  try {
  $email = $_POST['email'];
  $name = $_POST['name'];

  $query = "INSERT INTO newsletter (email, name) VALUES (:email, :name)";
  $statement = $pdo->prepare($query);

  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':name', $name, PDO::PARAM_STR);

  $statement->execute();

  if ($statement->rowCount() > 0) {
    echo "New entry created successfully!";
  } else {
    echo "Failed to create a new entry.";
  }

  $statement = null;
  } catch (PDOException $e) {
  echo "An error occurred: " . $e->getMessage();
  exit;
  }

  $pdo = null;

//  $headers = "From: kontakt@julius-steck.de";
//  $mailSent = mail($email, "Willkommen zu meinem Newsletter", "Hi $name, \n$message \nViele Grüße \ndein Julius \n\n\nDies ist eine automatisierte Mail, auf Antworten
//  kann ich nicht reagieren\n<a href='https://julius-steck.de/Webserver/system/unsubscribe.php?id=$subscriber[0]&date=$subscriber[3].php'>Deabbonieren</a>";, $headers);

//  if ($mailSent) {
//      echo "Email sent successfully.";
//  } else {
//      echo "Failed to send email.";
//  }

  header("Location: success.php");
?>
