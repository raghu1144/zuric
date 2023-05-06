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
    <link rel="stylesheet" href="./css/orderView.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

        .upperBox {
            padding-top: 10px;
        }

        .imagebox {

            width: 300px;
            max-width: 100%;
            margin-left: 10px;
        }

        .address {
            padding: 10px 10px;
            background: #dedede;
        }

        /* .section {
            position: relative;
        } */
        .containbox{
            position: relative;
        }


        section h1 {
            font-family: 'Abel', sans-serif;
            color: #545454;
            margin-bottom: 0 !important;



        }




        .upperBox p {
            margin: 0 !important;
        }

        p {
            margin-bottom: 0 !important;
        }

        .btn {
            padding: 0px 26px;
            border-radius: 20px;
            border: 1px solid goldenrod;
            background: goldenrod;
            color: white;
            font-size: 20px;
            outline: none;
        }

        select {
            margin: 23px 0;
        }

        .title {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .pricing label {
            font-size: 20px;
            font-weight: 500;
            color: black;
        }

        .pricing {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pricing p {
            font-size: 20px !important;
            color: black;
            font-weight: 600;
            line-height: 1.5;
        }

        hr {
            margin: 4px 0px
        }


        .imagebox img {
            width: 100%;
        }

        @media print {
            .printbtn {
                visibility: hidden;
            }
        }

        .printbtn {

            position: absolute;
            top: 97px;
            right: 157px;
            border: 1px solid goldenrod;
            outline: none;
            font-family: 'Abel', sans-serif;

        }

        .Box {
            height: 450px;
            width: 75%;
            background-color: #fff;
            display: block;
            margin: auto;

        }

        .address {
            padding: 10px 10px;
            background: #dedede;
        }

        .btn {
            background-color: #CD8E33 !important;
        }

        .btn:hover {
            background-color: #CD8E33;
            color: #fff
        }

        .status {
            margin-top: 10px !important;
            margin-bottom: 10px !important;

        }
    </style>
</head>

<body id="target">
    <?php
    $services_id = $_POST['services_id'];
    $created_date = $_POST['created_date'];
    $query = "SELECT * 
    FROM user u
    INNER JOIN user_xref ux
    ON u.user_id = ux.user_id
    INNER JOIN register_details rd
    ON ux.pk_value = rd.register_details_id
    INNER JOIN services s
    ON u.user_id = s.services_id
    INNER JOIN address a
    ON u.user_id = a.user_id
    WHERE services_id = '$services_id'";
    $result = mysqli_query($con, $query);
    $user_fetch = mysqli_fetch_assoc($result);
    ?>
    <div class="container containbox">
        <section class="section" id="target1">
            <h1>Order Details</h1>
            <?php
                $date = $_POST['created_date'];
                $date = date('d-m-Y', strtotime($date));
            ?>
            <p>Order no.
                <?php echo $_POST['services_id'] ?><span>
                    <?php echo "   ".$date ?>
                </span>
            </p>
            <hr>
            <div class="Box">
                <div class="row upperBox">
                    <div class="col-md-4">
                        <div class="imagebox">
                            <img src="assets/img/products/<?php echo $user_fetch['upload_picture'] ?>" alt="Image Not Found"
                                style="width:150px; height:150px;" />
                            <!-- <img src="./assets/img/home-decor-1.jpg" /> -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contente">
                            <p></p>
                            <p>Requirment_type :
                                <?php echo $user_fetch['services_type'];?>
                            </p>
                            <p>Brand Name :
                                <?php echo $user_fetch['brands_name'];?>
                            </p>
                            <p>Model Name :
                                <?php echo $user_fetch['models_name'];?>
                            </p>
                            <p>Regular/Urgent :
                                <?php echo $user_fetch['urgent'];?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <p class="title">Order Status</p>
                            <form action="orderStatusUpdate.php" method="POST">
                                <input type="hidden" id="input_id" name="input_id" value="<?php echo $services_id ?>" />
                                <select class="select" name="input_select">
                                    <option value="<?php echo $user_fetch['status'] ?>" hidden>
                                        <?php echo $user_fetch['status'] ?>
                                    </option>
                                    <option>Enquiry</option>
                                    <option>Available</option>
                                    <option>Not-Available</option>
                                    <option>Out of Stock</option>
                                    <option>In-Transit</option>
                                    <option>Cancelled</option>
                                    <option>Delivered</option>
                                    <option>Others</option>
                                </select>
                                <div>
                                    <button class="btn" name="order_status_update" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  -->
                <h1 class="text-center status">
                    <?php echo $user_fetch['services_type'];?>
                </h1>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="title">Payment Details</p>
                            <textarea rows="6" style="width: 100%;"></textarea>
                        </div>
                        <div class="col-md-4">

                            <p class="title">Billing / Shipping Information</p>
                            <div class="address">
                                <p>Addres:
                                    <?php echo $user_fetch['address'];?>
                                <p>City:
                                    <?php echo $user_fetch['city'];?>
                                </p>
                                <p>State:
                                    <?php echo $user_fetch['state'];?>
                                </p>
                                <p>Country:
                                    <?php echo $user_fetch['country'];?>
                                </p>
                                <p>Zip Code:
                                    <?php echo $user_fetch['zip_code'];?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="title">Order Summary</p>
                            <p>Order Id:
                                <?php echo $user_fetch['services_id'];?>
                            </p>
                            <p>Order Date:
                                <?php echo $date;?>
                            </p>
                            <p>Service Type:
                                <?php echo $user_fetch['services_type'];?>
                            </p>
                            <p>Customer Name:
                                <?php echo $user_fetch['person_name'];?>
                            </p>
                            <p>Contact Number:
                                <?php echo $user_fetch['mobile'];?>
                            </p>
                            <p>Emai Id:
                                <?php echo $user_fetch['email'];?>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <button class="printbtn" onclick="myFun('target1')">Export to PDF</button>
    </div>
    <script>
        function myFun(paravalue) {
            var backup = document.body.innerHTML;
            var divcontent = document.getElementById(paravalue).innerHTML;
            document.body.innerHTML = divcontent;
            window.print();
            document.body.innerHTML = backup;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="./validationScript/download.js"></script>

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