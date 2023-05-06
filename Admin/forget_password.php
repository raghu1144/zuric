<?php
include 'connection.php';

if(isset($_POST['send_mail'])){
     
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = $_POST['email'];

    $emailquery = "SELECT * FROM user WHERE email = '$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    
    if($emailcount){
        
        $Admin_Name = mysqli_fetch_array($query);
        $Admin_Name = $Admin_Name['email'];
        require 'next_email_send.php';
        send_emails($email, "Password Reset!", "Hi $Admin_Name. Click here to reset your password
        http://localhost/Zuric/Admin/reset_password.php?e=$email");

        
        // $token = $userdata['token'];
        // $subject = "Password Reset"
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
            <div class="wrapper" >
                <div class="logo" style="    margin-top: -54px;
                                       margin-bottom: 71px;">
                    <h1><a class="brand-logo" href="./index.php" style="height: 49px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
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
                                
                                <input class="btn- btn-style mt-3" type="submit" value="Cancel" name="password" >
                                <input class="btn- btn-style mt-3" type="submit" value="Send mail" name="send_mail" style="margin-bottom: 30px;">
                                
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
                <p class="copy-footer-29"><b style="font-size: 15px;">© 2022 Zuric. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

</html>