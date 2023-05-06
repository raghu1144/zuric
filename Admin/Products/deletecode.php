<?php
error_reporting(0);
?>
<?php
session_start();
include '../connection.php';
$msg = "";

if (isset($_POST['delete_banner'])) {

    $id = $_POST['delete_id'];
    $delbanner_img = $_POST['delbanner_img'];

    $query = "DELETE FROM addbanner WHERE id ='$id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        unlink("image1/" . $delbanner_img);
        $_SESSION['status'] = "deleted successfully";
        header("Location: bannercopy.php");

    } else {
        $_SESSION['status'] = " not deleted successfully";
        header("Location: bannercopy.php");
    }

}
