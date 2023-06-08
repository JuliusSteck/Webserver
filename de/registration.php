<?php
  $host = "localhost";
  $database = "JuliusSteckWebserver";
  $username = "JuliusSteck";
  $password = "JuliusSteckWebserver#1";
  $email = $_POST['email'];
  $name = $_POST['name'];

  // Prepare the INSERT statement
  $query = "INSERT INTO newsletter (email, name) VALUES (?, ?)";
  $stmt = $mysqli->prepare($query);

  // Bind the parameters and execute the statement
  $stmt->bind_param("ss", $email, $name);
  $stmt->execute();

  // Check if the insertion was successful
  if ($stmt->affected_rows > 0) {
    echo "New entry created successfully!";
  } else {
    echo "Failed to create a new entry.";
  }

  // Close the statement and database connection
  $stmt->close();
  $mysqli->close();

  header("Location: welcome.php");
?>
