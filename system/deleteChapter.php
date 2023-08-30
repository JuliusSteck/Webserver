<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    $chapterID = $_POST['chapter_id'];
    $id = $_POST['id'];

    $pdo = null;
    if ($_SESSION['admin']) {

        try {
            $query = "DELETE FROM blog_content WHERE id = ? AND blog_id = ?";
            $statement->bindParam(1, $chapterID);
            $statement->bindParam(2, $id);
            $statement = $pdo->query($query);

            if ($statement->execute()) {
                echo "New entry added successfully.";
            } else {
                echo "Error: ";
            }
        }catch (PDOException $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
    else{
      echo "cookie problem";
    }

    header("Location: ../de/blog.php?id=$id");
?>