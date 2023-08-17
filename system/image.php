<?php
require_once '../database_connection.php'; // Make sure to include your database connection configuration

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $imageId = $_GET['id'];

    try {
        $query = "SELECT image FROM images WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $imageId, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row && isset($row['image'])) {
            $imageData = $row['image'];
            
            // Set appropriate headers for image output
            header("Content-Type: image/jpeg"); // Adjust content type based on your image format
            header("Content-Length: " . strlen($imageData));
            
            // Output the image data to the browser
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
