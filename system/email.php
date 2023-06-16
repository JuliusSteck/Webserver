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

            $subscribers[] = array($subscriberID, $subscriberName, $SubscriberEmail, $SubscriberDate);
        }
        $statement = null;

        $count = count($subscribers);

    } catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
    exit;
    }

    $pdo = null;
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
      foreach ($subscribers as $subscriber) {
          $content = "Hi $subscriber[1], \n$message \nViele Grüße \ndein Julius \n\n\nDies ist eine automatisierte Mail, auf Antworten
          kann ich nicht reagieren\nDeabbonieren: https://julius-steck.de/Webserver/system/unsubscribe.php?id=$subscriber[0]&date=$subscriber[3].php";
          $headers = "From: kontakt@julius-steck.de";

          $mailSent = mail($subscriber[2], $headline, $content, $headers);

          if ($mailSent) {
              echo "Email sent successfully.";
          } else {
              echo "Failed to send email.";
          }
        }

        header("Location: ../de/success.php");
    }
    else{
      echo "cookie problem";
    }

  ?>
