<?php
include "./connection.php";
session_start();
?>

<html>

<head>
    <title>ZURIC</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="./images/title.png">

    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="./AdminLoginCss/Login.css">
    <!-- <link rel="stylesheet" href="../login/css//style.css" type="text/css" /> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--//Style-CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    
    

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');

        .loginforminput{
            position: relative;
        }
        .loginforminput i{
    position: absolute;
    top: 65px;
    right: 21px;
}
body{
    overflow-y: hidden;
}
.btn button{
    margin-top: 40px;
}
  </style>

</head>

<body>

    
    <div class="container">
        <div class="row">
            <div class="left">
                <div class="image">
                    <img src="./images//Original_Logoz.png" alt="">
                </div>
            </div>
            <div class="right">
                <div class="Login">
                    <div class="heading">
                        <h2>Sign-In</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="loginforminput">
                            <label>Username</label>
                            <input type="text" placeholder="Username" name="AdminName" autofocus>
                        </div>
                        <div class="loginforminput">
                            <!-- <label>Password</label> -->
                            <label for="password">Password</label>
                            <input type="password" placeholder="Password" name="AdminPass" id="password" />
                            <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                            <!-- <input type="password" placeholder="Password" name="AdminPass" id="id_password" autofocus>
                            <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> -->
                        </div>
                        <div class="btn">
                            <?php ?> 
                            <button type="submit" name="Login">Submit</button>
                        </div>

                    </form>
                    <!-- <form action="forget_pass_pop.php" class="signin-form" method="POST">
                        <div class="forget">
                            <button value="Forget your password?" name="send_mail">Forget Your Password?</button>
                        </div>
                    </form> -->

                </div>
            </div>

        </div>
        <div class="flex">
            <p style="color: #fff;">© 2023 Zuric. Privacy policy</p>
            <p style="color: #fff;">Powered By:<a target="_blank" style="color: #fff;" href="https://www.xaltam.com/">Xaltam
                </a></p>
        </div>
    </div>

    <?php
        function input_filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        if (isset($_POST['Login'])) {
            $AdminName = $_POST['AdminName'];
            $AdminPass = $_POST['AdminPass'];

            // $AdminName = mysqli_real_escape_string($con, $AdminName, );
            // $AdminPass = mysqli_real_escape_string($con, $AdminPass, );
            
            // $query = "SELECT * FROM user u
            //          INNER JOIN user_xref ux
            //          ON u.user_id = ux.user_id AND ux.type_id = 1002
            //          WHERE u.email ='$AdminName' AND ux.password_text = '$AdminPass'";


            $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`= '$AdminName' AND `Admin_Password` = '$AdminPass' ";

            //prepared statement
            if ($stmt = mysqli_prepare($con, $query)) {
                // mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPass); // binding value to template
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    session_start();
                    $_SESSION['AdminLoginId'] = $AdminName;
                    
                    echo "
                    <script> 
                    window.location.href = 'index.php';
                    </script>
                    ";
                    // header("Location: index.php");

                } else {
                    echo "<script> alert('Invalid Username and Password')</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "sql prepared query error";
            }
        }
    ?>
    <script src="../sweetalert.min.js"></script>

    <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            ?>

            <script>
                swal({
                    title: "Reset Link ",
                    text: "Reset link has been sent to your registered email id.",
                    icon: "success",
                    button: "ok",

                });
            </script>
            <?php

            unset($_SESSION['status']);
        }

    ?>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            console.log(type);
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>

</body>

</html>