<?php
    require_once '../database_connection.php';

    require_once '../session.php';

    $id = $_GET['id'];

    $pdo = null;
    if ($_SESSION['admin']) {

        try {
            $query = "DELETE FROM Blog WHERE id = ?";
            $statement->bindParam(1, $id);
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

    header("Location: ../de/welcome.php");
?>