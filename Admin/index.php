<?php
include "header.php";
include "Dashboard_Summaries.php";
?>


<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient shadow-dark text-center border-radius-xl mt-n4 position-absolute"
                        style="background-color: #CD8E33;">
                        <i class="material-icons opacity-10">group</i>
                        <!-- <i class="fa-duotone fa-people-group"></i> -->
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Users</p>
                        <?php
                        include './connection.php';
                        $sql = "SELECT *
                        FROM user u
                        INNER JOIN user_xref ux
                        ON u.user_id = ux.user_id AND ux.type_id = 1001 
                        INNER JOIN register_details rd
                        ON ux.pk_value = rd.register_details_id
                        WHERE ux.status = 'active'";
                        $result = mysqli_query($con, $sql);
                        if ($user_total = mysqli_num_rows($result)) {
                          echo '<h4 class="mb-0">' . $user_total . '</h4>';
                        } else {
                          echo '<h4> No data </h4>';
                        }
                        ?>

                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape  shadow-primary text-center border-radius-xl mt-n4 position-absolute"
                        style="background-color: #545454;">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"> New Users</p>
                        <?php
                        include './connection.php';
                        $sql = "SELECT *
                        FROM user u
                        INNER JOIN user_xref ux
                        ON u.user_id = ux.user_id AND ux.type_id = 1001
                        INNER JOIN register_details rd
                        ON ux.pk_value = rd.register_details_id
                        WHERE u.created_date >=  NOW() - INTERVAL 30 DAY";
                        $result = mysqli_query($con, $sql);
                        if ($user_total = mysqli_num_rows($result)) {
                          echo '<h4 class="mb-0">' . $user_total . '</h4>';
                        } else {
                          echo '<h4> No data </h4>';
                        }
                        ?>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">download</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total App Downloded</p>
                        <?php
                        include './connection.php';
                        $sql = "SELECT *
                        FROM user u
                        INNER JOIN user_xref ux
                        ON u.user_id = ux.user_id 
                        INNER JOIN register_details rd
                        ON ux.pk_value = rd.register_details_id
                        WHERE ux.type_id = 1001";
                        $result = mysqli_query($con, $sql);
                        if ($user_total = mysqli_num_rows($result)) {
                          echo '<h4 class="mb-0">' . $user_total . '</h4>';
                        } else {
                          echo '<h4> No data </h4>';
                        }
                        ?>
                        <h4 class="mb-0">
                            <??>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient shadow-info text-center border-radius-xl mt-n4 position-absolute"
                        style="background-color: lightgreen;">
                        <i class="material-icons opacity-10">thermostat</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Temperature</p>
                        <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $apiKey = "bcfb22ddd0201f375a9305961d70440b";
                        $city ="1273293";
                        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $city . "&lang=en&units=metric&APPID=" . $apiKey;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_VERBOSE, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $data = json_decode($response);
                        // echo "<pre>";
                        // print_r($data);
                        $currentTime = time();
                        ?>
                        <?php echo '<h4 class="mb-0">' . $data->main->temp_max . '&deg;C' . '</h4>' ?> <span>

                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient shadow-primary border-radius-lg py-3 pe-1"
                        style="background-color: #CD8E33;">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            <!-- <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo '<h4 class="mb-0">' . $user_total . '</h4>';
                            } else {
                              echo '<h4> No data </h4>';
                            }
                            ?> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Total Orders</h6>
                    <!-- <p class="text-sm ">Last Campaign Performance</p> -->
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> just updated </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart start here -->
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2  ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="border-radius-lg py-3 pe-1" style="background-color: #545454;">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                            <!-- <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo '<h4 class="mb-0">' . $user_total . '</h4>';
                            } else {
                              echo '<h4> No data </h4>';
                            }
                            ?> -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="mb-0 "> High Demand </h6>

                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> just updated </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-info shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            <!-- <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo '<h4 class="mb-0">' . $user_total . '</h4>';
                            } else {
                              echo '<h4> No data </h4>';
                            }
                            ?> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Low Demand</h6>

                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm">just updated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Customer Reviews</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">30 done</span> this month
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table text-lg-center mb-0">
                        <?php
                            $query = "SELECT * FROM user u
                                    INNER JOIN user_xref ux
                                    ON u.user_id = ux.user_id
                                    INNER JOIN register_details rd
                                    ON rd.register_details_id = ux.pk_value
                                    INNER JOIN services s
                                    ON u.user_id = s.user_id
                                    INNER JOIN address a
                                    ON a.user_id = u.user_id
                                    ORDER BY s.services_id DESC LIMIT 5";
                                    $result = mysqli_query($con, $query);
                                    ?>
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl
                                        no.</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Orders</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Service Type</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Location</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 0;
                                while($user = mysqli_fetch_assoc($result)) {
                                    $sl++;
                                    $date = $user['created_date'];
                                    $date = date('Y-m-d', strtotime($date));
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $user['services_id']; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $user['services_type']; ?></td>
                                    <td><?php echo $user['country']; ?></td>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                    </div>
                </div>
                <!-- <?php
                include './connection.php';
                $sql = "Select * from customer_remarks";
                $result = $con->query($sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $rating = $row['rating'];
                        $remarks = $row['remarks'];
                
                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $rating . '</td>
                        <td>' . $remarks . '</td>
                        </tr>';
                    }
                }
                ?> --> 
                <div class="progress">
                    <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="40"></div>
                </div>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="card h-100">
        <div class="card-header pb-0">
            <h6>Orders overview</h6>
            <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
            </p>
        </div>
        <div class="card-body p-3">
            <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">

                    <span class="timeline-step">
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <box-icon name='exit-fullscreen'></box-icon>
                        <!-- <i class="material-icons text-success text-gradient">notifications</i> -->
                        <!-- <img src="./Products/image/normal.png" alt="" style="width: 30px; height: 30px; position:relative;"/> -->
                    </span>
                    <div class="timeline-content">
                        <!-- <img src="./Products/image/sales.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"> Sales</span>  -->
                        <!-- <img src="./Products/image/sales.jpeg" alt="" style="width: 10;">Sales -->
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Normal</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref WHERE services_type_id = 2001";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo $user_total;
                            } else {
                              echo 'No data';
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <box-icon name='plus-medical'></box-icon>
                        <!-- <i class="material-icons text-danger text-gradient">code</i> -->
                        <!-- <img src="./Products/image/emergency.png" alt="" style="width: 30px; height: 30px; position:relative;"/> -->
                        <!-- <i class="fa fa-stretcher"></i> -->
                    </span>
                    <div class="timeline-content">
                        <!-- <img src="./Products/image/neworder.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"><b> New Order </b></span> -->
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Emergency</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref WHERE services_type_id = 2001";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo $user_total;
                            } else {
                              echo 'No data';
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <box-icon type='solid' name='brightness'></box-icon>
                        <!-- <i class="material-icons text-info text-gradient">shopping_cart</i> -->
                        <!-- <img src="./Products/image/spareparts.png" alt="" style="width: 30px; height: 30px; position:relative;"/> -->
                    </span>
                    <div class="timeline-content">
                        <!-- <img src="./Products/image/transit.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"><b> Transit </b></span> -->
                        <h6 class="text-dark text-sm font-weight-bold mb-0"><b>Spare Parts</b></h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref WHERE services_type_id = 2001";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo $user_total;
                            } else {
                              echo 'No data';
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <box-icon type='solid' name='bank'></box-icon>
                        <!-- <i class="material-icons text-warning text-gradient">credit_card</i> -->
                        <!-- <img src="./Products/image/budegt.png" alt="" style="width: 30px; height: 30px; position:relative;"/> -->
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Budgetry</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref WHERE services_type_id = 2002";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo $user_total;
                            } else {
                              echo 'No data';
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="timeline-block">
                    <span class="timeline-step">
                        <box-icon type='solid' name='basket'></box-icon>
                        <!-- <i class="material-icons text-dark text-gradient">payments</i> -->
                        <!-- <img src="./Products/image/cancel.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/> -->
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Total Orders</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                        <?php
                            include './connection.php';
                            $sql = "SELECT * FROM user_services_xref";
                            $result = mysqli_query($con, $sql);
                            if ($user_total = mysqli_num_rows($result)) {
                              echo $user_total;
                            } else {
                              echo 'No data';
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</main>
</div>
<!--   Core JS Files   -->

<?php
include '../Admin//Products/common/scripts.php' 
?>
<!-- <script src="../Admin/Products/common/scripts.php"></script> -->
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [50, 20, 10, 22, 50, 10, 40],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});


var ctx2 = document.getElementById("chart-line").getContext("2d");
var values =
    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Orders",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: <?php require "./Utility.php"; echo get_monthly_orders();?>,
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

new Chart(ctx3, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Newsletter",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: <?php echo get_newsletter();?>,
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#f8f9fa',
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});
</script>
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