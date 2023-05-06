<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

    body {
        font-family: 'Abel', sans-serif;

    }

    .ImageBox {
        display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    }

    /* .cont {
            margin-top: 8rem;
        } */

    .btn {
        margin-top: 6px;
        padding: 5px 40px;
        background-color: #cd8e33 !important;
    }

    .form-control:focus {
        border-color: #CD8E33 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(192, 136, 58, 0.6) !important;
    }



    .first,
    .second,
    .third {
        width: 70%;
        margin-left: 55px;

    }

    .first {
        margin-top: 4px;

    }

    .btn1 {
        display: flex;
        justify-content: center;
    }


    #Update {
        display: none;
    }

    .update {
        display: none;
    }

    .box {
        display: flex;
        justify-content: center;
        align-items: center;

    
    }
    .btn,.btn-primary:hover{
        box-shadow:none;
        outline:none !important;

    }
    .md8{
        transform: translateX(-25px);
    }

    .box1 {
        width: 50px;
        height: 50px;
        /* border: 1px solid black; */
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 10px;
    }
    .popupinsidebtn{
        border: 1px solid;
    padding: 5px 13px;
    }
    .uploadimg{
        margin-left: 6rem;
        margin-top: 17px;
    }
    </style>
</head>

<body>
    <hr>
    <div class="container">
        <!-- <div class="heading">
            <div class="data">
                <h2>EMPLOYEE DATA</h2>
            </div>
        </div> -->
        <?php
        include './connection.php';
        $empId = $_POST['emp_id'];
        $sql = "SELECT * FROM employee e
            INNER JOIN passport_details pd
            ON e.employee_id = pd.user_id
            INNER JOIN address a
            ON e.employee_id = a.user_id
            WHERE e.employee_id = '$empId'";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <form action="updateEmployeeProfile.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="contents">
                        <div class="ImageBox">
                            <?php 
                            if($data['profile_pic']) {
                                $final_file = $data['profile_pic'];
                                $imgData = base64_encode(file_get_contents("./employeeImages/".$final_file));
                                $src = 'data: '.mime_content_type('./employeeImages').';base64,'.$imgData;
                                ?>  
                                <?php echo '<img class="rounded-circle mt-2" width="150" height="150" src="'.$src.'" alt="image not found" >' ?>
                                <input type="file" class="uploadimg" name="image" id="image">
                                <input type="hidden" class="mt-4" name="image_old" id="image" value="<?php echo $final_file; ?>"> 
                                <?php
                            } else {
                                echo '<img src="" alt="image not found" width="200px" height="200px">';
                            }
                            ?>
                            
                            <!-- <img src="./assets//img//team-2.jpg" height="200px" width="200px"> -->
                        </div>
                        <div class="first">
                            <div class="cont">
                                <label for="EMPID" class="form-label">Employe ID</label>
                                <input type="text" class="form-control" name="eId" value="<?php echo $data['employee_id'] ?>" id="EMPID" readonly>
                            </div>
                        </div>
                        <div class="second">
                            <div class="cont">
                                <label for="NAME" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $data['first_name'];
                                echo " "; echo $data['last_name'] ?>" id="NAME" readonly>
                            </div>
                        </div>
                        <div class="third">
                            <div class="cont">
                                <label for="Designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation" value="<?php echo $data['designation'] ?>" width="100%" id="Designation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 md8">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>" id="exampleInputEmail1">
                        </div>
                        <div class="col-md-4">
                            <label for="Designation" class="form-label">Mobile</label>
                            <input type="text" maxlength="10" class="form-control" name="mobile" value="<?php echo $data['mobile'] ?>" width="100%" id="Designation">
                        </div>
                        <div class="col-md-4">
                            <label for="Designation" class="form-label">Salary</label>
                            <input type="text" class="form-control" name="salary" value="<?php echo $data['salary'] ?>" width="100%" id="Designation">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="formFile" class="form-label">Visa:</label>
                            <input class="form-control" style="width:100%;" name="visa" 
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                type="file" id="formFile">
                            <input type="hidden" class="mt-4" name="visa_old" id="image" value="<?php echo $data['visa'] ?>">    
                        </div>
                        <div class="col-md-4">
                            <label for="formFile" class="form-label">Passport:</label>
                            <input class="form-control" style="width:100%;" name="passport"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel," type="file" id="formFile">
                            <input type="hidden" class="mt-4" name="passport_old" id="image" value="<?php echo $data['passport'] ?>">    
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="formFile" class="form-label">Emirates :</label>
                            <input class="form-control" style="width:100%;" name="emirates" value="<?php ?>"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                type="file" id="formFile">
                        </div> -->
                        <div class="col-md-4">
                            <label for="formFile" class="form-label">Insurence:</label>
                            <input class="form-control" style="width:100%;" name="insurance"
                                accept=".doc,.docx,application/pdf,application/msword, application/vnd.ms-excel,"
                                type="file" id="formFile">
                            <input type="hidden" class="mt-4" name="insurance_old" id="image" value="<?php echo $data['insurance'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <label for="passportNum" class="form-label">PassPort Number</label>
                            <input type="text" class="form-control" id="passportNum" name="passport_number" value="<?php echo $data['passport_number'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="VisaNum" class="form-label">Visa Number</label>
                            <input type="text" class="form-control" id="VisaNum" name="visa_number" value="<?php echo $data['visa_number'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="EmiriID" class="form-label">Emirates Id Number</label>
                            <input type="text" class="form-control" id="EmiriID" name="emirates_id" value="<?php echo $data['emirates_number'] ?>">
                        </div>
                    </div>
                    <div class="row">
                       
                        <!-- <div class="col-md-4">
                            <label for="InsurenNum" class="form-label">Insurence Number:</label>
                            <input type="text" class="form-control" id="InsurenNum" name="insurance_number" value="<?php echo $data['insurance_expairy'] ?>">
                        </div> -->
                        <div class="col-md-4">
                        
                        <label for="VisaEXP" class="form-label">Visa Expiry</label>
                        <input type="text" class="form-control" id="Visa_expire" name="visa_expairy" value="<?php echo $data['visa_expairy'] ?>">
                    </div>
                    <div class="col-md-4">
                       
                        <label for="EmIDExp" class="form-label">Emirates Id Expiry:</label>
                        <input type="text" class="form-control" id="EmIDExp" name="emirates_expairy" value="<?php echo $data['emirates_expairy'] ?>">
                    </div>
                        <div class="col-md-4">
                                                   
                            <label for="PassportEXp" class="form-label">PassPort Expiry</label>
                            <input type="text" class="form-control" id="PassportEXP" name="passport_expairy" value="<?php echo $data['passport_expairy'] ?>">
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-md-4">
                            <label for="INSEXP" class="form-label">Insurence Expiry:</label>
                            <input type="text" class="form-control" id="INSEXP" name="insurance_expairy" value="<?php echo $data['insurance_expairy'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="Designation" class="form-label">Address</label>
                            <input type="text" class="form-control" width="100%" id="Designation" name="address" value="<?php echo $data['address'] ?>">
                        </div>
                        <div class="col-md-4">
                            
                            <label for="PP" class="form-label">Status:</label>
                            <input type="text" class="form-control" id="PP" name="period" value="<?php echo $data['probation_period'] ?>">
                        </div>
                    </div>
                    <div class="row">
                       
                      
                        <div class="col-md-4">
                            <label for="myselect" class="form-label">Action:</label>
                            <select class="form-select" id="myselect">
                                <option selected>Select</option>
                                <option value="secondoption" id="probation">Probation Period</option>
                                <option value="2" id="probation">Working</option>
                                <option value="secondoption2" id="probation">Notice Period</option>
                                <option value="secondoption3" id="probation">Resign</option>
                                <option value="secondoption4" id="probation">Absconding</option>
                            </select>
                        </div>
                        <div class="col-md-4 ">
                    <div class="btn1 mt-4">
                        <input type='hidden' name="emp_id" value="<?php echo $data['employee_id'] ?>">
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                        <!-- <button type="submit" name="submit" id="Update" class="btn btn-primary update">Update</button> -->
                    </div>
                </div>
                    </div>
                </div>
            </div>
            <div class="row">
               
            </div>
        </form>
    </div>
    <!-- Modal-1 -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Probation Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please Select Days</p>
                    <!-- <strong>This will Automatically add to Your Provavtion period</strong> -->
                    <div class="box d-flex">
                        <div class="box1"><button id="btn1" value="30" class="probationPeriod">30</button></div>
                        <div class="box1"><button id="btn1" value="60" class="probationPeriod">60</button></div>
                        <div class="box1"><button id="btn1" value="120" class="probationPeriod">120</button></div>
                        <div class="box1"><button id="btn1" value="180" class="probationPeriod">180</button></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><label for="tbuser">Notice Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><label for="tbuser">Please Select Days</label></p>
                    <!-- <strong>This will Automatically add to Your Provavtion period</strong> -->
                    <div class="box d-flex">
                        <div class="box1"><button id="btn1" class="popupinsidebtn" value="15">15</button></div>
                        <div class="box1"><button id="btn1" class="popupinsidebtn" value="30">30</button></div>
                        <div class="box1"><button id="btn1" class="popupinsidebtn" value="45">45</button></div>
                        <div class="box1"><button id="btn1" class="popupinsidebtn" value="60">60</button></div>
                        <div class="box1"><button id="btn1" class="popupinsidebtn" value="90">90</button></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-3-->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please Select Date</p>
                    <!-- <strong>This will Automatically add to Your Provavtion period</strong> -->
                    <div class="boxdate">
                        <input type="text" style="width: 100%;" id="datepicker1" class="fromdate form-control"
                            placeholder="DD/MM/YYYY"/>
                        <!-- <i class="fa-solid fa-calendar-days"></i> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-4-->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Absconding</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please Select Date</p>
                    <!-- <strong>This will Automatically add to Your Provavtion period</strong> -->
                    <div class="boxdate">
                        <input type="text" style="width: 100%;" id="datepicker" class="fromdate form-control"
                            placeholder="DD/MM/YYYY"/>
                        <!-- <i class="fa-solid fa-calendar-days"></i> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        $("#datepicker").datepicker();
    });

    $(function() {
        $("#datepicker1").datepicker();
    });


    $('#myselect').change(function() {
        var opval = $(this).val();
        if (opval == "secondoption") {
            $('#exampleModal').modal("show");
        }
    });
    $('#myselect').change(function() {
        var opval = $(this).val();
        if (opval == "secondoption2") {
            $('#exampleModal2').modal("show");
        }
    });
    $('#myselect').change(function() {
        var opval = $(this).val();
        if (opval == "secondoption3") {
            $('#exampleModal3').modal("show");
        }
    });
    $('#myselect').change(function() {
        var opval = $(this).val();
        if (opval == "secondoption4") {
            $('#exampleModal4').modal("show");
        }
    });

    // $('input,select').attr('disabled', true);
    // $('#Edit').on('click', function(e) {
    //     e.preventDefault();
    //     $('input').attr('disabled', false);
    //     $('select').attr('disabled', false);
    //     $("#EMPID").attr('disabled', true)
    //     $("#NAME").attr('disabled', true)
    //     $(this).hide(0);
    //     $('#Update').show(0);

    // })

    // $('#Update').on('click', function(e) {
    //     e.preventDefault();
    //     $('input').attr('disabled', true);
    //     $('select').attr('disabled', true);
    //     $("#NAME").attr('disabled', true)
    //     $(this).hide(0);
    //     $('#Edit').show(0);

    // })
    </script>
    
    <script>
        $(document).ready(function() {
            $(".popupinsidebtn").on("click", form_new_receipt); 
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = dd + '/' + mm + '/' + yyyy;
        function form_new_receipt() {
            $out1 = parseInt($(this).val(), 10);
            var future = new Date();
            future.setDate(future.getDate() + $out1);
            var finalDate = future.getDate() +'/'+ ((future.getMonth() + 1) < 10 ? '0' : '') + (future.getMonth() + 1)+ '/'+ future.getFullYear();
            document.getElementById('PP').value = "Notice Period "+ $out1 +" Days from "+today+' '+" to "+finalDate;
        }
        });

        $(document).ready(function() {
            $(".probationPeriod").on("click", form_new_receipt);
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = dd + '/' + mm + '/' + yyyy;
            function form_new_receipt() {
                // $out2 = $(this).val();
                $out2 = parseInt($(this).val(), 10);
                var future = new Date();
                future.setDate(future.getDate() + $out2);
                var finalDate = future.getDate() +'/'+ ((future.getMonth() + 1) < 10 ? '0' : '') + (future.getMonth() + 1)+ '/'+ future.getFullYear();
                document.getElementById('PP').value = "Probation Period "+ $out2 +" Days from " +today+' '+" to "+ finalDate;
            }
        });

        $(document).ready(function() {
            $("#datepicker1").on("change", form_new_receipt);
            function form_new_receipt() {
                $status = "Resign";
                $out3 = $(this).val();
                document.getElementById('PP').value = $status+' '+$out3;
            }
        });

        $(document).ready(function() {
            $("#datepicker").on("change", form_new_receipt1);
            function form_new_receipt1() {
                $status1 = "Absconding";
                $out4 = $(this).val();
                document.getElementById('PP').value = "Absconding"+" "+$out4;
            }
        });

    </script>
    <!-- <script>
        function func() {
            const btn1 = document.getElementById('btn1');
            const out1 = document.getElementById('PP');
            function fun() {
                out1.innerHTML = txt1.value;
            }
            document.getElementById('btn1').addEventListener('click', fun1);
        }
        $(document).ready(function() {
  // Do your event binding in JavaScript, not as inline HTML event attributes:
  $("#processReceipt").on("click", form_new_receipt);
  function form_new_receipt() {
    alert('before function');
  }
});
    </script> -->

    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./validationScript/Dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>