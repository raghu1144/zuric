<?php
include '../connection.php';
$customerid = $_POST['customerid'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$status = $_POST['status'];
$sql = "UPDATE signup SET mobile = '$mobile', password = '$password', status = '$status' where customerid = '$customerid' ";
$result = $con->query($sql);
if ($result) {
    // echo "Record updated successfully!";
    header("location: list.php");
} else {
    echo $con->error;
}
