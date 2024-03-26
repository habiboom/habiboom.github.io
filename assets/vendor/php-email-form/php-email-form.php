<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "tetantetan18@gmail.com"; // Ganti dengan alamat email Anda
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = "Form Submission";
    $message = "Name: $name\n\nEmail: $from\n\nMessage:\n" . $_POST['message'];

    $headers = "From: $from";

    if (mail($to, $subject, $message, $headers)) {
        echo "OK";
    } else {
        echo "Failed to send email. Please try again.";
    }
} else {
    http_response_code(403);
    echo "Forbidden";
}

?>
