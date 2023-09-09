<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    try {
        ob_start();
        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $headline_de = $_POST['headline_de'];
            $headline_en = $_POST['headline_en'];
            $category = $_POST['category'];
            $story = $_POST['story'];
            $cover = $_FILES['cover']['tmp_name'];
            $targetDirectory = '../images/';
            $targetFileName = basename($_FILES['cover']['name']);
            $targetPath = $targetDirectory . $targetFileName;
            if ($_SESSION['admin']){
                if (move_uploaded_file($cover, $targetPath)) {
                    echo "File uploaded and moved successfully.";
                } else {
                    echo "Error moving file.";
                }
                $coverData = fopen($targetPath, 'rb');

                insertChapter($headline_de, $headline_en, $category, $story, $coverData, $targetFileName)
                fclose($coverData);
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