<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $status = htmlspecialchars($_POST['status']);
    $comments = htmlspecialchars($_POST['comments']);
    $member1 = htmlspecialchars($_POST['member1']);
    $signature1 = htmlspecialchars($_POST['signature1']);
    $date1 = htmlspecialchars($_POST['date1']);
    $member2 = htmlspecialchars($_POST['member2']);
    $signature2 = htmlspecialchars($_POST['signature2']);
    $date2 = htmlspecialchars($_POST['date2']);
    $table_of_contents = htmlspecialchars($_POST['table-of-contents']);

    // Recipient email address
    $to = "sarthrautela@gmail.com"; // Update with your email address
    $subject = "Feedback Form Submission";

    // Email content
    $message = "
    <html>
    <head>
        <title>Feedback Form Submission</title>
    </head>
    <body>
    
        <h2>Feedback Details</h2>
        <p><strong>Status of the Synopsis:</strong> $status</p>
        <p><strong>Any Comments:</strong> $comments</p>
        <h3>Committee Members</h3>
        <p><strong>1. Name:</strong> $member1<br>
        <strong>Signature:</strong> $signature1<br>
        <strong>Date:</strong> $date1</p>
        <p><strong>2. Name:</strong> $member2<br>
        <strong>Signature:</strong> $signature2<br>
        <strong>Date:</strong> $date2</p>
        <h3>Table of Contents</h3>
        <p>$table_of_contents</p>
    </body>
    </html>
    ";

    // Set content-type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n"; // Update with a valid sender address
    $headers .= 'Reply-To: <webmaster@example.com>' . "\r\n"; // Update with a valid reply-to address

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>
