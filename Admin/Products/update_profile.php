<?php
include '../connection.php';

if (isset($_POST['update_profile'])) {
    $admin_name = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $country = $_POST['country'];
 
    $sql = "UPDATE user
            INNER JOIN user_xref ux
            ON u.user_id = ux.user_id
            INNER JOIN register_details rd
            ON rd.register_details_id = ux.pk_value 
            SET email ='$email',`mobile`='$mobile',`postcode`='$postcode',`state`='$state',`email`='$email',`country`='$country' WHERE Admin_Name ='$admin_name'";
    if (mysqli_query($con, $sql)) {
       
        echo "<script>window.location.href='./profile.php'</script>";
        // header('Location: profile.php');
    } else {
        echo "error";
    }

}

// <?php 
// Include the database configuration file  
include '../connection.php';
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
// if(isset($_POST["update_profile"])){ 
    
    $status = 'error';
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        echo "If block";
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // $Insert image content into database 
            // $result = $con->query("INSERT into admin_login (image VALUES ('$imgContent', NOW())"); 
            $sql = "UPDATE `admin_login` set `image` = '$imgContent' WHERE Admin_Name ='$admin_name'";
            $update = mysqli_query($con, $sql);

            if($update){ 
                $status = 'success'; 
                // $statusMsg = "File uploaded successfully."; 
                header('location: profile.php');
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    // }else{ 
    //     $statusMsg = 'Please select an image file to upload.'; 
    // } 
// } 

 
// Display status message 
echo $_FILES["image"]["name"];
echo $statusMsg;
?>

