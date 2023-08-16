<?php
    require_once '../database_connection.php';

    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT image FROM Blog WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = $result['image'];

        header('Content-Type: image/jpeg'); 
        header('Content-Length: ' . strlen($imageData));

        echo $imageData;
        $statement = null;
      } catch (PDOException $e) {
      echo "An error occurred: " . $e->getMessage();
      }

    $conn = null;
?>

