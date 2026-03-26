<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST["contactName"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["contactEmail"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["contactMessage"])));

    // Validation

    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please enter valid email address.";
        exit;
    }

    $to = "lgoodyear01@ub.ac.uk";
    $subject = "RoAM contact form message from $name";
    $body = "Name: $name\nEMail: $email\n\nMessage: $message";
    $headers = "From: noreply@theroamframework.com\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Message sent successfully.";
    } else {
        http_response_code(400);
        "Message failed to send. Please try again.";
    }
}
?>





