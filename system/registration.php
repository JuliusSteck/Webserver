<?php
  require_once '../database_connection.php';
  require_once '../session.php';
  require_once 'database_methods.php';

  try {
    ob_start();
    if (isset($_GET['email']) && isset($_GET['name'])){
      $email = $_POST['email'];
      $name = $_POST['name'];
      if (checkEmail($email)){
        insertSubscriber($email, $name)
        $headers = "From: kontakt@julius-steck.de";
        $mailSent = mail($email, "Willkommen zu meinem Newsletter", 
        "Hi $name, \n
        Danke, dass du meinen Newsletter abonniert hast. \n
        Viele Grüße \n
        dein Julius \n\n\n
        
        
        Dies ist eine automatisierte Mail, auf Antworten
        kann ich nicht reagieren\n", $headers);

        if ($mailSent) {
          echo "Email sent successfully.";
        } else {
          echo "Failed to send email.";
        }
        $_SESSION['message'] = "Erfolgreich";
        echo "erfolgreich";
      } else {
        $_SESSION['message'] = "Email in Verwendung";
        echo "Email in Verwendung";
      }
    }else{
      $_SESSION['message'] = "Invalid Input";
      echo "invalid Input";
    }
  } catch (PDOException $e){
    $_SESSION['message'] = "Datenbank-Fehler: " . $e->getMessage();
    echo "Datenbank-Fehler";
  } finally{
    ob_end_flush();
  }

  require_once '../close_database_connection.php';
  header("Location: ../de/newsletter.php");
?>
