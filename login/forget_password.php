<?php
include '../connection.php';

if (isset($_POST['send_mail'])) {

    // $email = mysqli_real_escape_string($con, $_POST['email']);
    $email = $_POST['email'];

    $emailquery = "Select * from signup where email = '$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if ($emailcount) {

        $userdata = mysqli_fetch_array($query);
        $userdata = $userdata['name'];
        require 'next_email_send.php';
        $content2 = '<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Forget Password</title>

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
                            ">Click below to reset your password</h1>
                            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                            <td align="center">
                              <div>
                                <p style="text-align:center"> <span><b><a href="https://www.primoturfs.com/login/reset_password.php?e=' . $email . '"" target="_blank">RESET PASSWORD</a></b> </span></p>

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
        </html>';

        send_emails($email, "Password Reset!", $content2);

    }
}

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html >

<head>
    <title>primo</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="./../images/logo 3-01.svg">
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- form section start -->
    <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper" >
                <div class="logo" style="    margin-top: -54px;
                                       margin-bottom: 71px;">
                    <h1><a class="brand-logo" href="./../index.php" style="height: 49px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
                    <!-- if logo is image enable this
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="form-right-inf">
                        <h2 style="margin-right: 50px;">Forgot Password </h2>

                        <div class="login-form-content">
                            <h3 style="text-align: left;margin-bottom: 3px;">Enter your email</h3>
                            <form action="" class="signin-form" method="post">
                                <div class="one-frm">
                                    <input type="email" name="email" placeholder="Email" required="" autofocus>
                                </div>

                                <input class="btn- btn-style mt-3" type="submit" value="Cancel" name="passwors" >
                                <input class="btn- btn-style mt-3" type="submit" value="Send Email" name="send_mail" style="margin-bottom: 30px;">

                                <!-- <input class="btn btn-style m-3" type="submit" value="Login">  -->
                                <!-- <button class="btn btn-style mt-3">Login </button> -->
                                <!-- <p class="already">Don't have an account? <a href="./signup.html">Sign up</a></p>
                                <p class="already " style="margin-top: 0px!important;"><a href="./signup.html">Forget my Password?</a></p> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper" style="margin-top: -75px;">
                <p class="copy-footer-29"><b style="font-size: 15px;">© 2022 Primo. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

</html>
