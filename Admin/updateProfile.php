<?php
require ('./connection.php');
session_start();
$name = $_SESSION['AdminLoginId'];
if (isset($_POST['update_profile'])) {
  $admin_name = $_POST['name'];
  // echo "<br>";
  $admin_email = $_POST['email'];
  // echo "<br>";

  $admin_mobile = $_POST['mobile'];
  // echo "<br>";

  $password = $_POST['password'];
  // echo "<br>";
  $cnfPassword = $_POST['CnfPassword'];
  // echo "<br>";
  
  $image = $_FILES['image']['name'];
  // echo "<br>";
  
  $tmp_name = $_FILES['image']['tmp_name'];

  $size = $_FILES['image']['size'];
  $type = $_FILES['image']['type'];
  $path = pathinfo($image, PATHINFO_EXTENSION);
  $image = pathinfo($image, PATHINFO_FILENAME); 
  $final_name = $image . '.' . $path;
    if(!empty($image)) {
      if($size<=20000000){
        if($path =="jpeg" || $path == "jpg" || $path == "png" || $path == "gif") {
        $final_file = "assets/img/" . $final_name;
        $upload = move_uploaded_file($tmp_name, $final_file);
        $upload = file_get_contents($final_file);
        $upload = base64_encode($upload);    
        if($upload) {
          $query = "UPDATE `admin_login` SET `Admin_Name`='$admin_name',`Admin_Password`='$password',`Confirm_password`='$cnfPassword', `email`='$admin_email',`mobile`='$admin_mobile',`image`='$final_name' WHERE `Admin_Name`= '$name'"; 
          $result = mysqli_query($con, $query);             
          header('Location: profilefile.php');
        } 
        } else {
        echo "only jpeg, png file uploaded";
        }
      } else {
      echo "file size too large";
      }
    }
    else {
      $query = "UPDATE `admin_login` SET `Admin_Name`='$admin_name',`Admin_Password`='$password',`Confirm_password`='$cnfPassword',`mobile`='$admin_mobile',`email`='$admin_email' WHERE `Admin_Name`= '$name'"; 
          $result = mysqli_query($con, $query); 
      $result = mysqli_query($con, $query);
      header('Location: profilefile.php'); 
    }
  }
// echo "1"; 
?>


<!-- This is the previous code -->

<?php
// require ('./connection.php');
// session_start();
// $name = $_SESSION['AdminLoginId'];
// if (isset($_POST['update_profile'])) {
//   $admin_name = $_POST['name'];
//   // echo "<br>";
//   $admin_email = $_POST['email'];
//   // echo "<br>";
//   $password = $_POST['password'];
//   // echo "<br>";
//   $cnfPassword = $_POST['CnfPassword'];
//   // echo "<br>";
  
//   $image = $_FILES['image']['name'];
//   // echo "<br>";
  
//   $tmp_name = $_FILES['image']['tmp_name'];

//   $size = $_FILES['image']['size'];
//   $type = $_FILES['image']['type'];
//   $path = pathinfo($image, PATHINFO_EXTENSION);
//   $image = pathinfo($image, PATHINFO_FILENAME); 
//   $final_name = $image . '.' . $path;
//     if(!empty($image)) {
//       if($size<=20000000){
//         if($path =="jpeg" || $path == "jpg" || $path == "png" || $path == "gif") {
//         $final_file = "./images/" . $final_name;
//         $upload = move_uploaded_file($tmp_name, $final_file);
//         $upload = file_get_contents($final_file);
//         $upload = base64_encode($upload);    
//         if($upload) {
//           $query = "UPDATE user u
//           INNER JOIN user_xref ux
//           ON u.user_id = ux.user_id AND ux.type_id = 1002
//           INNER JOIN user_details ud
//           ON ud.user_details_id = ux.pk_value
//           SET `Admin_Password` = '$password', `Confirm_password` = '$cnfPassword', `image` = '$image.$path', `Admin_Name` = '$admin_name', `email` = '$admin_email'
//           WHERE `Admin_Name` = '$name'";
//           $result = mysqli_query($con, $query);    
//           header('Location: profilefile.php');
//         } 
//         } else {
//         echo "only jpeg, png file uploaded";
//         }
//       } else {
//       echo "file size too large";
//       }
//     }
//     else {
//       $query = "UPDATE user u
//       INNER JOIN user_xref ux
//       ON u.user_id = ux.user_id AND ux.type_id =1002
//       INNER JOIN user_details ud
//       ON ud.user_details_id = ux.pk_value
//       INNER JOIN address a
//       ON a.user_id = u.user_id
//       SET `Admin_Password` = '$password', `Confirm_password` = '$cnfPassword', `Admin_Name` = '$admin_name', `email` = '$admin_email'
//        WHERE `Admin_Name` = '$name'";
//       $result = mysqli_query($con, $query);
//       header('Location: profilefile.php'); 
//     }
//   }
// echo "1";
  
?>
