<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    ob_start();

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

        if (isset($_FILES['image']['tmp_name'])) {
            $image = $_FILES['image']['tmp_name'];
            $targetFileNameImage = basename($_FILES['image']['name']);
            $targetPathImage = $targetDirectory . $targetFileNameImage;
            if (move_uploaded_file($image, $targetPathImage)) {
                echo "File uploaded and moved successfully.";
            } else {
                echo "Error moving file.";
            }

            $ImageData = fopen($targetPathImage, 'rb');

            $query = "INSERT INTO Blog (EntryTitle_de, EntryDescription_de, EntryTitle_en, EntryDescription_en, Category, story, image, EntryCover,  EntryDate, type, Image2, EntryCover2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), 'entry', ?, ?)";


            $statement = $pdo->prepare($query);
            $statement->bindParam(1, $headline_de);
            $statement->bindParam(2, $message_de);
            $statement->bindParam(3, $headline_en);
            $statement->bindParam(4, $message_en);
            $statement->bindParam(5, $category);
            $statement->bindParam(6, $story);
            $statement->bindParam(7, $coverData, PDO::PARAM_LOB);
            $statement->bindParam(8, $targetFileName);
            $statement->bindParam(7, $ImageData, PDO::PARAM_LOB);
            $statement->bindParam(8, $targetFileNameImage);
            
        
            if ($statement->execute()) {
                echo "New entry added successfully.";
            } else {
                echo "Error: ";
            }
            fclose($ImageData);
        }else{
    
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
        }
        fclose($coverData);
    }
    else{
      echo "cookie problem";
    }

    ob_end_flush();


    $statement = null;
    $pdo = null;

     header("Location: ../de/management.php");
  ?>
