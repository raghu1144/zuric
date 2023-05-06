<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Service Reports</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
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

    .formgroup select {
        font-family: 'Abel', sans-serif;
        height: 34px;
        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;
        /* border: 1px solid grey; */
        padding: 2px 15px;


    }

    .form-select {
        margin: 0;
    }

    label {
        font-size: 20px;
        color: black;
    }

    table {
        width: 100%;
    }

    table,
    td,
    tr,
    th {
        border: 1px solid;

    }

    th {
        background-color: #eaeaea;
    }

    th,
    td {
        padding: 12px;
    }

    select {
        margin: 1em 0;
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
    }

    .button-22:active {
        /* background-color: #006AE8; */
        background-color: #f0a236;
    }

    .button-22:hover {
        /* background-color: #1C84FF; */
        background-color: #cf9544;
    }
    </style>
</head>
<body>
    <section style="padding: 3px 15px;">
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
        $sub_query = "WHERE l.from_date >= '$from' AND l.to_date <= '$to'";        
    }
        $query = "SELECT * FROM employee e
            INNER JOIN user_leave l
            ON e.employee_id = l.user_id
            INNER JOIN address a
            ON e.employee_id = a.user_id
            $sub_query ORDER BY e.employee_id DESC";
            $result = mysqli_query($con, $query);
            $count = mysqli_num_rows($result);
    ?>
        <div class="Box ">
            <div class="Boxheader d-flex justify-content-between" style="height:35px;">
                <div>
                    <h4 class="box-title" style="color:#545454;margin-left: 13px; font-weight: bold;">Service Reports
                    </h4>
                </div>
                <div class="box-tools pull-right">
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="formgroup">
                            <label>From Date:</label>
                            <input name="fromDate" style="width: 100%;" class="fromdate form-control"
                                placeholder="DD/MM/YYYY" value="<?php echo $fromDate; ?>" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="formgroup">
                            <label>To Date:</label>
                            <input name="toDate" style="width: 100%;" class="todate form-control"
                                placeholder="DD/MM/YYYY" value="<?php echo $toDate; ?>" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-4"
                        style="display: flex; justify-content: flex-start; align-items: center; padding-top: 35px;">
                        <div class="formgroup">
                            <button class="button-22" name="submit" value="Filter">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <?php
            if($count >= 1) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Leave Type</th>
                                <th>from</th>
                                <th>To</th>
                                <th>Days</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sl = 0;
                            while($row = mysqli_fetch_array($result)) {
                                $date = $row['created_date'];
                                $date = date('Y-m-d', strtotime($date));
                                $sl++;
                                ?>
                                <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $row['employee_id'] ?></td>
                                <td><?php echo $row['first_name'];
                                    echo " "; echo $row['last_name']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['leave_type']; ?></td>
                                <td><?php echo $row['from_date']; ?></td>
                                <td><?php echo $row['to_date']; ?></td>
                                <td><?php echo $row['number_of_days']; ?></td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "Data not found";
                } ?>
                </div>
            </div>
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

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datepicker -->
    <script src="./validationScript/datepicker.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Scroll Bar -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
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