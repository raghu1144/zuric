<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    section h1 {
        font-family: 'Abel', sans-serif;
        color: #545454;

        /* font-family: 'Bellefair', serif; */

    }
    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }
    td{
        font-size: 14px;
    }
    th{
        font-size: 14px;
    }

    .formgroup {
        position: relative;
        font-family: 'Abel', sans-serif;
    }

    .formgroup i {

        position: absolute;
        right: 4%;
        bottom: 7px;
        font-size: 22px;
    }

    .formgroup .fromdate {
        padding: 2px 15px;
    }

    .formgroup .todate {
        padding: 2px 15px;
    }

    .form-select {
        padding: 5px 7px;
    }

    .button-22 {
        align-items: center;
        appearance: button;
        /* background-color: #0276FF; */
        background-color: #CD8E33;
        border-radius: 8px;
        border-style: none;
        box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: flex;
        flex-direction: row;
        flex-shrink: 0;
        font-family: "RM Neue", sans-serif;
        font-size: 100%;
        line-height: 1.15;
        margin: 0;
        padding: 10px 40px;
        text-align: center;
        text-transform: none;
        transition: color .13s ease-in-out, background .13s ease-in-out, opacity .13s ease-in-out, box-shadow .13s ease-in-out;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        transform: translateY(-5px);
    }

    .button-22:active {
        /* background-color: #006AE8; */
        background-color: #f0a236;
    }

    .button-22:hover {
        /* background-color: #1C84FF; */
        background-color: #cf9544;
    }

    .table1 table {
        font-size: 18px;
        color: black;
        border-collapse: collapse;
        font-family: 'Abel', sans-serif;
        width: 100%;
        font-weight: 400;
    }

    .table1 {
        padding: 10px;
    }

    .table1 table td,
    th {
        border: 1px solid black;
        text-align: center !important;
        padding: 3px 4px;
    }
    </style>
   
</head>

<body>
<section>
        <?php
        include './connection.php';
        $fromDate = $toDate = "";
        $sub_query = "";
        if(isset($_POST['submit'])) {
        $from = $_POST['fromDate'];
        $fromDate = $from;
        $fromArr=explode("/", $from);
        $from = $from." 00:00:00";
        $to = $_POST['toDate'];
        $toDate = $to;
        $toArr = explode("/", $to);
        $to = $to." 23:59:59";
        $sub_query = " WHERE s.created_date >= '$from' && s.created_date <= '$to'";        
    }
    $query = "SELECT s.created_date, person_name, country, mobile, email, services_type, oem_name, models_name, urgent, upload_document, upload_picture, s.status, s.modified_date
              FROM user u
              INNER JOIN user_xref ux
              ON u.user_id = ux.user_id
              INNER JOIN register_details rd
              ON rd.register_details_id = ux.pk_value
              INNER JOIN services s
              ON u.user_id = s.user_id AND services_type_id = 2004
              INNER JOIN address a
              ON a.user_id = u.user_id
              $sub_query ORDER BY s.services_id DESC";
              $result = mysqli_query($con, $query);
              // $row1 = $result->fetch_assoc();
              $count = mysqli_num_rows($result);
    ?>
    <h1>SPARE PARTS</h1>
        <hr>
        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="formgroup">
                            <label>From Date:</label>
                            <input name="fromDate" style="width: 100%;" class="fromdate form-control"
                                value="<?php echo $fromDate ?>" placeholder="DD/MM/YYYY" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="formgroup">
                            <label>To Date:</label>
                            <input name="toDate" style="width: 100%;" class="todate form-control"
                                placeholder="DD/MM/YYYY" value="<?php echo $toDate ?>" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-4"
                        style="display: flex; justify-content: flex-start; align-items: center; padding-top: 35px;">
                        <div class="formgroup">
                            <button class="button-22" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-5">
            </div>
        </div>
        <?php
            $sl = 0;
            if($count >= 1) {
        ?>
        </div>
        <div class="table1 mt-5">
            <table>
                <thead>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Requirement Type</th>
                        <th>Oem Name</th>
                        <th>Part Number</th>
                        <th>Regular/Urgent</th>
                        <th>Uploaded Document</th>
                        <th>Uploaded Picture</th>
                        <th>Action</th>
                        <th>Action Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php    
                    $sl = 0;
                    while($user = mysqli_fetch_array($result)) {
                        $sl++;
                        $date = $user['created_date'];
                        $date = date('d-m-Y', strtotime($date));
                        $date1 = $user['modified_date'];
                        $date1 = date('d-m-Y', strtotime($date1));
                ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $user['person_name'];?></td>
                        <td><?php echo $user['country']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['mobile']; ?></td>
                        <td><?php echo $user['services_type']; ?></td>
                        <td><?php echo $user['oem_name']; ?></td>
                        <td><?php echo $user['models_name']; ?></td>
                        <td><?php echo $user['urgent']; ?></td>
                        <td><?php echo $user['upload_document']; ?></td>
                        <td><?php echo $user['upload_picture']; ?></td>
                        <td><?php echo $user['status']; ?></td>
                        <td><?php echo $date; ?></td>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
            <?php
                } else {
                    echo "Data not found";
                } ?>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./validationScript/Dashboard.js"></script>
    <script src="./validationScript/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>


