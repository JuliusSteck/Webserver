<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $headline = $_POST['headline'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $headline = filter_var($headline, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($headline && $message && $name && $email) {
        $content = "Hi Julius,\n\n$message\n\nViele Grüße,\ndein $name\n\n$email";
        $headers = "From: $email" . "\r\n" . "Reply-To: $email";

        $mailSent = mail("julius.steck.js@gmail.com", $headline, $content, $headers);

        if ($mailSent) {
            header("Location: ../de/success.php");
            exit;
        } else {
            header("Location: ../de/failure.php");
            exit;
        }
    } else {
        header("Location: ../de/failure.php");
        exit;
    }
} else {
    header("Location: ../de/failure.php");
    exit;
}
?>
