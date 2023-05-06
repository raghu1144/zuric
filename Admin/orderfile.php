<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="./css/order.css">
</head>
<style>
    .ViewButton{
    background: #fff;
    border: 1px solid goldenrod;
    border-radius: 13px;
    width: 38%;
    font-weight: 500;
    background: #CD8E33;
    color: #fff;
}
.form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }
    .form-select:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }
</style>

<body>
    <section>
        <?php
        include './connection.php';
        $fromDate = $toDate = "";
        $services_type = $country = "";
        $sub_query = $sub_query1 = $sub_query2 = "";
        if(isset($_POST['submit'])) {
        $from = $_POST['fromDate'];
        $fromDate = $from;
        $to = $_POST['toDate'];
        $toDate = $to;
        $services_type = $_POST['services_type'];
        $country = $_POST['country'];
        if($services_type != "" && $toDate != "" && $fromDate != "" && $country != '$country') {
            $sub_query = "WHERE services_type = '$services_type' AND country = '$country' AND s.created_date >= '$fromDate' && s.created_date <= '$toDate'";
        } else if($services_type != "" && $country != "" ) {
            $sub_query = "WHERE services_type = '$services_type' AND country = '$country' ";
        } else if($services_type != "") {
            $sub_query = "WHERE services_type = '$services_type'";
        } else if($services_type != ""  && $to != "" && $from != "") {
            $sub_query = "WHERE services_type = '$services_type' AND s.created_date >= '$fromDate' && s.created_date <= '$toDate'";
        } else if($country != "" && $to != "" && $from != "") {
            $sub_query = "WHERE country = '$country' AND s.created_date >= '$from' && s.created_date <= '$to'";
        } else if( $toDate != "" && $fromDate != "") {
            $sub_query = "WHERE s.created_date >= '$fromDate' && s.created_date <= '$toDate'";
        } else if($country != "") {
            $sub_query = "WHERE country = '$country'";
        }
    }
        $query = "SELECT s.created_date, s.services_id, person_name, country, mobile, email, services_type, brands_name, models_name, urgent, upload_document, upload_picture, s.status
            FROM user u
            INNER JOIN user_xref ux
            ON u.user_id = ux.user_id
            INNER JOIN register_details rd
            ON rd.register_details_id = ux.pk_value
            INNER JOIN services s
            ON u.user_id = s.user_id
            INNER JOIN address a
            ON a.user_id = u.user_id
            $sub_query ORDER BY s.services_id DESC";
            $result = mysqli_query($con, $query);
            $count = mysqli_num_rows($result);
    ?>
        <h1>ORDERS</h1>
        <hr>
        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <label for="choice">Filter By Status:</label>
                        <select class="form-select" value="<?php echo $services_type; ?>" name="services_type" id="choice" aria-label="Default select example">
                            <option value="">SELECT</option>
                            <option value="Normal">Normal</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Budgetry">Budgetry</option>
                            <option value="Spare">Spare Parts</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="formgroup">
                            <label>From Date:</label>
                            <input name="fromDate" style="width: 100%;" class="fromdate form-control"
                                placeholder="DD/MM/YYYY" value="<?php echo $fromDate; ?>" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="formgroup">
                            <label>To Date:</label>
                            <input name="toDate" style="width: 100%;" class="todate form-control"
                                placeholder="DD/MM/YYYY" value="<?php echo $toDate; ?>" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="choice">Filter By Location:</label>
                        <select class="form-select" name="country" value="<?php echo $country; ?>" id="choice" aria-label="Default select example">
                            <option value="">SELECT</option>
                            <option value="India">India</option>
                            <option value="Arab">Arab</option>
                            <option value="Africa">Africa</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Spain">Spain</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="display: flex; justify-content: flex-start; align-items: center;">
                        <div class="formgroup">
                            <button class="button-22" name="submit" value="Filter">Submit</button>
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
            if($count >= 1) {
        ?>
        <div class="table1 mt-2">
            <table id="">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Service Type</th>
                        <th>Status</th>
                        <th>Order Detail</th>
                    </tr>
                </thead>
                <tbody id="">
                    <?php    
                    $sl = 0;
                    while($user = mysqli_fetch_array($result)) {
                        $sl++;
                        $date = $user['created_date'];
                        $date = date('d-m-Y', strtotime($date));
                        // echo $date
                    ?>
                    <tr>
                        <td><?php echo $user['services_id'];; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $user['person_name']; ?></td>
                        <td><?php echo $user['mobile']; ?></td>
                        <td><?php echo $user['country']; ?></td>
                        <td><?php echo $user['services_type']; ?></td>
                        <td><?php echo $user['status']; ?></td>
                        <td>
                            <form action='./orderViewFile.php' method='POST'>
                                <input type='hidden' name="services_id" value="<?php echo $user['services_id'] ?>">
                                <input type='hidden' name='created_date' value="<?php echo $user['created_date'] ?>">
                                <button class="ViewButton" name='order_status_update' type="submit">View</button>
                                 <!-- <a href="./orderViewFile.php"><button class="ViewButton" name='order_status_update' type='submit'>View</button></a></td> -->
                            </form>    
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                } else {
                    echo "Data not found";
                } ?>
        </div>
    </section>
    <script>
    
    $("#choice").change(function() {
        $("#table tbody tr").hide();
        $("#table tbody tr." + $(this).val()).show('fast');
    });

    //this JS calls the tablesorter plugin that we already use on our site
    $("#table").tablesorter({
        sortList: [
            [0, 0]
        ]
    });
    </script>

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