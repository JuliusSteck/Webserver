<?php
    require_once '../database_connection.php';

    $headline = $_POST['headline'];
    $message = $_POST['message'];

    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
      $username = $_COOKIE['username'];
      $password = $_COOKIE['password'];
    }

    try {
      $query = "SELECT * FROM users WHERE username = :username AND password = PASSWORD(:password)";
      $statement = $pdo->prepare($query);

      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->bindParam(':password', $password, PDO::PARAM_STR);

      $statement->execute();

      if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $admin = $row['admin'];
      }
      $statement = null;
    } catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
    }

    $pdo = null;
    if ($admin) {
        $headline_de = $_POST['headline_de'];
        $message_de = $_POST['message_de'];
        $headline_en = $_POST['headline_en'];
        $message_en = $_POST['message_en'];
        $category = $_POST['category'];
        $story = $_POST['story'];
        $cover = $_FILES['cover']['tmp_name'];
    
        $coverData = file_get_contents($cover);
    
        $query = "INSERT INTO Blog (headline_de, message_de, headline_en, message_en, category, story, cover) VALUES (?, ?, ?, ?, ?, ?, ?)"

        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $headline_de);
        $statement->bindParam(2, $message_de);
        $statement->bindParam(3, $headline_en);
        $statement->bindParam(4, $message_en);
        $statement->bindParam(5, $category);
        $statement->bindParam(6, $story);
        $statement->bindParam(7, $coverData);
    
        if ($statement->execute()) {
            echo "New entry added successfully.";
        } else {
            echo "Error: ";
        }
    
    }
    else{
      echo "cookie problem";
    }

  ?>
