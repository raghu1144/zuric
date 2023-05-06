<?php
include '../connection.php';

if(isset($_GET['deleteserial_no'])){
    $serial_no = $_GET['deleteserial_no'];

    $sql = "delete from product where serial_no = $serial_no";
    $result = mysqli_query($con, $sql);
    if($result){

        header("location: Product_List.php");
        // echo "deleted succesfully!";

    }else{
        die(mysqli_error($con));
    }
}
?>