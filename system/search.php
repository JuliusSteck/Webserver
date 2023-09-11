<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    $suggestions = array();

    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    $entries = searchEntries($query);
    //order entries
    
    if (!empty($query)){
        for ($i = 0; $i <= 4; $i++){
            $suggestions[] = $entries[$i];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($suggestions);

    require_once '../close_database_connection.php';
?>
