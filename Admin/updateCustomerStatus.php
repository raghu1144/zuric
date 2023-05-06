<?php
include './connection.php';
$userId = $_POST['submit'];
$status = '';
if(isset($_POST['submit'])) {
    $status = $_POST['status'];
}
$query1 = "UPDATE user u
INNER JOIN user_xref ux 
ON u.user_id = ux.user_id AND ux.type_id = 1001
INNER JOIN register_details rd
ON ux.pk_value = rd.rgister_details_id
SET ux.status = '$stateus'                
WHERE ux.user_id = '$userId'";
$sql = mysqli_query($con, $query1);
if($sql) {
    header('Location: coustmers.php');
} else {
    echo "Status Not Updated";
}
?>