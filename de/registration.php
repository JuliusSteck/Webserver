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

  header("Location: welcome.php");
?>
