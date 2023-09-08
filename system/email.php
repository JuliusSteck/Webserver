<?php
  require_once '../database_connection.php';
  require_once '../session.php';
  require_once 'database_methods.php';

  try {
    ob_start();
    if (isset($_GET['headline']) && isset($_GET['message'])){
      $headline = $_POST['headline'];
      $message = $_POST['message'];
      if ($_SESSION['admin']){
        $subscribers = getSubscribers();
        foreach ($subscribers as $subscriber) {
          $content = "Hi $subscriber[1], \n$message \nViele Grüße \ndein Julius \n\n\nDies ist eine automatisierte Mail, auf Antworten
          kann ich nicht reagieren\nDeabbonieren: https://julius-steck.de/Webserver/system/unsubscribe.php?id=$subscriber[0]&date=$subscriber[3].php";
          $headers = "From: newsletter@julius-steck.de";
  
          $mailSent = mail($subscriber[2], $headline, $content, $headers);
  
          if ($mailSent) {
            $_SESSION['message'] = "Senden erfolgreich";
            echo "Erfolg";
          } else {
            $_SESSION['message'] = "Senden fehlgeschlagen";
            echo "Misserfolg";
          }
        }
      } else {
        $_SESSION['message'] = "Nicht berechtigt";
        echo "nicht berechtigt";
      }
    }else{
      $_SESSION['message'] = "Invalid Content";
      echo "invalid Content";
    }
  } catch (PDOException $e){
    $_SESSION['message'] = "Datenbank-Fehler: " . $e->getMessage();
    echo "Datenbank Fehler";
  } finally{
    ob_end_flush();
  }

  require_once '../close_database_connection.php';
  header("Location: ../de/management.php");
?>
