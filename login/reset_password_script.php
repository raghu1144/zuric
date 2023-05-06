<?php

include '../connection.php';

//  include 'forget_password.php';
//  $name = $_POST['name'];
//  $email = $_POST['email'];
//  $mobile = $_POST['mobile'];
//  $id = $_GET['updateid'];
$email = $_POST['e'];
$password = $_POST['password'];
$comfirm_password = $_POST['comfirm_password'];

if ($password == $comfirm_password) {
    $query = "update signup set password = '$password' where email = '$email'";

    $result = $con->query($query);
    if ($result) {
        echo '<script>window.location.href = "./signin.php"</script>';
        //  echo "Password updated successfully!";
        //    header("location: signin.php");
    } else {
        echo "Failed";
        // echo $con->error;
    }
} else {

    echo "password and confirm password does not match";
}
