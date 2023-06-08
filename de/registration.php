<?php
  require_once '../database_connect.php';

  try {
  $email = $_POST['email'];
  $name = $_POST['name'];

  $query = "INSERT INTO newsletter (email, name) VALUES (:email, :name)";
  $stmt = $pdo->prepare($query);

  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);

  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    echo "New entry created successfully!";
  } else {
    echo "Failed to create a new entry.";
  }

  $stmt = null;
  } catch (PDOException $e) {
  echo "An error occurred: " . $e->getMessage();
  exit;
  }

  $pdo = null;

  header("Location: welcome.php");
?>
