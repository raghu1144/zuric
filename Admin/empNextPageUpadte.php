<?php
include './connection.php';
$locUserId = $_POST['submit'];
// echo $_POST['submit'];
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $title = $_POST['title'];
    $passport_number = $_POST['passport_number'];
    $passport_expairy = $_POST['passport_expairy'];
    $visa_number = $_POST['visa_number'];
    $visa_expairy = $_POST['visa_expairy'];
    $emirates_id = $_POST['emirates_id'];
    $emirates_expairy = $_POST['emirates_expairy'];
    $basic = $_POST['basic'];
    $hra = $_POST['hra'];
    $allowance = $_POST['allowance'];
    $other = $_POST['other'];
    $salary = $_POST['salary'];
    $insurance_expairy = $_POST['insurance_expairy'];
    $period = $_POST['period'];
}
$query = "UPDATE employee e
INNER JOIN passport_details pd
ON e.employee_id = pd.user_id
INNER JOIN address a
ON e.employee_id = a.user_id
SET first_name = '$first_name', last_name = '$last_name', title = '$title', passport_number = '$passport_number',
passport_expairy = '$passport_expairy', visa_number = '$visa_number', visa_expairy = '$visa_expairy',
emirates_number = '$emirates_id', emirates_expairy = '$emirates_expairy', insurance_expairy = '$insurance_expairy',
probation_period = '$period', basic = '$basic', hra = '$hra', allowance = '$allowance', other = '$other', salary = '$salary'
WHERE e.employee_id = '$locUserId'";
$res = mysqli_query($con, $query);
    if($res) {
    header('Location: next.php?id='.$locUserId);
    } else {
    echo "Data not Inserted";
    }
?>