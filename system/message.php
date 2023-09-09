<?php
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once 'database_methods.php';

    try {
        ob_start();
        if (isset($_POST['headline']) && isset($_POST['message']) && isset($_POST['name']) && isset($_POST['email']))){
            $headline = $_POST['headline'];
            $message = $_POST['message'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            $headline = filter_var($headline, FILTER_SANITIZE_STRING);
            $message = filter_var($message, FILTER_SANITIZE_STRING);
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $content = "Hi Julius,\n\n$message\n\nViele Grüße,\ndein $name\n\n$email";
            $headers = "From: $email" . "\r\n" . "Reply-To: $email";
            $mailSent = mail("julius.steck.js@gmail.com", $headline, $content, $headers);

            if ($mailSent){
                $_SESSION['message'] = "Erfolgreich";
                echo "erfolgreich";
            } else {
                $_SESSION['message'] = "Nicht Erfolgreich";
                echo "nicht erfolgreich";
            }
        }else{
            $_SESSION['message'] = "Invalid Content";
            echo "invalid Content";
        }
    } catch (Exception $e){
        $_SESSION['message'] = "Mail-Fehler: " . $e->getMessage();
        echo "Mail-Fehler";
    } finally{
        ob_end_flush();
    }

    require_once '../close_database_connection.php';
    header("Location: ../de/blog.php?id=$id");
?>