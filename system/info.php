<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    $response = array();

    if (isset($_POST['newMessage'])) {
        $_SESSION['message'] = NULL;
        
        $response['success'] = true;
        $response['message'] = "Message updated successfully";
    } else {
        http_response_code(400); // Bad Request
        
        $response['success'] = false;
        $response['message'] = "New message data is missing.";
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    require_once '../close_database_connection.php';
?>