<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    ob_start();

    if ($_SESSION['admin']) {
        $headline_de = $_POST['headline_de'];
        $headline_en = $_POST['headline_en'];
        $category = $_POST['category'];
        $story = $_POST['story'];
        $cover = $_FILES['cover']['tmp_name'];
        $targetDirectory = '../images/';
        $targetFileName = basename($_FILES['cover']['name']);
        $targetPath = $targetDirectory . $targetFileName;

        if (move_uploaded_file($cover, $targetPath)) {
            echo "File uploaded and moved successfully.";
        } else {
            echo "Error moving file.";
        }

        $coverData = fopen($targetPath, 'rb');

        $query = "INSERT INTO Blog (title_de, title_en, category, story, image, cover,  date) VALUES (?, ?, ?, ?, ?, ?, CURDATE())";

        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $headline_de);
        $statement->bindParam(2, $headline_en);
        $statement->bindParam(3, $category);
        $statement->bindParam(4, $story);
        $statement->bindParam(5, $coverData, PDO::PARAM_LOB);
        $statement->bindParam(6, $targetFileName);
        
    
        if ($statement->execute()) {
            echo "New entry added successfully.";
        } else {
            echo "Error: ";
        }
        
        fclose($coverData);
    }
    else{
      echo "not admin";
    }

    ob_end_flush();
    $statement = null;
    $pdo = null;

    header("Location: ../de/management.php");
?>
