<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    try {
        ob_start();
        if (isset($_POST['id']) && is_numeric($_POST['id'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $language = $_POST['language'];
            $text = $_POST['text'];
            $image = $_FILES['image']['tmp_name'];
            $targetDirectory = '../images/';
            $targetFileName = basename($_FILES['image']['name']);
            $targetPath = $targetDirectory . $targetFileName;
            if ($_SESSION['admin']){
                if (move_uploaded_file($image, $targetPath)) {
                    echo "File uploaded and moved successfully.";
                } else {
                    echo "Error moving file.";
                }
                $imageData = fopen($targetPath, 'rb');

                insertChapter($id, $title, $text, $language, $imageData, $targetFileName)
                fclose($imageData);
                $_SESSION['message'] = "Erfolgreich";
                echo "erfolgreich";
            } else {
                $_SESSION['message'] = "Nicht berechtigt";
                echo "nicht berechtigt";
            }
        }else{
            $_SESSION['message'] = "Invalid ID provided.";
            echo "invalid ID";
        }
    } catch (PDOException $e){
        $_SESSION['message'] = "Datenbank-Fehler: " . $e->getMessage();
        echo "Datenbank-Fehler";
    } finally{
        ob_end_flush();
    }

    require_once '../close_database_connection.php';
    header("Location: ../de/blog.php?id=$id");
?>