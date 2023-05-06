<?php
// session_start();
// if(!isset($_SESSION['cid']))
//   echo "<script>window.location.href='signin.php'</script>";
?>
<!---
-Author: W3layouts
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--//Style-CSS -->
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
             margin: 0;
             }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
                </style>

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
         

    

    <!-- form section start -->
    <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo" style="    margin-top: -40px;
                                    margin-bottom: 87px;">
                    <h1><a class="brand-logo" href="./../index.php" style="height: 49px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="form-right-inf">
                        <h3 style="text-align: center;margin-top: 28px;">OTP sent to your email id.</h3>
                       
                        <div class="login-form-content">
                           
                            <form action="otp_verify_script.php" name="submit_otp" id="submit_otp" class="signin-form" method="post">
                                <div class="one-frm">
                                    <input type="hidden" name="cid" value="<?php echo $_GET['cid'] ?>">
                                    <input type="number" name="otp" placeholder="OTP" required="" autofocus>
                                </div>
                            
                                <button type="submit" class="btn btn-style mt-3" name="verify_email">Verify</button>
                                <p class="already"> <a href="resend_otp_script.php?cid=<?php echo $_GET['cid'] ?>">Resend OTP</a></p><br>
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
                <p class="copy-footer-29"><b style="font-size: 15px;">© 2022 Primo. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

<script>
    function toggleStatus(id){
            var id = id ;
            $.ajax({
                    url:"toggle.php",
                    type:"post",
                    data:{catId:id},
                    success :function(result){
                            if(result == '1')
                            {
                              swal("Done!" ,"Banner is Live" , "success");

                            }
                            else
                            {
                                    swal("Done!","Banner is not Live","success");
                            }
                    }
            })
    }
</script>
</html>