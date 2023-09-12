<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    $suggestions = array();

    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    $entries = searchEntries($query);
    for ($i = 0; $i < count($entries); $i++){
        $suggestions[] = $entries[$i][1];
        $suggestions[] = $entries[$i][4];
        $suggestions[] = $entries[$i][5];
    }
    
    $uniqueArray = array_unique($suggestions);
    $slicedArray = array_slice($uniqueArray, 0, 5);

    header('Content-Type: application/json');
    echo json_encode($slicedArray);

    require_once '../close_database_connection.php';
?>
