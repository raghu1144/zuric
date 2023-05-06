<?php
include 'SendEmail.php';
include '../connection.php';
$cid = $_GET['cid'];
echo $cid;
$sql = "Select otp, email from signup where customerid = '$cid' ";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$otp = $row[0];
$email = $row[1];
send_mail($email, $otp);
echo '<script>window.location.href = "./otp_verify.php"</script>';
//  header("location: otp_verify.php");
