<?php
// mail/mail.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    $news = isset($_POST['news']) ? 'Yes' : 'No';

    // Email details
    $to = 'deemeek75@gmail.com';  // Replace with your email address
    $subject = 'New Contact Form Submission: ' . $subject;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $emailBody = "<html><body>";
    $emailBody .= "<h2>Contact Form Submission</h2>";
    $emailBody .= "<p><strong>Name:</strong> $name</p>";
    $emailBody .= "<p><strong>Email:</strong> $email</p>";
    $emailBody .= "<p><strong>Phone:</strong> $phone</p>";
    $emailBody .= "<p><strong>Subject:</strong> $subject</p>";
    $emailBody .= "<p><strong>Message:</strong></p>";
    $emailBody .= "<p>$message</p>";
    $emailBody .= "<p><strong>Newsletter Subscription:</strong> $news</p>";
    $emailBody .= "</body></html>";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Thank you for contacting us. Your message has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
