<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Verify your email address</title>
      <link rel="icon" type="/image/ico"  href="../images/logo 3-01.svg" >
      <style type="text/css" rel="stylesheet" media="all">

        /* Base ------------------------------ */
        *:not(br):not(tr):not(html) {
          font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
        }
        body {
          width: 100% !important;
          height: 100%;
          margin: 0;
          line-height: 1.4;
          background-color: #FFFFFF;
          color: #839197;
          -webkit-text-size-adjust: none;
        }
        a {
          color: #003864;
        }

        /* Layout ------------------------------ */
        .email-wrapper {
          width: 100%;
          margin: 0;
          padding: 0;
          background-color: #F5F7F9;
        }
        .email-content {
          width: 100%;
          margin: 0;
          padding: 0;
        }

        /* Masthead ----------------------- */
        .email-masthead {
          padding: 10px 0;
          text-align: center;
        }
        .email-masthead_logo {
          max-width: 400px;
          border: 0;
        }
        .email-masthead_name {
          font-size: 16px;
          font-weight: bold;
          color: #839197;
          text-decoration: none;
          text-shadow: 0 1px 0 white;
        }

        /* Body ------------------------------ */
        .email-body {
          width: 100%;
          margin: 0;
          padding: 0;
          background-color: #FDFDFD;
        }
        .email-body_inner {
          width: 570px;
          margin: 0 auto;
          padding: 0;
        }
        .email-footer {
          width: 570px;
          margin: 0 auto;
          padding: 0;
          text-align: center;
        }
        .email-footer p {
          color: #839197;
        }
        .body-action {
          width: 100%;
          margin: 30px auto;
          padding: 0;
          text-align: center;
        }
        .body-sub {
          margin-top: 25px;
          padding-top: 25px;
          border-top: 1px solid #E7EAEC;
        }
        .content-cell {
          padding: 35px;
        }
        .align-right {
          text-align: right;
        }

        /* Type ------------------------------ */
        h1 {
          margin-top: 0;
          color: #292E31;
          font-size: 19px;
          font-weight: bold;
          text-align: left;
        }
        h2 {
          margin-top: 0;
          color: #292E31;
          font-size: 16px;
          font-weight: bold;
          text-align: left;
        }
        h3 {
          margin-top: 0;
          color: #292E31;
          font-size: 14px;
          font-weight: bold;
          text-align: left;
        }
        p {
          margin-top: 0;
          color: #839197;
          font-size: 16px;
          line-height: 1.5em;
          text-align: left;
        }
        p.sub {
          font-size: 12px;
        }
        p.center {
          text-align: center;
        }

        /* Buttons ------------------------------ */
        .button {
          display: inline-block;
          width: 200px;
          background-color: #003864;
          border-radius: 3px;
          color: #ffffff;
          font-size: 15px;
          line-height: 45px;
          text-align: center;
          text-decoration: none;
          -webkit-text-size-adjust: none;
          mso-hide: all;
        }
        .button--green {
          background-color: #28DB67;
        }
        .button--red {
          background-color: #FF3665;
        }
        .button--blue {
          background-color: #003864;
        }

        /*Media Queries ------------------------------ */
        @media only screen and (max-width: 600px) {
          .email-body_inner,
          .email-footer {
            width: 100% !important;
          }
        }
        @media only screen and (max-width: 500px) {
          .button {
            width: 100% !important;
          }
        }
      </style>
    </head>
    <body>
      <table class="email-wrapper" style="width: 570px;margin: auto;" cellpadding="0" cellspacing="0">

        <tr>
          <td align="center">
            <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
              <!-- Logo -->
              <tr>
                <td class="email-masthead">
                  <a class="email-masthead_logo"><img src="./img/logo final.svg" width="200px"></a>
                </td>
              </tr>
              <!-- Email Body -->
              <tr>
                <td class="email-body" width="100%">
                  <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                    <!-- Body content -->
                    <tr>
                      <td class="content-cell">
                        <h1 style="text-align:center">Verify your email address</h1>
                        <p style="text-align:center">Thank you for signing up for Primo! We are excited to have you.<br>Here is your OTP</p>
                        <!-- Action -->
                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center">
                              <div>
                                <a href="javascript:void(0);" class="button button--blue" style="font-size: 1.2em;font-weight: bold;letter-spacing: 5px;"><?php echo $_GET['otp'] ?></a>
                              </div>
                            </td>
                          </tr>
                        </table>
                        <p style="text-align:center;">Thanks<br>The Primo Team</p>
                        <!-- Sub copy
                        <table class="body-sub">
                          <tr>
                            <td>
                              <p class="sub">If you’re having trouble clicking the button, copy and paste the URL below into your web browser.
                              </p>
                            </td>
                          </tr>
                        </table>-->
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
                              <div>
                                <a href="https://www.instagram.com/primoturf/?utm_medium=copy_link" target="_blank"  style="color:white;padding-right:10px;">
                                    <img src="http://app.indoguna.sg/services/ig.png" width="30px">
                                </a>
                                <a href="#" target="_blank"  style="color:white;padding-right:10px;">
                                    <img src="http://app.indoguna.sg/services/fb.png" width="30px">
                                <!-- </a>
                                <a href="https://www.linkedin.com/company/indogunasingapore/?originalSubdomain=sg" target="_blank"  style="color:white;">
                                    <img src="http://app.indoguna.sg/services/LinkedIn_logo.png" width="30px">
                                </a> -->
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
                      <td style="padding-top: 0;" class="content-cell">
                        <p class="sub center">
                          Primo
                          <br>Copyright © 2022 , All rights reserved.
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-top: 0;" class="content-cell">
                        <hr>
                        <p  class="sub center" style="text-align:center;padding-top: 0;">

                          This email was sent from an email address that can't receive emails. Please don't reply to this email.
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
