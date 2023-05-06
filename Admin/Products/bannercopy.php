
<?php
include './common/headercopy.php';

?>
<?php
include './common/aside.php';
?>

<?php

include './common/navbar.php';
?>

<!-- Button trigger modal -->
<div>
    <b>ADD YOUR BANNER</b>
       <button type="button" class="btn" style="background-color:#178e52; color:white;margin-bottom: 0px; margin-left: 17px;
" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ADD BANNER
       </button>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
         <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="mb-3">
                        <label for="bannername" class="form-label">Banner Name</label>
                        <input type="text" class="form-control" name="bannername" id="bannername" aria-describedby="bannerName">
                </div>
                <div class="mb-3">
                        <label for="bannerimage" class="form-label">Banner Image</label>
                        <input type="file" class="form-control"  name ="bannerimage" id="bannerimage" aria-describedby="bannerImage">
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="upload" class="btn btn-primary">Save</button>
                </div>
         </form>
    </div>
  </div>
</div>


<!-- ................table................ -->

<?php
include '../connection.php';
$query = "SELECT * FROM addbanner";
$query_run = mysqli_query($con, $query);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Banner Name</th>
      <th scope="col">Banner Image</th>
      <th scope="col">Edit Banner</th>
      <th scope="col">Delete Banner</th>
      <th scope="col">Banner Status</th>

    </tr>
  </thead>
  <tbody>

     <?php
if (mysqli_num_rows($query_run) > 0) {

    foreach ($query_run as $row) {
        ?>
                <tr style="border-bottom:1px solid gray;">
                    <th><?php echo $row['id']; ?></th>
                    <td><?php echo $row['bannername']; ?></td>
                    <td><img src="<?php echo "image1/" . $row['bannerimage']; ?>" width="200px" height="150px" alt="" /> </td>
                    <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn"  style="background-color:#178e52; color:white" >EDIT</a></td>
                    <td>
                      <form action="deletecode.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="delbanner_img" value="<?php echo $row['bannerimage']; ?>">
                        <button class="btn" style="background-color: red; color:white" type="submit" name="delete_banner">DELETE</button>
                      </form>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" <?php if ($row['status'] == '1') {echo "checked";}?>
                              onclick="toggleStatus(<?php echo $row['id'] ?>)"
                             type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          </td>
                </tr>


                <?php

    }

} else {
    ?>
                  <tr>
                      <td>
                          NO record available.
                      </td>
                  </tr>

              <?php
}

?>


  </tbody>
</table>
<!-- ................table end ............. -->



<script>

                function toggleStatus(id){
                        var id = id ;
                        $.ajax({
                                url:"toggle.php",
                                type:"post",
                                data:{catId:id},
                                success :function(result){
                                        if(result == '1')
                                        {
                                          swal("Done!" ,"Banner is Live" , "success");

                                        }
                                        else
                                        {
                                                swal("Done!","Banner is not Live","success");
                                        }
                                }
                        })
                }
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script></script>


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


</html>