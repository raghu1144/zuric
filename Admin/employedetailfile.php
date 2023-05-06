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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">



    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    body {
        font-family: 'Abel', sans-serif;

    }

    .atag {
        text-decoration: none;
        color: white;
    }

    .atag:hover {
        color: white;
        text-decoration: none;
    }

    .btn-color {
        background-color: #cd8e33;
    }

    .btn-color:hover {
        background-color: #cd8e33;
        color: white;
    }
    .btn:focus{
       box-shadow:none !important;
    }



    .btn {
        margin: 0;
        color: #fff
    }

    table,
    th,
    td {

        padding: 5px 13px;
        text-align: center;
    }
    </style>

</head>

<body>
    <section style="padding: 3px 15px;  font-family: 'Abel', sans-serif">
        <div class="heading">
            <h4 style="margin-left: 13px; font-weight: bold;">Employee Details</h4>
        </div>
        <hr>
        <div class="container" style="max-width: 900px; margin:auto">
            <div class="row">
                <table id="employee_table" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th> Emp Id</th>
                            <th>Employee Name</th>
                            <th>Mobile</th>
                            <th>Designation</th>
                            <th>D.O.J</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sl = 0;
                    include './connection.php';
                    $sql = "SELECT * FROM employee e
                    INNER JOIN passport_details pd
                    ON e.employee_id = pd.user_id
                    INNER JOIN address a
                    ON e.employee_id = a.user_id
                    ORDER BY e.employee_id DESC";
                    $result = mysqli_query($con, $sql);
                    while($user = mysqli_fetch_array($result)) {                               
                        $sl++;         
                    ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $user['employee_id']; ?></td>
                            <td><?php echo $user['first_name']; echo " "; echo $user['last_name'] ?></td>
                            <td><?php echo $user['mobile']; ?></td>
                            <td><?php echo $user['designation']; ?></td>
                            <td><?php echo $user['dob']; ?></td>
                            <td><?php echo $user['salary']; ?></td>
                            <td>
                                <form action='./employeDetails.php' method='POST'>
                                    <input type='hidden' name="emp_id" value="<?php echo $user['employee_id'] ?>">
                                    <button class="ViewButton btn btn-color" name='empId' type="submit">View</button>
                                    <!-- <a href="./orderViewFile.php"><button class="ViewButton" name='order_status_update' type='submit'>View</button></a></td> -->
                                </form>
                            </td>
                            <?php 
                            } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="./assets/js/core/popper.min.js"></script> -->
    <!-- <script src="./validationScript//datepicker.js"></script> -->
    <!-- <script src="./assets/js/core/bootstrap.min.js"></script> -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- <script src="./assets/js/plugins/chartjs.min.js"></script> -->


    <!-- bootsttap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#employee_table').DataTable();
        });
    </script>


</body>

</html>