<?php
include '../connection.php';

if (isset($_POST['update_status'])) {
    $customerid = $_POST['customerid'];
    $status = $_POST['status'];
    
 
    $sql = "UPDATE `signup` SET `status`= '$status' WHERE customerid = '$customerid'";
    if (mysqli_query($con, $sql)) {
        // echo "Updated Successfully!";
       
     echo "<script>window.location.href='./NewCustomer.php'</script>";
        // header('Location: profile.php');
    } else {
        echo $con->error;
        // echo "error";
    }

}
