<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

function send_emails($to, $subject, $content)
{
      require 'Authenticate.php';     //Not required
    
    // $customer_email = $_POST["email"];
    $mail = new PHPMailer();    //Instantiating PHPMailer Class
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = $email;                //your user name
    $mail->Password = $password;                //your password
    $mail->addAddress($to);
    $mail->setFrom("$email", "Primo");
    $mail->Subject = $subject;
    // $mail->addEmbeddedImage("./icon.png", "icon");
    // $mail->addEmbeddedImage("./icon1.png", "icon1");
    // $mail->addEmbeddedImage("./img1.png", "img1");
    $mail->msgHTML($content);

    if (!$mail->send()) {
        echo "The was an error while sending email.";
        var_dump($mail);
    } else {
        // echo "OTP sent successfuly!";
    }
    echo ("\n");
}

