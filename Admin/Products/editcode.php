<?php
error_reporting(0);
?>
<?php

session_start();
include '../connection.php';
$msg = "";

// To update the bannerdata.

if (isset($_POST['update'])) {

    $banner_id = $_POST['banner_id'];
    $name = $_POST['bannername'];
    $newimage = $_FILES['bannerimage']['name'];
    $oldimage = $_POST['bannerimageold'];

    if ($newimage != '') {
        $update_filename = $_FILES['bannerimage']['name'];
    } else {
        $update_filename = $oldimage;
    }

    if (file_exists("image1/" . $_FILES['bannerimage']['name'])) {
        $filename = $_FILES['bannerimage']['name'];
        $_SESSION['status'] = "Image already exits" . $filename;
        header("Location: bannercopy.php");
    } else {
        $query = "UPDATE addbanner SET bannername='$name' , bannerimage='$update_filename' WHERE id ='$banner_id'";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {

            if ($_FILES['bannerimage']['name'] != '') {
                move_uploaded_file($_FILES['bannerimage']['tmp_name'], "image1/" . $_FILES['bannerimage']['name']);
                unlink("image1/" . $oldimage);
            }
            $_SESSION['status'] = "updated successfully";
            header("Location: bannercopy.php");

        } else {
            $_SESSION['status'] = " not updated successfully";
            header("Location:bannercopy.php");
        }
    }

}
