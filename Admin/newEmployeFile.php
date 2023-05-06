<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Document</title>
    <style>
    hr {
        margin-top: 0;
        margin-bottom: 3px;
    }

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }
    .form-select:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }

    .forminput {
        position: relative;
    }

    .forminput i {

        position: absolute;
        right: 23%;
        bottom: 5px;
        font-size: 22px;
    }

    /* CSS */
    .button-22 {
        font-family: 'Abel', sans-serif;
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
       
        font-size: 100%;
        line-height: 1.15;
        margin: 0 83px;
        margin-bottom: 26px;
        margin-top: 26px;
        padding: 8px 30px;

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

    input[type=date] {
        text-transform: uppercase;
        font-family: 'Abel', sans-serif;
    }

    .btn12 a {
        text-decoration: none;
    }

    .forminput label {
        font-family: 'Abel', sans-serif;
        color: black;
        font-size: 18px;
        font-weight: 800;
        margin-top: 15px !important;
        margin-left: 0 !important;
        margin-bottom: 3px !important;
    }

    :root {
        --succes-color: #2ecc71;
        ;
        --error-color: #e74c3c;
    }

    .forminput.success input {
        border-color: var(--succes-color);
    }

    .forminput.error input {
        border-color: var(--error-color);
    }

    .forminput small {
        color: grey;
        position: absolute;
        bottom: -21px;
        left: 14px;
        visibility: hidden;
    }

    /* .forminput.error small {
            visibility: visible;
        } */

    .forminput select {
        height: 34px;
        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;
        font-family: 'Abel', sans-serif;

        padding: 2px 15px;

    }
    .forminput option{
        font-family: 'Abel', sans-serif;
    }

    .button-22 a {
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
    }

    .forminput input {


        line-height: 25px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        border-radius: 6px;
        outline: none;

    }
    </style>
</head>

<body>
    <section class="content" style="padding: 3px 15px;">
        <div class="Box ">
            <div class="Boxheader d-flex justify-content-between" style="height:35px;">
                <div>
                    <h4 class="box-title" style="margin-left: 13px; font-weight: bold; color:#545454 ;">Employee Form
                        </h5>
                </div>
                <div class="box-tools pull-right">
                    <!-- <button type="button" class="btn " data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-remove"></i></button> -->
                </div>
            </div>
        </div>
        <hr>
        <div class="container" style="max-width:900px ; margin: auto;">
            <form class="form" id="form" action="addNewEmployee.php" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label for="EmpID">Employee ID :</label>
                            <input class="form-control" style="width: 80%;" type="text" placeholder="Employee ID"
                                aria-label="default input example" disabled>
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label for="Title">Title :</label>
                            <select style="width: 80%;" name="title" class="form-select" id="Title">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label for="First_name">First Name *:</label>
                            <input class="form-control" style="width: 80%;" name="fname" type="text"
                                placeholder="First Name" aria-label="default input example">
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Last Name *:</label>
                            <input class="form-control" name="lname" style="width: 80%;" type="text"
                                placeholder="Last Name" aria-label="default input example">
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <div>
                                <label for="date">Date Of Birth:</label>
                                <!-- <input type="date" class="form-control" style="width: 80%;" id="date" /> -->
                                <input name="dob" style="width: 80%;" class="todate form-control"
                                    placeholder="DD/MM/YYYY" />
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Gender:</label>
                            <select name="gender" id="gender" class="form-select" data-placeholder="Select a Gender"
                                style="width: 80%;">
                                <option value="Male">Male</option>
                                <option value="FeMale">Female</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Designation *:</label>
                            <select name="designation" class="form-select" id="department" style="width: 80%;">
                                <option>Account</option>
                                <option>Admin</option>
                                <option>HR</option>
                                <option>Marketing</option>
                                <option>Operation</option>
                                <option>Sales</option>
                                <option>Logistics</option>
                                <option>Others</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Joining Date:</label>
                            <!-- <input type="date" style="width: 80%;" class="form-control" id="date" placeholder="DD/MM/YYYY" /> -->
                            <input name="joiningDate" style="width: 80%;" class="todate form-control"
                                placeholder="DD/MM/YYYY" />
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Mobile Number:</label>
                            <input class="form-control" type="text" name="mobile" style="width: 80%;"
                                placeholder="Mobile Number" maxlength="10" aria-label="default input example">
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Emergency Number:</label>
                            <input class="form-control" type="text" name="emergencyMobile" style="width:80%;"
                                placeholder="Emergency Number" maxlength="10" aria-label="default input example">
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>Email *:</label>
                            <input type="email" name="email" style="width:80%;" class="form-control"
                                id="exampleFormControlInput1" placeholder="name@example.com">
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label class="form-check-label" style="width: 100%;" for="flexRadioDefault1">Marital
                                status:</label>
                            <input type="radio" id="single" class="form-check-label mt-2" name="maritalStatus"
                                id="flexRadioDefault1" value="Single"> Single
                            <input type="radio" id="married" name="maritalStatus" value="Married"> Married
                            <!-- <small>Error Message</small> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <div class="forminput">
                            <label for="formFile" class="form-label">Passport:</label>
                            <input class="form-control" style="width:80%;" name="passport"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                type="file" id="formFile">
                            <strong style="color:grey;">Format:- .Pdf, .Docs, .Doc, .Word</strong>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="forminput">
                            <label for="formFile" class="form-label">Visa:</label>
                            <input class="form-control" style="width:80%;" type="file" name="visa"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                id="formFile">
                            <strong style="color:grey;">Format:- .Pdf, .Docs, .Doc, .Word</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <div class="forminput">
                            <label for="formFile" class="form-label">Photograph:</label>
                            <input class="form-control" style="width:80%;" type="file" name="photo"                                id="formFile">
                            <strong style="color:grey;">Format:- .Jpeg, .Jpg, .Png, .Gif</strong>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="forminput">
                            <label for="formFile" class="form-label">Insurence/Others:</label>
                            <input class="form-control" style="width:80%;" type="file" name="insurance"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                id="formFile">
                            <strong style="color:grey;">Format:- .Pdf, .Docs, .Doc, .Word</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-6 '>
                        <div class="forminput">
                            <label>Country:</label>
                            <select id="country" name="country" class="form-select" style="width: 80%;">
                                <option value="">-- Country --</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class="forminput">
                            <label>State:</label>
                            <select id="region" name="state" class="form-select" style="width: 80%;">
                                <option value="">-- State --</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label>City:</label>
                            <select id="city" name="city" class="form-select" style="width: 80%;">
                                <option value="">-- City --</option>
                            </select>
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="forminput">
                            <label for="exampleFormControlTextarea1" class="form-label">Current Address:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" style="width: 80%;"
                                name="currentAddress" rows="3"></textarea>
                            <small>Error Message</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="forminput">
                            <label for="exampleFormControlTextarea1" class="form-label">Permanent Address:</label>
                            <textarea class="form-control" style="width: 80%;" id="exampleFormControlTextarea1"
                                name="parmanentAddress" rows="3"></textarea>
                            <small>Error Message</small>
                        </div>
                    </div>
                </div>
                <div class="button1 d-flex justify-content-end  mt-3 mb-2">
                    <div class="btn12">
                        <!-- <a href="./next.php"> <button>next</button></a> -->
                        <button class="button-22" style="margin-right: 84px," type="submit" name="submit">Next </button>
                        <!-- <ahref="./next.php"></a> -->
                        <!-- <a href="./next.php"><button class="button-22"  style="margin-right: 84px" type="submit">Next</button></a> -->
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- <script src="./validationScript/scriptValidation.js"></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./validationScript//datecountry.js"></script>
    <script src="./validationScript//datepicker.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script> -->
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