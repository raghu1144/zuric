<!-- 
<?php

include './common/header.php';
include '../connection.php';
$name = $_SESSION['AdminLoginId'];
$sql = "Select * from admin_login where Admin_name='$name'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$namee = $row['name'];
$mobile = $row['mobile'];
$postcode = $row['postcode'];
$state = $row['state'];
$email = $row['email'];
$country = $row['country'];

?> -->


<?php

include '../../Admin//header.php';
include "../Dashboard_Summaries.php";

?>
<!-- <script src=""></script> -->

<!-- <?php

include './common/navbar.php';

?> -->
<!-- <script src="../../Admin//header.php"></script> -->




<body  class='snippet-body'>
<form action="update_profile.php" method="POST" enctype="multipart/form-data">
   <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">



        <div class="col-md-3 border-right" style="max-width: 700px;">
            <!-- <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div> -->
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-6">
                <div class="" style="margin: auto;">
                    <h4 class="text-right ">PROFILE DETAILS</h4>
                   </div>

                </div>

                <div class="row">
                  <input type="hidden" name="admin_name" value="<?php echo $name; ?>">
                   <div class="col-md-12">
                    <label class="labels" style="font-size:18px;">Name</label>
                    <input onkeydown="return /[a-z]/i.test(event.key)"  class="form-control"  name="name" value="<?php echo $namee; ?>">
                  </div>
                    <div class="col-md-12"><label class="labels" style="font-size:18px;">Mobile Number</label><input type="number" class="form-control"  name="mobile" value="<?php echo $mobile; ?>"></div>
                    <div class="col-md-12"><label class="labels" style="font-size:18px;">Country</label><input type="text" class="form-control" name="country" value="<?php echo $country ?>"></div>
                    <div class="col-md-12"><label class="labels" style="font-size:18px;">City</label><input type="text" class="form-control" name="state" value="<?php echo $state; ?>"></div>
                    <div class="col-md-12"><label class="labels" style="font-size:18px;">Postcode</label><input type="number" class="form-control" name = "postcode"  value="<?php echo $postcode; ?>"></div>
                   
                    <div class="col-md-12"><label class="labels" style="font-size:18px;">Email ID</label><input type="email" class="form-control" name="email" value="<?php echo $email; ?>"></div>
                    
                    <div class="col-md-12"><img class="rounded-circle mt-2" width="180px" height="180px" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>">
                    <input type="file" class="mt-4" name="image" id="image"></div>


                </div>

                <div class="mt-6 text-left"><button class="btn btn profile-button" name="update_profile" type="submit" style="background-color:#cd8e33; color:#fff" >Update Profile</button></div>
                </form>

            </div>
        </div>
        <!-- <div class="d-flex flex-column  text-center p-3 py-5" style="margin-left: 357px;"><img class="rounded-circle" width="180px" height="180px" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"><span class="font-weight-bold"></span><span class="text-black-50"></span><input type="file" name="image" id="image" style="margin-left: 20px; margin-top: 25px"></div> -->
        </div>
    </div>
</div>
</div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
                                </body>

  <!--   Core JS Files   -->
  <script src='../Products/Edit_product/popper.min.js'></script>
  <script src='../Products/Edit_product/bootstrap.min.js'></script>
  <script src='../Products/Edit_product/perfect-scrollbar.min.js'></script>
  <script src='../Products/Edit_product/smooth-scrollbar.min.js'></script>
  <!-- Kanban scripts -->
  <script src='../Products/Edit_product/dragula.min.js'></script>
  <script src='../Products/Edit_product/jkanban.js'></script>
  <script src='../Products/Edit_product/datatables.js'></script>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
  <script>
    const dataTableSearch = new simpleDatatables.DataTable('#datatable-search', {
      searchable: true,
      fixedHeight: false
    });

    document.querySelectorAll('.export').forEach(function(el) {
      el.addEventListener('click', function(e) {
        var type = el.dataset.type;

        var data = {
          type: type,
          filename: 'material-' + type,
        };

        if (type === 'csv') {
          data.columnDelimiter = '|';
        }

        dataTableSearch.export(data);
      });
    });
  </script>
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
  <script async defer src='https://buttons.github.io/buttons.js'></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src='../Products/Edit_product/material-dashboard.min.js'></script>
  <script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat :"dd/mm/yy"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat : "dd/mm/yy"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
  </script>
   <?php
// if(isset($_POST['Logout']))
// {
//     session_destroy();
//     echo
//     "
//     <script>
//     window.location.href = '../admin_login.php';
//     </script>

//     ";

// }
?>
</body>

</html>