<?php
require ('./connection.php');
session_start();

if (isset($_POST['order_status_update']))
{
    $input_id = $_POST['input_id'];
    $input_select =$_POST['input_select'];
    $query = "UPDATE services SET status = '$input_select' WHERE services_id ='$input_id' ";
    $result = mysqli_query($con,$query);
    if($result) {
       echo "Updated Successfully";
        header('Location: orders.php');
    } else {
      echo "Not Updated";
    }
}
?>