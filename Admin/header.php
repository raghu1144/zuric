<?php
    include './connection.php';
    session_start();
    session_regenerate_id(true);
    if (!isset($_SESSION['AdminLoginId'])) {
        header("location: admin_login.php");
    }
    $name = $_SESSION['AdminLoginId'];
    $sql = "SELECT * FROM user u
            INNER JOIN user_xref ux
            ON u.user_id = ux.user_id
            INNER JOIN user_details ud
            ON ud.user_details_id = ux.pk_value WHERE email ='$name'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/title.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>ZURIC</title>
    <!--     Fonts and icons     -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="./assets/css/new.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <script src="./validationScript/bell.js"></script>
    <script>
        $(document).ready(function() {
            $(".notifi-remove").click(function() {
                $(this).hide();
            });
        });

        
        $(document).mouseup(function (e) {
            if ($(e.target).closest(".notifi-box").length
                        === 0) {
                $(".notifi-box").hide();
            }
        });
        

        $(document).mouseup(function (e) {
            if ($(e.target).closest("#box1").length
                        === 0) {
                $("#box1").hide();
            }
        });
    </script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="./css/notification.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    .table thead th {
        padding: 0.75rem 0.2rem;
    }

    body {
        font-family: 'Abel', sans-serif !important;

    }
    .dropdownew{
        border-top: 2px solid lightgoldenrodyellow;
        position: absolute;
        top: 4rem;
        width: 200px;
        height: 155px;
        display: none;
        /* border: 1px solid; */
        background-color: #f9f9f9;
        z-index: 999;
       
    }
    .topbox{
        height: 100px;
        /* border: 1px solid; */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #cd8e33;
    }
    .Buttons{
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 11px;
        color: #666666;
    }

    
    .picture{
        border: 1px solid black;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    .Buttons a{
        box-shadow: none !important;
    }

    .imggg {
        background: white;
        border-radius: 50%;
        width: 50px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* Code for Drop down */
    .dropbtn {
        /* background-color: #4CAF50; */
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: space-around;
        background-color: #cd8e33;
        width: 200px;
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
        align-items: center;
        font-size: 20px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        /* background-color: #f9f9f9; */
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover{
        color:black;
        
    }

    .icon {
        color: #000;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 background1 ps ps--active-y"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>

            <a class="navbar-brand m-0 justify-content-evenly d-flex ps-3 " href="./index.php">
                <!-- <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
                <div class="imggg"> 
                    <img src="./assets//img//title.png" class="navbar-brand-img" alt="logo">
                </div>
                <p style="color: #fff; text-align: center; font-size: 20px; font-weight: 600; letter-spacing: 2px "
                    class="mt-1"> Admin Panel</p>

            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <!-- <li class="nav-item mb-2 mt-0 ps-4">
                    <?php
                    if($row['profile_pic']) {
                        $final_file = $row['profile_pic'];
                        $imgData = base64_encode(file_get_contents("./images/".$final_file));
                        $src = 'data: '.mime_content_type('./images').';base64,'.$imgData;
                    ?>
                    <?php echo '<img class="avatar" style="width: 40px; height: 40px; margin-left: 20px;" src="'.$src.'" >' ?>
                    <span class="ms-1 font-weight-bold text-white" style="margin-bottom: 10px;">
                    <?php echo $_SESSION['AdminLoginId']; ?>
                    </span>
                    <?php
                    } else {
                        echo '<img src ="" alt="image not found" class="avatar" style="width: 40px; height: 40px margin-left: 20px;" >';
                    }
                    ?>
                </li> -->

                <!-- <hr class="horizontal light mt-0"> -->
                <P style="margin-left: 31px; color:white; margin-top: 18px; font-size: 20px;letter-spacing: 2px;
        font-weight: 800;">MAIN NAVIGATION </P>
                <li class="nav-item active">
                    <a href="index.php" class="nav-link text-white collapsed active" aria-controls="dashboardsExamples"
                        role="button" aria-expanded="false">
                        <box-icon type='solid' name='dashboard' color="white"></box-icon>
                        <span class="nav-link-text ms-2 ps-1 active" style="font-size: 16px;">Dashboards</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                        href="#productsExample">
                        <i class="fa-sharp fa-solid fa-gears" style="color:white;"></i>
                        <span class="sidenav-normal  ms-2  ps-1 " style="font-size: 16px;"> Services <b
                                class="caret"></b></span>
                    </a>
                    <div class="collapse " id="productsExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./formnormal.php">
                                    <box-icon name='exit-fullscreen' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1">Normal</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./emergency.php">
                                    <box-icon name='plus-medical' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Emergency </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./budegetry.php">
                                    <box-icon type='solid' name='bank' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Budgetry </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./spareparts.php">
                                    <box-icon type='solid' name='brightness' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Spare parts </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white "data-bs-toggle="collapse" aria-expanded="false"
                        href="#signupExample">
                        <i class="fa-solid fa-database" style="color:white;"></i>
                        <span class="sidenav-normal  ms-2  ps-1" style="font-size: 16px;">Orders <b
                                class="caret"></b></span>
                    </a>
                    <!-- ./Products/Order_List.php -->
                    <div class="collapse " id="signupExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./orders.php">
                                    <box-icon type='solid' name='basket' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                        href="#resetExample">
                        <i class="fa-solid fa-users-viewfinder" style="color:white;"></i>
                        <span class="sidenav-normal  ms-2  ps-1" style="font-size: 16px;"> Customers <b
                                class="caret"></b></span>
                    </a>
                    <div class="collapse " id="resetExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./coustmers.php">
                                    <i class="material-icons opacity-10 " style="color:white;">group</i>
                                    <span class="sidenav-normal  ms-2  ps-1"> Customers </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
                        <box-icon name='group' color="white" width="25px;" height="20px"></box-icon>
                        <span class="sidenav-normal  ms-2  ps-1" style="font-size: 16px;"> HR <b
                                class="caret"></b></span>
                    </a>
                    <div class="collapse " id="lockExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./newEmploye.php">
                                    <box-icon type='solid' name='user-plus' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> New Employee </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./employedetail.php">
                                    <box-icon type='solid' name='message-square-detail' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Employee Details </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./applyforleave.php">
                                    <box-icon type='solid' name='user-minus' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Apply For Leave </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./leaveap.php">
                                    <box-icon type='solid' name='check-square' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Leave Approval </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./leavedetail.php">
                                    <box-icon name='detail' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Leave Details </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="">
                                    <box-icon name='money' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> PayRoll </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                        href="#signupExample">
                        <!-- <img src="./Products/image/order icon svg.svg" alt="" width="25px;" height="20px"> -->
                        <!-- <i class="fa-solid fa-files";"></i> -->
                        <i class="fa-solid fa-file" style="color: white"></i>
                        <!-- <i class="fa-light fa-file-chart-column" style="color: #CD8E33;"></i> -->
                        <span class="sidenav-normal  ms-2  ps-1" style="font-size: 16px;">Reports <b
                                class="caret"></b></span>
                    </a>
                    <div class="collapse " id="signupExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./reports.php">
                                    <i class="fa-solid fa-chart-line" style="color: white"></i>
                                    <!-- <box-icon type='solid' name='basket' color="#CD8E33"></box-icon> -->
                                    <span class="sidenav-normal  ms-2  ps-1"> Service Reports </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./leavereports.php">
                                    <i class="fa-sharp fa-solid fa-chart-simple" style="color:white"></i>
                                    <!-- <box-icon type='solid' name='basket' color="#CD8E33"></box-icon> -->
                                    <span class="sidenav-normal  ms-2  ps-1"> Employee Leave Reports </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                        href="#profileExample">
                        <!-- <img src="./Products/image/website details svg.svg" alt="" width="25px" height="20px"> -->
                        <box-icon name='mobile-alt' color="white"></box-icon>
                        <span class="sidenav-normal  ms-2  ps-1" style="font-size: 16px;"> Mobile App <b
                                class="caret"></b></span>
                    </a>
                    <div class="collapse " id="profileExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="./download.php">

                                    <box-icon name='mobile' color="white"></box-icon>
                                    <span class="sidenav-normal  ms-2  ps-1"> Download </span>
                                </a>
                            </li>
                            <li class="nav-item">

                        </ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 593px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 256px;"></div>
                    </div>
                </li>

        </aside>

    <main class="main-content position-relative max-height-vh-100 h-100  ">
        <!-- Navbar  -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                </nav>

                <!-- =============================================================================== -->
                <div class="navbell">
                    <?php
                        include './connection.php';
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('Y-m-d');
                        $sql1 = "SELECT * FROM employee e
                        INNER JOIN passport_details pd
                        ON e.employee_id = pd.user_id
                        INNER JOIN address a
                        ON e.employee_id = a.user_id
                        WHERE passport_expairy BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL +60 DAY)
                        OR visa_expairy BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL +60 DAY)
                        OR insurance_expairy BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL +60 DAY)
                        OR emirates_expairy BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL +60 DAY)
                        ORDER BY employee_id";
                        $result1 = mysqli_query($con, $sql1);  
                        $count = mysqli_num_rows($result1);
                        ?>

                    <?php
                        include './connection.php';
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('Y-m-d');
                        $query = "SELECT * FROM employee e
                        INNER JOIN passport_details pd
                        ON e.employee_id = pd.user_id
                        INNER JOIN address a
                        ON e.employee_id = a.user_id
                        WHERE dob BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL +3 DAY) 
                        ORDER BY dob";
                        $res = mysqli_query($con, $query);   
                        $total = mysqli_num_rows($res);
                        ?>
                    <div class="bellicone" onclick="toggleNotifi()">
                        <i class="fa-sharp fa-solid fa-bell"></i>
                        <div class="bellnum">
                            <span><?php echo $total+$count+1; ?></span>
                        </div>
                    </div>
                    <div class="notifi-box" id="box">


                        <h2>Notifications <span><?php echo $total+$count+1; ?></span></h2>
                        <!-- < class="notifi-item" style="flex-direction: column;"> -->
                        <!-- <div class="notifi-item" style="flex-direction: column;"> -->

                        <?php
                            while($data = mysqli_fetch_array($result1))
                            {
                                $passport = $data['passport_expairy'];
                                $pass_date = date('d-m-Y', strtotime($passport));
                                $visa = $data['visa_expairy'];
                                $visa_date = date('d-m-Y', strtotime($visa));
                                $insurance = $data['insurance_expairy'];
                                $insu_date = date('d-m-Y', strtotime($insurance));
                                $emirates = $data['emirates_expairy'];
                                $emi_date = date('d-m-Y', strtotime($emirates));
                                //  echo $date;
                                //  echo $passport;
                                if ($passport >= $date && $passport >= $date) {
                                    echo '<div class="notifi-item" style="flex-direction: column;"><a href="./employedetail.php" class="notifi-remove">' . strtoupper($data['first_name']) . "`s" . " Passport Expairy " . $pass_date . "<br>" . '</a>' . '</div>';
                                }
                                if ($visa >= $date && $visa >= $date) {
                                    echo '<div class="notifi-item" style="flex-direction: column;"><a href="./employedetail.php" class="notifi-remove">' . strtoupper($data['first_name']) . "`s" . " Visa Expairy " . $visa_date . "<br>" . '</a>' . '</div>';
                                }
                                if($insurance >= $date && $insurance >= $date) {
                                    echo '<div class="notifi-item" style="flex-direction: column;"><a href="./employedetail.php" class="notifi-remove">' . strtoupper($data['first_name']) . "`s" . " Insurance Expairy " . $insu_date . "<br>" . '</a>' . '</div>';
                                }
                                
                                if($emirates >= $date && $emirates >= $date) {
                                    echo '<div class="notifi-item" style="flex-direction: column;"><a href="./employedetail.php" class="notifi-remove">' . strtoupper($data['first_name']) . "`s" . " Emirates Expairy " . $emi_date . "<br>" . '</a>' . '</div>';
                                }
                                
                            }
                        ?>
                        <?php
                            while($fetch = mysqli_fetch_array($res)) {
                            $dob = $fetch['dob'];
                            $dob = date('d-M', strtotime($dob));
                            echo '<div class="notifi-item" style="flex-direction: column;"><a href="./employedetail.php" class="notifi-remove">' . strtoupper($fetch['first_name']) . "`s" . " Birthday " . $dob . "<br>" . '</a>' . '</div>'; 
                        }   ?>
                        <!-- </div> -->

                    </div>
                </div>
                <!-- ============================================================================ -->
                
                
                <div class="dropdown" >
                    <button class="dropbtn" onclick="sidebarpopup()"
                        >
                        <!-- <div>
                            <?php 
                                if($row['profile_pic']) {
                                    $final_file = $row['profile_pic'];
                                    $imgData = base64_encode(file_get_contents("./images/".$final_file));
                                    $src = 'data: '.mime_content_type('./images').';base64,'.$imgData;
                                    ?>  
                                    <?php echo '<img class="avatar" style="width: 40px; height: 40px;" src="'.$src.'" alt="image not found" >' ?>
                                
                                    <?php
                                } else {
                                    echo '<img src="" alt="image not found" class="avatar" style="width: 40px; height: 40px;">';
                                }
                            ?> 
                        </div> -->
                        
                        <div>
                            <?php echo $_SESSION['AdminLoginId']; ?>
                        </div>
                        
                    </button>
                    <!-- <div class="dropdown-content" style="background-color: #f9f9f9">
                        <a href="./profilefile.php">My Profile</a>
                        <a href="./Products/logout.php">Logout</a>
                    </div> -->
                    <div class="dropdownew" id="box1">
                        <div class=" topbox d-flex flex-column">
                            <?php 
                                // if(isset($_SESSION['AdminLoginId']))
                                // {
                                //     $img_query = "SELECT `image` FROM `admin_login`";
                                //     $run_query = mysqli_query($con, $img_query);
                                    
                                //     if($result = mysqli_num_rows($run_query) > 0){
                                //         $row_result= mysqli_fetch_assoc($result);
                                        
                                //     }else{
                                //         echo "Image not found";
                                //     }

                                // }
                            ?>
                            <div class="picture">
                                <?php
                                    $name_image = $_SESSION['AdminLoginId'];
                                    // echo $name_image;
                                    // die;
                                    $sql = "SELECT `image` FROM admin_login WHERE `Admin_Name` ='$name_image'";
                                    $result = $con->query($sql);
                                    $row = $result->fetch_assoc();
                                    // $result = mysqli_query($con,$sql);
                                    // $row = mysqli_fetch_array($result);
                                    // print_r($row);
                                    // $image_name = implode($row);
                                    // echo $image_name;
                                    // die;
                                ?>
                                <img width="50" height="50" class="rounded-circle"  src="assets/img/<?php echo $row['image'] ?>" alt="image not found" >
                            </div>
                       </div>
                        <div class="Buttons" >
                            <a type="button" href="./profilefile.php" class="btn border bg-outline-white">Profile</a>
                            <a type="button" href="./admin_login.php" class="btn border">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </nav>