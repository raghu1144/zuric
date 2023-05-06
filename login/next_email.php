<?php
include '../connection.php';
$cid = $_SESSION['cid'];
$email = null;
$password = null;
$sql = "SELECT id, email, password FROM signup WHERE customerid='$cid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $password = $row['password'];
    $id = $row['id'];
}
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
  <tr> <td align="center" > <p style="margin-top: 10px;">OPEN THIS MAIL IN BROWSER. <a href="https://www.primoturfs.com/login/login_details_email.php?id=' . $id . ' "> Click here</a></p></td></tr>
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
                    ">Please note the login details.</h1>
                    <p style="text-align:center;line-height: 1.5rem;">Thank you for signing up for Primo! We are excited to have you.</p>
                    <!-- Action -->
                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                    <td align="center">
                      <div>
                        <p style="text-align:center">Your username : <span><b>' . $email . '</b> </span></p>
                        <p style="text-align:center">Password : <b>' . $password . '</b></p>
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
