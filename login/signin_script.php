<?php
include '../connection.php';
// include 'SendEmail.php';
$email = $_POST['email'];
$password = $_POST['password'];

 $query = "Select customerid, email, password, email_verified_at from signup where email= '$email' AND password='$password'";

// $query = "Select * from signup where email = '$email' and password = '$password'";

$result = $con->query($query);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $cid = $row['customerid'];
    if($row['email_verified_at'] != null) {
    session_start();
    $_SESSION['cid'] = $cid;
      echo '<script>window.location.href = "../index.php"</script>';
    // echo  "Login Successfull";
    //  header("location: ../index.php ");
    // send_mail($email);
    } else {
      echo "<script>alert('Your email has not been verified')</script>";
      echo '<script>window.location.href = "otp_verify.php?cid=' . $cid . '"</script>';
    }
}
else{
    // echo "Invalid email and password";
    echo '<script>alert("Invalid email and password");</script>';
  echo "<script>window.location.href = 'signin.php'</script>";


}

?>




