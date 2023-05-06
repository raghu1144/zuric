<?php
  include './connection.php';
  echo "0";
  if(isset($_POST['submit'])) {
    echo "1";
    $eid = $_POST['eid'];
    $leaveType = $_POST['leaveType'];
    $leaveStatus = $_POST['leaveStatus'];
    $mobile = $_POST['mobile'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $days = $_POST['days'];
    $bereavement = $_POST['bereavement'];
    $query = "INSERT INTO user_leave(user_id, leave_type, leave_status, mobile, from_date, to_date, number_of_days, bereavement)
              VALUES('$eid', '$leaveType', '$leaveStatus', '$mobile', '$fromDate', '$toDate', '$days', '$bereavement' )";
    $result = mysqli_query($con, $query);
    if($result) {
      header('Location: applyforleave.php');
      echo "Added Successfully";
    } else {
      echo "Not Added";
    }
  }
    // echo $eid = $_POST['eid'];
    // echo $leaveType = $_POST['leaveType'];
    // echo $leaveStatus = $_POST['leaveStatus'];
    // echo $mobile = $_POST['mobile'];
    // echo $fromDate = $_POST['fromDate'];
    // echo $toDate = $_POST['toDate'];
    // echo $days = $_POST['days'];
    // echo $bereavement = $_POST['bereavement'];
    echo "rettdgugjj";
  ?>