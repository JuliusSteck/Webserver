<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    ob_start();

    if ($_SESSION['admin']) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $language = $_POST['language'];
        $text = $_POST['text'];
        $image = $_FILES['image']['tmp_name'];
        $targetDirectory = '../images/';
        $targetFileName = basename($_FILES['image']['name']);
        $targetPath = $targetDirectory . $targetFileName;

        if (move_uploaded_file($image, $targetPath)) {
            echo "File uploaded and moved successfully.";
        } else {
            echo "Error moving file.";
        }

        $imageData = fopen($targetPath, 'rb');

        $query = "INSERT INTO blog_content (blog_id, chapter_title, chapter_text, chapter_language, image, image_path) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $id);
        $statement->bindParam(2, $title);
        $statement->bindParam(3, $text);
        $statement->bindParam(4, $language);
        $statement->bindParam(5, $imageData, PDO::PARAM_LOB);
        $statement->bindParam(6, $targetFileName);
        
    
        if ($statement->execute()) {
            echo "New entry added successfully.";
        } else {
            echo "Error: ";
        }
        
        fclose($imageData);
    }
    else{
      echo "not admin";
    }

    ob_end_flush();
    $statement = null;
    $pdo = null;

    header("Location: ../de/blog.php?id=$id");
?>
