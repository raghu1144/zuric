<?php
include '../connection.php';
$customerid = $_GET['updatecustomerid'];
$sql = "Select * from signup where customerid = $customerid";
$result = $con->query($sql);
// $result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$mobile = $row['mobile'];
$password = $row['password'];
$status = $row['status'];
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
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="./../index.html" style="height: 65px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
                    <!-- if logo is image enable this
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="form-right-inf">
                        <!-- <h2>Sign-In </h2> -->

                        <div class="login-form-content">
                            <h3 style="text-align: left;"> Mobile Number</h3>
                            <form action="edit_admin_script.php" class="signin-form" method="post">
                             <input type="hidden" name="customerid" value=<?php echo $customerid; ?>>
                                <div class="one-frm">
                                    <input type="text" name="mobile" required="" autofocus value= <?php echo $mobile; ?>>
                                </div>
                                <div class="one-frm">
                                <h3 style="text-align: left;">Password</h3>
                                    <input type="password" name="password" required="" autofocus value="<?php echo $password; ?>">
                                </div>
                                <div class="one-frm">
                                <h3 style="text-align: left;">Status</h3>

                                 <input list="statuslist" class="multisteps-form__input form-control" type="text" name="status" value="<?php echo $status; ?>" />
                               <datalist name="statuslist" id="statuslist">
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>

                              </datalist>
                                </div>

                                <input class="btn btn-style m-3" type="submit" value="Update">
                                <!-- <button class="btn btn-style mt-3">Login </button> -->

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
                <p class="copy-footer-29"><b>© 2022 Primo. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>
</html>
