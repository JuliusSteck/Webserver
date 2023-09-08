<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    try {
        ob_start();
        if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['chapter_id']) && is_numeric($_GET['chapter_id'])){
            $chapterID = $_GET['chapter_id'];
            $id = $_GET['id'];
            if ($_SESSION['admin']){
                deleteChapterById($id, $chapterID);
                $_SESSION['message'] = "Löschen erfolgreich";
                echo "Erfolg";
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
        echo "Datenbank Fehler";
    } finally{
        ob_end_flush();
    }

    require_once '../close_database_connection.php';
    header("Location: ../de/blog.php?id=$id");
?>
