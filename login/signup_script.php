<?php
function generate_customerid()
{
    include '../connection.php';
    $sql = "SELECT customerid FROM signup ORDER BY customerid DESC LIMIT 1";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['customerid'] + 1;
    } else {
        return 1;
    }
    $con->close();
}

include '../connection.php';
include 'SendEmail.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$comfirm_password = $_POST['comfirm_password'];

$sql = "SELECT * FROM signup WHERE email='$email'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    echo "<script>
  alert('User already exists');
  window.location.href ='signup.php';
  </script>";
} else {
    $otp = rand(100000, 999999);
    $cid = generate_customerid();
    if ($password == $comfirm_password) {
        $query = "insert into signup(customerid, name, email, mobile, password, otp, email_verified_at, date, status)
 values('$cid','$name', '$email', '$mobile', '$password', '$otp', NULL, now(), 'active')";

        $result = $con->query($query);
        if ($result) {
            send_mail($email, $otp);
            // header("location: otp_verify.php?cid=$cid");
            echo '<script>window.location.href = "otp_verify.php?cid=' . $cid . '"</script>';

            // echo "data inserted successfully!";
            // header("location: signin.php");
        } else {
            echo "Failed";
            echo $con->error;
        }
    } else {

        echo "<script>
  alert('Password and confirm password do not match');
  window.location.href ='signup.php';
  </script>";
    }
}
