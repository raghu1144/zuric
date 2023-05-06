<?php
include "connection.php";
if(isset($_POST['submit'])) { 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $title = $_POST['title'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $designation = $_POST['designation'];
  $joiningDate = $_POST['joiningDate'];
  $mobile = $_POST['mobile'];
  $emergencyMobile = $_POST['emergencyMobile'];
  $email = $_POST['email'];
  @$maritalStatus = $_POST['maritalStatus'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $currentAddress = $_POST['currentAddress'];
  $parmanentAddress = $_POST['parmanentAddress'];

  $passport = $_FILES['passport']['name'];
  $tmp_name = $_FILES['passport']['tmp_name'];
  $size = $_FILES['passport']['size'];
  $type = $_FILES['passport']['type'];
  $path = pathinfo($passport, PATHINFO_EXTENSION);
  $passport = pathinfo($passport, PATHINFO_FILENAME);
  $final_name = $passport . '_' . date('mjYHis') . '.' . $path;

  $visa = $_FILES['visa']['name'];
  $tmp_name1 = $_FILES['visa']['tmp_name'];
  $size1 = $_FILES['visa']['size'];
  $type1 = $_FILES['visa']['type'];
  $path = pathinfo($visa, PATHINFO_EXTENSION);
  $visa = pathinfo($visa, PATHINFO_FILENAME);
  $final_name1 = $visa . '_' . date('mjYHis') . '.' . $path;
  
  $photo = $_FILES['photo']['name'];
  $tmp_name2 = $_FILES['photo']['tmp_name'];
  $size2 = $_FILES['photo']['size'];
  $type2 = $_FILES['photo']['type'];
  $path1 = pathinfo($photo, PATHINFO_EXTENSION);
  $photo = pathinfo($photo, PATHINFO_FILENAME);
  $final_name2 = $photo . '.' . $path1;

  $insurance = $_FILES['insurance']['name'];
  $tmp_name3 = $_FILES['insurance']['tmp_name'];
  $size3 = $_FILES['insurance']['size'];
  $type3 = $_FILES['insurance']['type'];
  $path = pathinfo($insurance, PATHINFO_EXTENSION);
  $insurance = pathinfo($insurance, PATHINFO_FILENAME);
  $final_name3 = $insurance . '_' . date('mjYHis') . '.' . $path;

    if(!empty($passport) || !empty($visa) || !empty($photo) || !empty($insurence)) {
      if($size<=20000000 || $size1<=20000000 || $size2<=20000000 || $size3<=20000000){
        if($path =="pdf" || $path == "docs" || $path == "doc" || $path == "word"
        || $path1 == "jpeg" || $path1 == "jpg" || $path1=="png" || $path1 == "gif") {
        $final_file = "./images/" . $final_name;
        $final_file1 = "./images/" . $final_name1;
        $final_file2 = "./images/" . $final_name2;
        $final_file3 = "./images/" . $final_name3;
        $upload = move_uploaded_file($tmp_name, $final_file);
        $upload1 = move_uploaded_file($tmp_name1, $final_file1);
        $upload2 = move_uploaded_file($tmp_name2, $final_file2);
        $upload3 = move_uploaded_file($tmp_name3, $final_file3);
        $query = "INSERT INTO employee( first_name, last_name, title, dob, gender, profile_pic, designation, joining_date, mobile, emergency_mobile, email, marital_status)
          VALUES( '$fname', '$lname', '$title', '$dob', '$gender', '$photo.$path1', '$designation', '$joiningDate', '$mobile', '$emergencyMobile', '$email', '$maritalStatus')";
          $result = mysqli_query($con, $query);
          $locUserId = mysqli_insert_id($con);
      
        if($upload || $upload1 || $upload2 || $upload3) {
          $query1 = "INSERT INTO passport_details(user_id, passport, visa, insurance)
          VALUES('$locUserId', '$passport.$path', '$visa.$path', '$insurance.$path');";
          $query1 .= "INSERT INTO address(user_id, address, parmanent_address, city, state, country)
          VALUES('$locUserId', '$currentAddress', '$parmanentAddress', '$city', '$state', '$country')";

          $result = mysqli_multi_query($con, $query1);    
          $msg = "file uploades successfully";
          echo "<br/>`$msg' <br/><span>Data Inserted successfully...!!</span>";
          header('Location: ./next.php?id='.$locUserId);
      }
        } else {
        echo "only pdf, docs file uploaded";
        }
      } else {
      echo "file size too large";
      }
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
}
?>