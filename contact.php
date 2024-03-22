<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Set the recipient email address
        $to = "rahul.balaji13289@gmail.com";

        // Set the email subject
        $subject = "New message from $name";

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers
        $headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            // Email sent successfully
            echo "<p>Thank you for contacting us, $name. We will get back to you shortly!</p>";
        } else {
            // Email sending failed
            echo "<p>Oops! Something went wrong and we couldn't send your message.</p>";
        }
    } else {
        // If any field is empty, show error message
        echo "<p>Please fill out all fields in the form.</p>";
    }
}
