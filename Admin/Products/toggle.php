<?php
 $db = mysqli_connect("localhost", "root", "", "primodb");

 $catId =$_POST['catId'];
 $sql = "SELECT * FROM addbanner where id = $catId";

 $result = mysqli_query($db ,$sql);
 $data = mysqli_fetch_assoc($result);
 $status= $data['status'];

 if($status == '1')
 {
     $status = '0';
     
 }
 else{
     $status = '1';
 }

 $update = "update addbanner set status = '$status' where id = '$catId'";
 $result1 = mysqli_query($db ,$update);
 if($result){
     echo $status;
 }

?>