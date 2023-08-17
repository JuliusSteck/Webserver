<?php
require_once '../database_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $imageId = $_GET['id'];

    try {
        $query = "SELECT image FROM Blog WHERE EntryID = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $imageId, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row && isset($row['image'])) {
            $imageData = $row['image'];
            
            header("Content-Type: image/jpeg");
            header("Content-Length: " . strlen($imageData));
            
            echo $imageData;
        } else {
            echo "Image not found.";
        }
    } catch (PDOException $e) {
        echo "An error occurred: " . $e->getMessage();
    }
} else {
    echo "Invalid image ID.";
}
?>
