<?php
include '../connection.php';
// $serial_no=$_GET['updateserial_no'];

// if(isset($_POST['submit'])){
  $serial_no = $_POST['serial_no'];
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];
  $status = $_POST['status'];
  $sql = "UPDATE product SET product_id='$product_id',product_name='$product_name',product_quantity=$product_quantity,product_price='$product_price', status='$status' where serial_no=$serial_no";
  $result = mysqli_query($con, $sql);
  if ($result) {
        header('location: Product_List.php');
      //  echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $con->error;
  }
  // }
  $conn->close();
  ?>
  
  


