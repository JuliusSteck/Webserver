<?php
  require_once '../database_connection.php';

  $id = $_GET['id'];
  $date = $_GET['date']

  try {
    $query = "DELETE FROM newsletter WHERE id = :id AND date = :date";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);

    $statement->execute();

    if ($statement->rowCount() > 0) {
      header("Location: ../de/success.php");
    } else {
      header("Location: ../de/failure.php");
    }

    $statement = null;
    } catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
    }

  exit;
  $pdo = null;

  header("Location: ../de/welcome.php");
?>
