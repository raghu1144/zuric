<?php
include '../connection.php';
include 'SendEmail.php';
$cid = $_POST['cid'];
$otp_u = $_POST['otp'];
$otp_d = null;
$to = null;
$sql = "Select otp, email from signup where customerid = '$cid' and otpstatus <> 'expired'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $otp_d = $row['otp'];
    $to = $row['email'];
}

if ($otp_u == $otp_d) {
    $sql = "UPDATE SIGNUP SET otpstatus = 'expired', email_verified_at=now() where customerid = '$cid'";
    $con->query($sql);
    session_start();
    $_SESSION['cid'] = $cid;
    require 'next_email.php';
    send_email($to, "OTP verified", $content);
    echo '<script>window.location.href = "../index.php"</script>';
    //  header("location: ../index.html");

    // echo "OTPs are matching";
} else {
    echo "<script>
    alert('Inavalid OTP');
    window.location.href ='otp_verify.php';
    </script>";
}
