<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

function send_mail($customer_email, $otp)
{
    require 'Authenticate.php'; //Not required

    // $customer_email = $_POST["email"];
    $mail = new PHPMailer(); //Instantiating PHPMailer Class
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = $email; //your user name
    $mail->Password = $password; //your password
    $mail->addAddress($customer_email);
    $mail->setFrom($email, "Zuric");
    $mail->Subject = "Verify your email address";
    $content = '
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Verify your email address</title>

        </head>
        <body style=" width: 100% !important;
        height: 100%;
        margin: 0;
        line-height: 1.4;
        background-color: #FFFFFF;
        color: #839197;
        -webkit-text-size-adjust: none;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif">

          <table class="email-wrapper" style="width: 570px;margin: auto; " cellpadding="0" cellspacing="0">
          <tr> <td align="center" > <p style="margin-top: 10px;">OPEN THIS MAIL IN BROWSER. <a href="https://www.primoturfs.com/login/otp_details_email.php?otp=' . $otp . '"> Click here</a></p></td></tr>
            <tr>
              <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0">

                  <tr>
                    <td class="email-masthead">
                      <center>
                      <a class="email-masthead_logo"><img src="https://i.ibb.co/6WFvShS/Primo-Artificial-Turf-logo-01.png" width="250px"  style="max-width: 400px;
                        border: 0; margin-top: 10px;" ></a></center>
                    </td>
                  </tr>

                  <tr>
                    <td class="email-body" width="100%">
                      <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">

                        <tr>
                          <td class="content-cell">
                            <h1 style="text-align:center; color: black; padding-top: 20px;color: #292E31;
                            font-size: 19px;
                            font-weight: bold;
                            ">Verify your email address</h1>
                            <p style="text-align:center;line-height: 1.5rem;">Thank you for signing up for Primo! We are excited to have you.<br>Here is your OTP</p>
                            <!-- Action -->
                            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center">
                                  <div style=" display: inline-block;
                                  width: 200px;
                                  background-color: #003864;
                                  border-radius: 3px;
                                  color: #ffffff;
                                  font-size: 15px;
                                  line-height: 45px;
                                  text-align: center;
                                  text-decoration: none;
                                  -webkit-text-size-adjust: none;
                                  margin-top: 20px;
                                  margin-bottom: 20px;
                                  mso-hide: all;">
                                    <a href="javascript:void(0);" class="button button--blue" style="font-size: 1.2em;font-weight: bold;letter-spacing: 5px; color: #ffffff; text-decoration: none;  "> ' . $otp . ' </a>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <p style="text-align:center;line-height: 1.5rem;">Thanks<br>The Primo Team</p>

                          </td>
                        </tr>

                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center">
                                  <div style="margin-top: 20px;">
                                    <a href="https://www.instagram.com/primoturf/?utm_medium=copy_link" target="_blank"  style="color:white;padding-right:10px;">
                                        <img src="http://app.indoguna.sg/services/ig.png" width="30px">
                                    </a>
                                    <a href="#" target="_blank"  style="color:white;padding-right:10px;">
                                        <img src="http://app.indoguna.sg/services/fb.png" width="30px">
                                    </a>

                                  </div>
                                </td>
                              </tr>
                            </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="content-cell">
                            <p class="sub center" style="text-align: center; margin-top: 20px;line-height: 1.5rem;">
                              Primo
                              <br>Copyright © 2022 , All rights reserved.
                            </p>
                          </td>
                        </tr>
                        <tr>
                        <td class="content-cell">
                          <hr>
                          <p class="sub center" style="text-align:center;">

                            This email was sent from an email address that can\'t receive emails. Please don\'t reply to this email.
                          </p>
                        </td>
                      </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
        </html>
  ';

    $mail->msgHTML($content);

    if (!$mail->send()) {
        echo "The was an error while sending email.";
        // var_dump($mail);
    } else {
        //  echo "OTP sent successfuly!";
        // header("location: otp_verify.php");
    }
    echo ("\n");
}

// send_mail();

// -------------------------------------- GENERALIZED VERSION OF send_mail() -------------------

function send_email($to, $subject, $content)
{
    require 'Authenticate.php'; //Not required

    // $customer_email = $_POST["email"];
    $mail = new PHPMailer(); //Instantiating PHPMailer Class
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = $email; //your user name
    $mail->Password = $password; //your password
    $mail->addAddress($to);
    $mail->setFrom($email, "Zuric");
    $mail->Subject = $subject;
    $mail->msgHTML($content);

    if (!$mail->send()) {
        echo "The was an error while sending email.";
        var_dump($mail);
    } else {
        // echo "OTP sent successfuly!";
    }
    echo ("\n");
}

// send_email("shakeelahmad0291@gmail.com", "Test", "Test Email");
// send_mail("shakeelahmad0291@gmail.com", "123456");
