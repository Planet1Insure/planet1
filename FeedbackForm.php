<?php
// Get the form fields and remove whitespace
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$subject = trim($_POST["subject"]);
$message = trim($_POST["message"]);

// Check for errors
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "Please fill in all the required fields.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}

// Set the recipient email address
$to = "adewalealadeloye@gmail.com";

// Set the email subject
$subject = "Feedback from $name - $subject";

// Set the email message
$message = "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

// Set the email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "Thank you for your feedback!";
} else {
    echo "Sorry, there was a problem sending your feedback. Please try again later.";
}
?>
