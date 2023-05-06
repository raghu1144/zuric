<?php
include './connection.php';
$leaveId = $_POST['submit'];
echo $leaveId;
if(isset($_POST['submit'])) {
    $action = $_POST['action'];
}
$query1 = "UPDATE user_leave
SET action = '$action'                
WHERE user_leave_id = '$leaveId'";
$sql = mysqli_query($con, $query1);
if($sql) {
    header('Location: leaveap.php');
    echo "Successfully Updated";
} else {
    echo "Status Not Updated";
}
?>