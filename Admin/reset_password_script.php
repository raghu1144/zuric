<?php
  
 include 'connection.php';

//  include 'forget_password.php';
//  $name = $_POST['name'];
//  $email = $_POST['email'];
//  $mobile = $_POST['mobile'];
//  $id = $_GET['updateid'];
 $email = $_POST['e'];
 $Admin_Password = $_POST['Admin_Password'];
 $comfirm_password = $_POST['comfirm_password'];

 if ($Admin_Password == $comfirm_password){
 $query = "UPDATE user u
           INNER JOIN user_xref ux 
           ON u.user_id = ux.user_id 
           SET password_text = '$Admin_Password' where u.email = '$email'";
 
 $result = $con->query($query);
 if($result){
     echo '<script>window.location.href = "./admin_login.php"</script>';
    //  echo "admin_login.php";
    //    header("location: signin.php");
 }else{
     echo "Failed";
    // echo $conn->error;
 }
}
else{

    echo "password and confirm password does not match";
}

?>

