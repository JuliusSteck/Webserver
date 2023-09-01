<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    $headline = $_POST['headline'];
    $message = $_POST['message'];

    $pdo = null;
    if ($_SESSION['admin']) {

    try {
      $query = "SELECT * FROM newsletter";
      $statement = $pdo->query($query);
      $subscribers = array();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $subscriberID = $row['id'];
          $subscriberName = $row['name'];
          $SubscriberEmail = $row['email'];
          $SubscriberDate = $row['subscribed_date'];

          $subscribers[] = array($subscriberID, $subscriberName, $SubscriberEmail, $SubscriberDate);
      }
      $statement = null;

      } catch (PDOException $e) {
      echo "An error occurred: " . $e->getMessage();
      exit;
      }

      foreach ($subscribers as $subscriber) {
        $content = "Hi $subscriber[1], \n$message \nViele Grüße \ndein Julius \n\n\nDies ist eine automatisierte Mail, auf Antworten
        kann ich nicht reagieren\nDeabbonieren: https://julius-steck.de/Webserver/system/unsubscribe.php?id=$subscriber[0]&date=$subscriber[3].php";
        $headers = "From: newsletter@julius-steck.de";

        $mailSent = mail($subscriber[2], $headline, $content, $headers);

        if ($mailSent) {
          header("Location: ../de/management.php");
        } else {
          header("Location: ../de/management.php");
        }
      }

    }
    else{
      echo "cookie problem";
    }

  ?>
