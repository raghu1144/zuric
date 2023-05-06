<?php
include './connection.php';
$empId = $_POST['emp_id'];
// echo $empId;
if (isset($_POST['submit'])) {
    // echo "2";
    $designation = $_POST['designation'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $passport_number = $_POST['passport_number'];
    $passport_expairy = $_POST['passport_expairy'];
    $visa_number = $_POST['visa_number'];
    $visa_expairy = $_POST['visa_expairy'];
    $emirates_number = $_POST['emirates_id'];
    $emirates_expairy = $_POST['emirates_expairy'];
    $salary = $_POST['salary'];
    $insurance_expairy = $_POST['insurance_expairy'];
    $period = $_POST['period'];
    $address = $_POST['address'];

    $passport = $_FILES['passport']['name'];
    $passport_old = $_POST['passport_old'];
    $tmp_name = $_FILES['passport']['tmp_name'];
    $size = $_FILES['passport']['size'];
    $type = $_FILES['passport']['type'];
    $path = pathinfo($passport, PATHINFO_EXTENSION);
    $passport = pathinfo($passport, PATHINFO_FILENAME);
    if($passport != "") {
        $final_name = $passport . '.' . $path;
    } else {
        $final_name = $passport_old;
    }
    

    $visa = $_FILES['visa']['name'];
    $visa_old = $_POST['visa_old'];
    $tmp_name1 = $_FILES['visa']['tmp_name'];
    $size1 = $_FILES['visa']['size'];
    $type1 = $_FILES['visa']['type'];
    $path = pathinfo($visa, PATHINFO_EXTENSION);
    $visa = pathinfo($visa, PATHINFO_FILENAME);
    if($visa != "") {
        $final_name1 = $visa . '.' . $path;
    } else {
        $final_name1 = $visa_old;
    }
   

    $photo = $_FILES['image']['name'];
    $photo_old = $_POST['image_old'];
    $tmp_name2 = $_FILES['image']['tmp_name'];
    $size2 = $_FILES['image']['size'];
    $type2 = $_FILES['image']['type'];
    $path1 = pathinfo($photo, PATHINFO_EXTENSION);
    $photo = pathinfo($photo, PATHINFO_FILENAME);
    if($photo != "") {
        $final_name2 = $photo . '.' . $path1;
    } else {
        $final_name2 = $photo_old;
    }
  

    $insurance = $_FILES['insurance']['name'];
    $insurance_old = $_POST['insurance_old'];
    $tmp_name3 = $_FILES['insurance']['tmp_name'];
    $size3 = $_FILES['insurance']['size'];
    $type3 = $_FILES['insurance']['type'];
    $path = pathinfo($insurance, PATHINFO_EXTENSION);
    $insurance = pathinfo($insurance, PATHINFO_FILENAME);
    if($insurance != "") {
        $final_name3 = $insurance . '.' . $path;
    } else {
        $final_name3 = $insurance_old;
    }
  

    if ($passport || $visa || $photo || $insurance) {
        if ($size <= 20000000 || $size1 <= 20000000 || $size2 <= 20000000 || $size3 <= 20000000) {
            // if ( $path == "pdf" || $path == "docs" || $path == "doc" || $path == "word"
            //     || $path1 == "jpeg" || $path1 == "jpg" || $path1 == "png" || $path1 == "gif" ) {
                echo "0";
                $final_file = "./images/" . $final_name;
                $final_file1 = "./images/" . $final_name1;
                $final_file2 = "./images/" . $final_name2;
                $final_file3 = "./images/" . $final_name3;
                $upload = move_uploaded_file($tmp_name, $final_file);
                $upload1 = move_uploaded_file($tmp_name1, $final_file1);
                $upload2 = move_uploaded_file($tmp_name2, $final_file2);
                $upload3 = move_uploaded_file($tmp_name3, $final_file3);
                if ($upload || $upload1 || $upload2 || $upload3) {
                    $query = "UPDATE employee e
                    INNER JOIN passport_details pd
                    ON e.employee_id = pd.user_id
                    INNER JOIN address a
                    ON e.employee_id = a.user_id
                    SET profile_pic = '$final_name2', designation = '$designation', mobile = '$mobile', email = '$email',
                    passport_number = '$passport_number', passport = '$final_name', visa = '$final_name1', insurance = '$final_name3', 
                    passport_expairy = '$passport_expairy', visa_number = '$visa_number', visa_expairy = '$visa_expairy',
                    emirates_number = '$emirates_number', emirates_expairy = '$emirates_expairy', insurance_expairy = '$insurance_expairy',
                    probation_period = '$period', salary = '$salary', address = '$address'
                    WHERE e.employee_id = '$empId'";
                    $res = mysqli_query($con, $query);
                    echo "Updated Successfully";
                    header('Location: employedetail.php');
                }
            // } else {
            //     echo "only pdf, docs file uploaded";
            // }
        } else {
            echo "file size too large";
        }
    } else {
        $query = "UPDATE employee e
            INNER JOIN passport_details pd
            ON e.employee_id = pd.user_id
            INNER JOIN address a
            ON e.employee_id = a.user_id
            SET designation = '$designation', mobile = '$mobile', email = '$email', passport_number = '$passport_number', 
            passport_expairy = '$passport_expairy', visa_number = '$visa_number', visa_expairy = '$visa_expairy',
            emirates_number = '$emirates_number', emirates_expairy = '$emirates_expairy', insurance_expairy = '$insurance_expairy',
            probation_period = '$period', salary = '$salary', address = '$address'
            WHERE e.employee_id = '$empId'";
            $res = mysqli_query($con, $query);
            echo "Updated Successfully";
            header('Location: employedetail.php');
    }
}
// echo "1";
?>