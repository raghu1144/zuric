<?php
include './connection.php';
session_start();

if (isset($_POST['send_mail'])) {

    // $email = mysqli_real_escape_string($conn, $_POST['email']);

    $emailquery = "SELECT * FROM user";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount) {

        $Admin_Name = mysqli_fetch_array($query);
        $Name = $Admin_Name['email'];
        $email = $Admin_Name['email'];
        require 'next_email_send.php';

        send_emails($email, "Password Reset!", "Hi $Name. Click here to reset your password
        https://www.zuric.com/Admin/reset_password.php?e=$email");

        // $token = $userdata['token'];
        // $subject = "Password Reset"

        // echo "Reset link has been sent to the registered email address";
        $_SESSION['status'] = "Order Placed Successfully";
        $_SESSION['status_code'] = "success";

        echo "
        <script> 
         window.location.href = 'admin_login.php';
        </script>
        ";
       
    }
}
header('Location: admin_login.php');
