<?php
  require_once '../database_connection.php';

  $headline = $_POST['headline'];
  $message = $_POST['message'];

  try {
    $query = "SELECT * FROM newsletter";
    $statement = $pdo->query($query);
    $subscribers = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $subscriberID = $row['id'];
        $subscriberName = $row['name'];
        $SubscriberEmail = $row['email'];
        $SubscriberDate = $row['subscribed_date'];

        $subsrcibers[] = array($subscriberID, $subscriberName, $SubscriberDate);
    }
    $statement = null;

    foreach ($subscribers as $subscriber) {
        $content = "Hi $subscriber[1], \n $message, \n Deabbonieren: https://julius-steck.de/Webserver/system/unsubscribe.php?id=$subscriber[0].php";
        mail($subscriber[2], $headline, $content);
    }

  } catch (PDOException $e) {
  echo "An error occurred: " . $e->getMessage();
  exit;
  }

  $pdo = null;

  header("Location: ../de/management.php");

  ?>
