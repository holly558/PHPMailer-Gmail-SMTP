<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $problem = false;

    $errStr = "";

    $name = trim($_POST['name'] ?? '');

    $email = trim($_POST['email'] ?? '');

    $subject = trim($_POST['subject'] ?? '');

    $body = trim($_POST['body'] ?? '');



    // Filter & Validation block

    if (empty($name)) {

        $problem = true;

        $errStr .= "<li>Your name is required.</li>";

    }

    if (empty($email)) {

        $problem = true;

        $errStr .= "<li>Your email is required.</li>";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $problem = true;

        $errStr .= "<li>Invalid email format.</li>";

    }

    if (empty($subject)) {

        $problem = true;

        $errStr .= "<li>Message subject is required.</li>";

    }

    if (empty($body)) {

        $problem = true;

        $errStr .= "<li>Your message is required.</li>";

    }

    if ($problem) {

        echo "<div id='error'><strong>These fields are required:</strong><ul>$errStr</ul></div>";

        exit; // stop script here

    }


    // No validation problems – send the email!

    $mail = new PHPMailer(true);


    try {

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = ' /*Your Gmail email*/ ';

        $mail->Password = ' /*Your Gmail App password*/';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;


        $mail->setFrom('your_gmail_username@gmail.com', 'Contact Form');

        $mail->addAddress('/*Your Gmail email*/ ', 'Admin'); /*Your Gmail email and name*/


        $mail->Subject = $subject;

        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$body";


        if ($mail->send()) {

            echo "<div class='success'>Message sent successfully!</div>";

        } else {

            echo "<div class='error'>Message could not be sent. Error: " . $mail->ErrorInfo . "</div>";

        }


    } catch (Exception $e) {

        echo "<div class='error'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }

}

?>