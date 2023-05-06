<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
    hr {
        margin-top: 0;
        margin-bottom: 3px;
    }

    .form-select:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }

    .table2 table {
        border-collapse: collapse !important;
        width: 100% !important;
        font-family: 'Abel', sans-serif;
    }

    .table2 table th,
    tr,
    td {
        border: 1px solid black !important;
    }

    .forminput label {
        color: black;
        font-family: 'Abel', sans-serif;
        font-size: 18px;
        font-weight: 800;
        margin-top: 15px !important;
        margin-left: 0 !important;
        margin-bottom: 0 !important;
    }

    .forminput select {
        font-family: 'Abel', sans-serif;
        height: 34px;
        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;
        /* border: 1px solid grey; */
        padding: 2px 15px
    }

    input[type=date] {
        text-transform: uppercase;
    }

    .forminput input {
        font-family: 'Abel', sans-serif;
        padding: 2px 15px;
        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;
        /* border: 1px solid grey; */
    }

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }



    .button-22 {
        font-family: 'Abel', sans-serif;
        align-items: center;
        appearance: button;
        background-color: #CD8E33;
        /* background-color: #0276FF; */
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
        padding: 10px 21px;
        text-align: center;
        text-transform: none;
        transition: color .13s ease-in-out, background .13s ease-in-out, opacity .13s ease-in-out, box-shadow .13s ease-in-out;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        margin-bottom: 26px;
        margin-top: 26px;
    }

    .forminput {
        position: relative;
    }

    .forminput i {

        position: absolute;
        right: 32%;
        bottom: 5px;
        font-size: 22px;
    }

    .booton a {
        text-decoration: none;
    }

    .forminput select {
        height: 34px;
        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;

        padding: 2px 15px;

    }


    .button-22:active {

        background-color: #f0a236;
    }

    .button-22:hover {

        background-color: #cf9544;
    }
    </style>





</head>

<body>
    <?php
    include './connection.php';
$locUserId = $_GET['id'];
    // echo $locUserId;
$query = "SELECT * FROM employee e
    INNER JOIN passport_details pd
    ON e.employee_id = pd.user_id
    INNER JOIN address a
    ON e.employee_id = a.user_id
    WHERE e.employee_id = '$locUserId'";
$res = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($res);
    echo $result;
?>
    <section style="padding: 3px 15px;">
        <div class="Box ">
            <div class="Boxheader d-flex justify-content-between" style="height:35px;">
                <div>
                    <h4 class="box-title" style="color:#545454;margin-left: 13px; font-weight: bold;">Employee Form</h4>
                </div>
                <div class="box-tools pull-right">
                </div>
            </div>
            <hr>
            <div class="container" style="max-width: 900px; margin:auto">
                <form action="empNextPageUpadte.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Employee ID :</label>
                                <input type="text" class="form-control" style="width: 70%;" name="Empid"
                                    placeholder="Employe id" value="<?php echo $result['employee_id'] ?>" disabled />
                            </div>
                            <!-- <?php echo $result['employee_id'] ?> -->
                        </div>
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Title :</label>
                                <select class="form-control" name="title" value="<?php echo $result['title'] ?>"
                                    style="width: 70%;" required>
                                    <option value="<?php echo $result['title'] ?>" hidden><?php echo $result['title'] ?></option>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>First Name *:</label>
                                <input type="text" class="form-control" name="first_name" style="width: 70%;"
                                    placeholder="First Name" value="<?php echo $result['first_name'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Last Name *:</label>
                                <input type="text" class="form-control" name="last_name" style="width: 70%;"
                                    placeholder="Last Name" value="<?php echo $result['last_name'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Passport Number :</label>
                                <input name="passport_number" style="width: 70%;" class="form-control"
                                    placeholder="Passport Number" />
                                <!-- <input type="date"  class="form-control" name="Designation" style="width: 70%;" placeholder="Passport" required> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Passport Expiry :</label>
                                <input name="passport_expairy" style="width: 70%;" class="todate form-control"
                                    placeholder="DD/MM/YYYY" />
                                <i class="fa-solid fa-calendar-days"></i>
                                <!-- <input type="date"  class="form-control" name="Designation" style="width: 70%;" placeholder="Passport" required> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Visa Number :</label>
                                <input name="visa_number" style="width: 70%;" class="form-control"
                                    placeholder="Visa Number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="forminput">
                                <label>Visa Expiry:</label>
                                <input name="visa_expairy" style="width: 70%;" class=" todate form-control"
                                    placeholder="DD/MM/YYYY" />
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="forminput">
                                        <label>Emirates Id Number:</label>
                                        <input name="emirates_id" style="width: 70%;" class="form-control"
                                            placeholder="Emirates Id Number" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="forminput">
                                        <label>Emirates Id Expiry:</label>
                                        <input name="emirates_expairy" style="width: 70%;" class="todate form-control"
                                            placeholder="DD/MM/YYYY" />
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="forminput">
                                        <label>Insurence Expiry:</label>
                                        <input name="insurance_expairy" style="width: 70%;" class="todate form-control"
                                            placeholder="DD/MM/YYYY" />
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="forminput">
                                        <label>Probation Period:</label>
                                        <select class="form-select" name="period" style="width:70%;"
                                            aria-label="Default select example">
                                            <option value="1 Month" selected>1 month</option>
                                            <option value="3 Month">3 months</option>
                                            <option value="6 Month">6 months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top:10px;">
                        <h4 class="mb-3 mt-3 letter-spacing-1" style="color:#545454; font-weight: bold;">Salary Breakup
                        </h4>
                        <div class="container" style="width: 86%;margin: 0;">
                            <div class="row " style="border:1px solid black ;text-align: center;">
                                <div class="col-md-6  p-1" style="border-right:2px solid black ;">
                                    Basic
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" name="basic" id="value1" style="width: 100%;"
                                        type="text" placeholder="Basic" aria-label="default input example">
                                </div>
                            </div>
                            <div class="row " style="border:1px solid black ; border-top: none;text-align: center;">
                                <div class="col-md-6 p-1" style="border-right:2px solid black ;">
                                    HRA
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" name="hra" id="value2" style="width: 100%;"
                                        type="text" placeholder="HRA" aria-label="default input example">

                                </div>
                            </div>
                            <div class="row " style="border:1px solid black ; border-top: none;text-align: center;">
                                <div class="col-md-6 p-1" style="border-right:2px solid black ;">
                                    Allowance
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" name="allowance" id="value3" style="width: 100%;"
                                        type="text" placeholder="Allowance" aria-label="default input example">
                                </div>
                            </div>
                            <div class="row" style="border:1px solid black ; border-top: none;text-align: center;">
                                <div class="col-md-6 p-1" style="border-right:2px solid black ;">
                                    Others
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" name="other" id="value4" style="width: 100%;"
                                        type="text" placeholder="Others" aria-label="default input example">
                                </div>
                            </div>
                            <div class="row " style="border:1px solid black ; border-top: none;text-align: center;">
                                <div class="col-md-6 p-1" style="border-right:2px solid black ;">
                                    Net Salary
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" data-target="price-someId" name="salary" id="sum" readonly
                                        style="width: 100%;" type="text" placeholder="Net Salary"
                                        aria-label="default input example">
                                </div>
                            </div>
                            <div class="row " style="border:1px solid black ; border-top: none;text-align: center;">
                                <div class="col-md-6 p-1" style="border-right:2px solid black ;">
                                    In-Words
                                </div>
                                <div class="col-md-6 p-1">
                                    <input class="form-control" readonly id="Text1" style="width: 100%;" type="text"
                                        placeholder=" UAE Dirham twenty Five Thousand only."
                                        aria-label="default input example">
                                    <!-- UAE Dirham twenty Five Thousand only. -->

                                </div>
                            </div>
                        </div>

                        <div class="booton d-flex justify-content-between mt-3 mb-3">
                            <a href="./newEmploye.php" style="margin-left:-11px"><input type="button" class="button-22"
                                    placeholder="Back" value="Back"></a>
                            <!-- <a href="#" style="margin-right:110px"><input type="button" class="button-22" name="submit"
                                placeholder="" value="Add employee"></a> -->
                            <button style="margin-right:110px" name="submit" type="submit" class="button-22"
                                value="<?php echo $locUserId ?>">Add Employee</button>
                        </div>

                    </div>
                </form>
    </section>
    <script type="text/javascript">
    function onlyNumbers(evt) {
        var e = event || evt; // For trans-browser compatibility
        var charCode = e.which || e.keyCode;

        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function NumToWord(inputNumber, outputControl) {
        var str = new String(inputNumber)
        var splt = str.split("");
        var rev = splt.reverse();
        var once = ['Zero', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight', ' Nine'];
        var twos = ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen',
            ' Eighteen', ' Nineteen'
        ];
        var tens = ['', 'Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety'];

        numLength = rev.length;
        var word = new Array();
        var j = 0;

        for (i = 0; i < numLength; i++) {
            switch (i) {

                case 0:
                    if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                        word[j] = '';
                    } else {
                        word[j] = '' + once[rev[i]];
                    }
                    word[j] = word[j];
                    break;

                case 1:
                    aboveTens();
                    break;

                case 2:
                    if (rev[i] == 0) {
                        word[j] = '';
                    } else if ((rev[i - 1] == 0) || (rev[i - 2] == 0)) {
                        word[j] = once[rev[i]] + " Hundred ";
                    } else {
                        word[j] = once[rev[i]] + " Hundred and";
                    }
                    break;

                case 3:
                    if (rev[i] == 0 || rev[i + 1] == 1) {
                        word[j] = '';
                    } else {
                        word[j] = once[rev[i]];
                    }
                    if ((rev[i + 1] != 0) || (rev[i] > 0)) {
                        word[j] = word[j] + " Thousand";
                    }
                    break;


                case 4:
                    aboveTens();
                    break;

                case 5:
                    if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                        word[j] = '';
                    } else {
                        word[j] = once[rev[i]];
                    }
                    if (rev[i + 1] !== '0' || rev[i] > '0') {
                        word[j] = word[j] + " Lakh";
                    }

                    break;

                case 6:
                    aboveTens();
                    break;

                case 7:
                    if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                        word[j] = '';
                    } else {
                        word[j] = once[rev[i]];
                    }
                    if (rev[i + 1] !== '0' || rev[i] > '0') {
                        word[j] = word[j] + " Crore";
                    }
                    break;

                case 8:
                    aboveTens();
                    break;


                default:
                    break;
            }
            j++;
        }

        function aboveTens() {
            if (rev[i] == 0) {
                word[j] = '';
            } else if (rev[i] == 1) {
                word[j] = twos[rev[i - 1]];
            } else {
                word[j] = tens[rev[i]];
            }
        }

        word.reverse();
        var finalOutput = '';
        for (i = 0; i < numLength; i++) {
            finalOutput = finalOutput + word[i];
        }
        document.getElementById(outputControl).innerHTML = finalOutput;
    }
    </script>

    <script src="./validationScript//nextjsSalary.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="./validationScript//datepicker.js"></script>

    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>

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