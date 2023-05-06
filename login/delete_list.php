<?php
include '../connection.php';
if (isset($_GET['deletecustomerid'])) {
    $customerid = $_GET['deletecustomerid'];

    $sql = "Delete from signup where customerid = '$customerid'";
    $result = $con->query($sql);
    if ($result) {
        echo "Deleted Successfully!";
    } else {
        echo $con->error;
    }
}
