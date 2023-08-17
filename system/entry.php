<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    if ($_SESSION['admin']) {
        $headline_de = $_POST['headline_de'];
        $message_de = $_POST['message_de'];
        $headline_en = $_POST['headline_en'];
        $message_en = $_POST['message_en'];
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
    
        $query = "INSERT INTO Blog (EntryTitle_de, EntryDescription_de, EntryTitle_en, EntryDescription_en, Category, story, image, EntryCover,  EntryDate, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), 'entry')";


        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $headline_de);
        $statement->bindParam(2, $message_de);
        $statement->bindParam(3, $headline_en);
        $statement->bindParam(4, $message_en);
        $statement->bindParam(5, $category);
        $statement->bindParam(6, $story);
        $statement->bindParam(7, $coverData, PDO::PARAM_LOB);
        $statement->bindParam(8, $targetFileName);
        
    
        if ($statement->execute()) {
            echo "New entry added successfully.";
        } else {
            echo "Error: ";
        }
        fclose($coverData);
    }
    else{
      echo "cookie problem";
    }


     $statement = null;
     $pdo = null;
  ?>
