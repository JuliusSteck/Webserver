<?php
    $headline = $_POST['headline'];
    $message = $_POST['message'];
    $name = $_POST['headline'];
    $email = $_POST['message'];

    $content = "Hi Julius, \n$message \nViele Grüße \ndein $name /n /n$email";
    $headers = "From: $email";

    $mailSent = mail("julius.steck.js@gmail.com", $headline, $content, $headers);

    if ($mailSent) {
        header("Location: ../de/success.php");
    } else {
        header("Location: ../de/failiure.php");
    }
  ?>
