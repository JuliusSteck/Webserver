<?php
  require_once '../database_connection.php';
  require_once '../session.php';
  require_once 'database_methods.php';

  try {
    ob_start();
    if (isset($_GET['id']) && isset($_GET['date']) && is_numeric($_GET['id'])){
      $id = $_GET['id'];
      $date = $_GET['date'];

      deleteSubscriber($id, $date);
      $_SESSION['message'] = "Erfolgreich";
      echo "erfolgreich";
    }else{
      $_SESSION['message'] = "Invalid Data";
      echo "invalid Data";
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
