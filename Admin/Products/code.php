<?php
error_reporting(0);
?>
<?php

session_start();
include '../connection.php';
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $bannername = $_POST['bannername'];
    $filename = $_FILES["bannerimage"]["name"];
    $tempname = $_FILES["bannerimage"]["tmp_name"];
    $folder = "image1/" . $filename;

    include '../connection.php';

    // Get all the submitted data from the form
    $sql = "INSERT INTO addbanner (`bannername`,bannerimage) VALUES ('$bannername','$filename')";

    // Execute query
    mysqli_query($con, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
        header("Location: bannercopy.php");
    } else {
        $msg = "Failed to upload image";
    }
}
