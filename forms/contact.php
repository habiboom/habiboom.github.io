<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contact@example.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: $name <$email>";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $mail_body = "<p><strong>Name:</strong> $name</p>";
    $mail_body .= "<p><strong>Email:</strong> $email</p>";
    $mail_body .= "<p><strong>Subject:</strong> $subject</p>";
    $mail_body .= "<p><strong>Message:</strong><br> $message</p>";

    if (mail($receiving_email_address, $subject, $mail_body, $headers)) {
        echo "OK";
    } else {
        echo "Failed to send email. Please try again.";
    }
} else {
    http_response_code(403);
    echo "Forbidden";
}
?>
