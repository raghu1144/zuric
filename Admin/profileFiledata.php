<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    .forminput label {
        color: black;
        font-size: 18px;
        font-weight: 800;
        margin-top: 15px !important;
        margin-left: 0 !important;
        margin-bottom: 3px !important;
        font-family: 'Abel', sans-serif;
    }

    h3 {
        font-family: 'Abel', sans-serif;
    }

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }

    .forminput input {
        font-family: 'Abel', sans-serif;


        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;

    }

    .btnp {
        transform: translateX(-13rem) !important;
    }

    .profile1 {
        display: none;
    }
    </style>
</head>

<body>
    <section>
        <?php
        include './connection.php';
                  // session_start();
        $name = $_SESSION['AdminLoginId'];
        // echo $name;
        $query = "SELECT * FROM user u
        INNER JOIN user_xref ux
        ON u.user_id = ux.user_id
        INNER JOIN user_details ud
        ON ud.user_details_id = ux.pk_value
        INNER JOIN address a
        ON a.user_id = u.user_id 
        WHERE email = '$name'";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
        ?>
        <div class="container">
            <h3>PROFILE DETAILS</h3>
            <hr>
            <div class="profile" id="profile">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="forminput d-flex justify-content-center align-items-center">
                            <?php
                                $name_image = $_SESSION['AdminLoginId'];
                                // echo $name_image;
                                // die;
                                $sql = "SELECT * FROM admin_login WHERE `Admin_Name` ='$name_image'";
                                $result = $con->query($sql);
                                $row = $result->fetch_assoc();
                                // $result = mysqli_query($con,$sql);
                                // $row = mysqli_fetch_array($result);
                                // print_r($row);
                                // $image_name = implode($row);
                                // echo $image_name;
                                // die;
                            ?>
                            <img width="150" height="150" class="rounded-circle"  src="assets/img/<?php echo $row['image'] ?>" alt="image not found" >
                        
                       
                        <!-- <?php 
                            if($row['profile_pic']) {
                                $final_file = $row['profile_pic'];
                                $imgData = base64_encode(file_get_contents("./images/".$final_file));
                                $src = 'data: '.mime_content_type('./images').';base64,'.$imgData;
                                ?>  
                                <?php echo '<img class="rounded-circle mt-2" width="200" height="200" src="'.$src.'" alt="image not found" >' ?> 
                                <?php
                            } else {
                                echo '<img src="" alt="image not found" width="200px" height="200px">';
                            }
                            ?> -->
                        </div>
                    </div>
                    <div class="col-md-8" style=" padding:0 150px; border-radius: 15px; margin-bottom: 10px">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="forminput">
                                    <label for="Name">Name:</label>
                                    <p id="Name"><?php echo $row['Admin_Name'];?></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="forminput">
                                    <label for="Mob">Mobile Number:</label>
                                    <p id="Mob"><?php echo $row['mobile']?></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="forminput">
                                    <label for="Country">Email:</label>
                                    <p id="email"><?php echo $row['email']?></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="forminput d-flex justify-content-center">
                                    <!-- <label for="EmpID">Email Id:</label> -->
                                    <div class="mt-6 text-left">
                                        <button class="btn btn profile-button btnp" onclick="updateprofile()"
                                            type="submit" style="background-color:#cd8e33; color:#fff">Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="profile1" id="profile1">
                <form action="updateProfile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="forminput d-flex justify-content-center align-items-center">
                                <?php
                                    $final_file = $row['image'];
                                    // echo $final_file;
                                    $imgData = base64_encode(file_get_contents("assets/img/".$final_file));
                                    $src = 'data: '.mime_content_type('assets/img/').';base64,'.$imgData;
                                ?>  
                                <?php 
                                    echo '<img class="rounded-circle mt-2" width="180px" height="180px"
                                    src="'.$src.'" >' 
                                ?>
                            </div>
                            <input type="file" class="mt-4" name="image" id="image">
                        </div>

                        <div class="col-md-8" style=" padding:0 150px; border-radius: 15px; margin-bottom: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="forminput">
                                        <label for="Name">Name:</label>
                                        <input class="form-control" name="name" id="Name" style="width: 100%;"
                                            type="text" placeholder="User ID" aria-label="default input example"
                                            value="<?php echo $row['Admin_Name']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="forminput">
                                        <label for="Mob">Mobile Number:</label>
                                        <input class="form-control" maxlength="10" name="mobile" id="Mob"
                                            style="width: 100%;" type="text" placeholder="Mobile Number"
                                            aria-label="default input example" value="<?php echo $row['mobile']?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="forminput">
                                        <label for="Email">Email id:</label>
                                        <input class="form-control" name="email" id="Email" style="width: 100%;"
                                            type="email" placeholder="Email" aria-label="default input example"
                                            value="<?php echo $row['email']?>"/>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="forminput">
                                        <label for="PassWord">PassWord:</label>
                                        <input type="password" class="form-control" name="password" id="PassWord"
                                            style="width: 100%;" placeholder="Password"
                                            aria-label="default input example" required/>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="forminput">
                                        <label for="CnfPassWord"> Confirm Password:</label>
                                        <input type="password" class="form-control" name="CnfPassword" id="CnfPassWord"
                                            style="width: 100%;" placeholder="Confirm PassWord"
                                            aria-label="default input example" required/>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="forminput d-flex justify-content-center">
                                        <!-- <label for="EmpID">Email Id:</label> -->
                                        <div class="mt-6 text-left">
                                            <button class="btn btn profile-button btnp"
                                                type="submit" name="update_profile" style="background-color:#cd8e33; color:#fff">Update Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </section>

    <script>
    function updateprofile() {
        let button = document.getElementById("profile")
        let profile1 = document.getElementById("profile1")
        console.log("button", button);
        console.log("profile1", profile1);
        // button.style.fontSize="25px"
        button.style.display = "none"
        profile1.style.display = "block"

    }

    function Editprofile() {

        let button = document.getElementById("profile")
        let profile1 = document.getElementById("profile1")
        button.style.display = "block"
        profile1.style.display = "none"

    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="./validationScript/Dashboard.js"></script>
    <script src="./validationScript/bell.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>