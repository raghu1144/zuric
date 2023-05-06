
<?php
session_start();
?> 
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html >

<head>
    <title>Zuric</title>
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
            <div class="wrapper">
                <div class="logo" style="    margin-top: -40px;
                                       margin-bottom: 10px;">
                    <h1><a class="brand-logo" href="./../index.php" style="height: 49px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="form-right-inf">
                        <h2>Sign-In </h2>
                       
                        <div class="login-form-content">
                            <h3 style="text-align: left;">Email</h3>
                            <form action="signin_script.php" class="signin-form" method="post">
                                <div class="one-frm">
                                    <input type="email" name="email" placeholder="" required="" autofocus>
                                </div>
                                <div class="one-frm">
                                <h3 style="text-align: left;">Password</h3>
                                    <input type="password" name="password" placeholder="" required="">
                                </div>
                                <div class="one-frm" style="margin-top: 22px;">

                                <label class="check-remaind">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    <p class="remember">Remember Me</p>

                                </label>
                                </div>
                                <input class="btn btn-style m-3" type="submit" value="Login"> 
                                <!-- <button class="btn btn-style mt-3">Login </button> -->
                                <p class="already">Don't have an account? <a href="./signup.php">Sign up</a></p>
                                <p class="already " style="margin-top: 0px!important;"><a href="./forget_password.php">Forget your password?</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper">
                <p  class="copy-footer-29"><b style="font-size: 15px;">© 2022 Zuric. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>
</html>