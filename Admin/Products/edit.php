


<?php
include './common/headercopy.php';

?>
<?php
include './common/aside.php';
?>

<?php

include './common/navbar.php';
?>



<!-- ......form .......................   -->
<div>
   <?php
include '../connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM addbanner WHERE id='$id'";
$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        ?>
                 <form action="editcode.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" name="banner_id" value="<?php echo $row['id']; ?>"/>
                <div class="mb-3">
                        <label for="bannername" class="form-label">Banner Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['bannername']; ?>" name="bannername" id="bannername" aria-describedby="bannerName">
                </div>
                <div class="mb-3">
                        <label for="bannerimage" class="form-label">Banner Image</label>
                        <input type="file" class="form-control"  name ="bannerimage" id="bannerimage" aria-describedby="bannerImage">
                        <input type="hidden" value="<?php echo $row['bannerimage']; ?>" name ="bannerimageold">
                </div>
                <img src="<?php echo "image1/" . $row['bannerimage'] ?>" width="200px" height="100px" alt="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn" style="background-color:#178e52; color:white">UPDATE</button>
                </div>

               </form>

           <?php
}

} else {

    echo "No record available";
}

?>





</div>



  <!--   Core JS Files   -->
  <script src='../Products/Edit_product/popper.min.js'></script>
  <script src='../Products/Edit_product/bootstrap.min.js'></script>
  <script src='../Products/Edit_product/perfect-scrollbar.min.js'></script>
  <script src='../Products/Edit_product/smooth-scrollbar.min.js'></script>
  <!-- Kanban scripts -->
  <script src='../Products/Edit_product/dragula.min.js'></script>
  <script src='../Products/Edit_product/jkanban.js'></script>
  <script src='../Products/Edit_product/datatables.js'></script>
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
include './common/scripts.php'
?>
</body>

</html>