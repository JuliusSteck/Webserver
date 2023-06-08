<?php
  $host = "localhost";
  $database = "JuliusSteckWebserver";
  $username = "JuliusSteck";
  $password = "JuliusSteckWebserver#1";

  try {
  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

  // Set PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Get the values from a form or any other source
  $email = $_POST['email'];
  $name = $_POST['name'];

  // Prepare the SQL statement with placeholders
  $query = "INSERT INTO newsletter (email, name) VALUES (:email, :name)";
  $stmt = $pdo->prepare($query);

  // Bind the parameters
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);

  // Execute the statement
  $stmt->execute();

  // Check if the insertion was successful
  if ($stmt->rowCount() > 0) {
    echo "New entry created successfully!";
  } else {
    echo "Failed to create a new entry.";
  }

  // Close the statement and database connection
  $stmt = null;
  $pdo = null;
  } catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
  }

  header("Location: welcome.php");
?>
