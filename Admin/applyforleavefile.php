<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Emergency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    .formgroup {
        position: relative;
    }

    input[type=date] {
        text-transform: uppercase;
    }

    .formgroup i {

        position: absolute;
        right: 32%;
        bottom: 5px;
        font-size: 22px;
    }

    .formgroup .fromdate {
        padding: 2px 15px;
    }

    .formgroup .todate {
        padding: 2px 15px;
    }

    .addleave a {
        text-decoration: none;

    }

    .formgroup input {
        padding: 2px 15px;
        font-family: 'Abel', sans-serif;

        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        
        border-radius: 6px;
        outline: none;
        /* border: 1px solid grey; */
    }

    .formgroup label {
        font-family: 'Abel', sans-serif;
        color: black;
        font-size: 18px;
        font-weight: 800;
        margin-top: 15px !important;
        margin-left: 0 !important;
        margin-bottom: 0 !important;
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

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }
    </style>

</head>

<body>
    <section style="padding: 3px 15px;">
        <div class="heading">
            <h4 style="margin-left: 13px; font-weight: bold;">Leave</h4>
        </div>
        <hr>
        <div class="container" style="max-width: 900px; margin:auto">
            <form action="applyLeave.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>Employee ID *:</label>
                            <select name="eid" class="form-control" style="width: 70%;" required>
                            <?php 
                            include './connection.php';
                            $sql = "SELECT employee_id FROM employee";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option>{$row['employee_id']}</option>";
                                }
                            }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>Types Of Leave:</label><br />
                            <select name="leaveType" class="form-control" style="width: 70%;" required>
                                <option>Annual leave</option>
                                <option>Casual Leave</option>
                                <option>Maternity leave</option>
                                <option>Paternal leave</option>
                                <option>Sick leave</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>Leave Status*:</label>
                            <select name="leaveStatus" class="form-control" style="width: 70%;" required>
                                <option>Paid </option>
                                <option>Unpaid</option>
                                <option>50%/Half-Day</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="formgroup">
                            <label>Mobile:</label>
                            <input type="tel" name="mobile" class="form-control" style="width:70%" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>From Date:</label>
                            <input name="fromDate" style="width: 70%;" class="fromdate form-control"
                                placeholder="DD/MM/YYYY" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>To Date:</label>
                            <input name="toDate" style="width: 70%;" class="todate form-control"
                                placeholder="DD/MM/YYYY" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>Number Of Days:</label>
                            <input type="text" class='calculated form-control ' style="width: 70%;" name="days" readonly
                                style="width:100%;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="formgroup">
                            <label>Bereavement:</label>
                            <input type="text" name="bereavement" class="form-control" style="width:70%;">
                        </div>
                    </div>
                </div>
                <div class="addleave mt-3">
                    <button type="submit" name="submit" class="button-22">Add Leave</button>
                </div>
            </form>
        </div>
    </section>
    <!-- <?php
  include './connection.php';
  echo "0";
  if(isset($_POST['submit'])) {
    $eid = $_POST['eid'];
    $leaveType = $_POST['leaveType'];
    $leaveStatus = $_POST['leaveStatus'];
    $mobile = $_POST['mobile'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $days = $_POST['days'];
    $bereavement = $_POST['bereavement'];
    $query = "INSERT INTO user_leave(user_id, leave_type, leave_status, mobile, from_date, to_date, number_of_days, bereavement)
              VALUES('$eid', '$leaveType', '$leaveStatus', '$mobile', '$fromDate', '$toDate', '$days', '$bereavement' )";
    $result = mysqli_query($con, $query);
    echo $result;
    if($result) {
      echo "Added Successfully";
    } else {
      echo "Not Added";
    }
  }
  ?> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="./assets/js/core/popper.min.js"></script> -->
    <script src="./validationScript//datepicker.js"></script>
    <!-- <script src="./assets/js/core/bootstrap.min.js"></script> -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" referrerpolicy="no-referrer">
    </script>

    <!-- bootsttap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

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