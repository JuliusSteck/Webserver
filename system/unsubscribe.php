<?php
  require_once '../database_connection.php';

  $id = $_GET['id'];

  try {
    $query = "DELETE FROM newsletter WHERE id = :id";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':id', $id, PDO::PARAM_STR);

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

  header("Location: ../de/success.php");

  ?>
