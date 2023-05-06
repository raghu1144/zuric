<?php
include './common/headercopy.php';

?>
<?php
include './common/aside.php';
?>

<?php

include './common/navbar.php';
?>



    <!-- End Navbar -->
    <div class='container-fluid py-4'>
      <div class='d-sm-flex justify-content-between'>
        <div>
          <a href='./New_order.php' class='btn btn-icon bg-gradient-primary'>
            New order
          </a>
        </div>
        <div class='d-flex'>
          <div class='dropdown d-inline'>
            <!-- <a href='javascript:;' class='btn btn-outline-dark dropdown-toggle ' data-bs-toggle='dropdown' id='navbarDropdownMenuLink2'>
              Filters
            </a>
            <ul class='dropdown-menu dropdown-menu-lg-start px-2 py-3' aria-labelledby='navbarDropdownMenuLink2' data-popper-placement='left-start'> -->
              <!-- <li><a class='dropdown-item border-radius-md' href='javascript:;'>Status: Paid</a></li>
              <li><a class='dropdown-item border-radius-md' href='javascript:;'>Status: Refunded</a></li>
              <li><a class='dropdown-item border-radius-md' href='javascript:;'>Status: Canceled</a></li>
              <li> -->
                <!-- <hr class='horizontal dark my-2'>
              </li>
              <li><a class='dropdown-item border-radius-md text-danger' href='javascript:;'>Remove Filter</a></li> -->
            <!-- </ul> -->
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h5 class='mb-0'>Orders Table</h5>

            </div>
            <div>
              <form method="POST">
                 <label for="from">From</label>
                <input type="text" id="from" name="from" required value="<?php echo $fromDate ?>">
                <label for="to">to</label>
                <input type="text" id="to" name="to" required value="<?php echo $toDate ?>">
                <input type="submit" name="submit" value="Filter">
              </form>
            </div>
            <div>

            </div>

            <div class='table-responsive'>
              <table class='table table-flush' id='datatable-search'>
                <thead class='thead-light'>
                  <tr>
                    <th>Order Id</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Order Details</th>
                   </tr>
                </thead>
                <tbody>
                <?php
                  $query = "SELECT * 
                  FROM user u
                  INNER JOIN user_xref ux
                  ON u.user_id = ux.user_id
                  INNER JOIN register_details rd
                  ON ux.pk_value = rd.register_details_id
                  INNER JOIN services s
                  ON u.user_id = s.services_id";
                  $result = mysqli_query($con, $query);
                  while ($user = mysqli_fetch_assoc($result)) {
                  echo "
                  <tr>
                    <td>
                      <div class='d-flex align-items-center'>
                        <p class='text-xs font-weight-normal ms-2 mb-0'>$user[services_id]</p>
                      </div>
                    </td>
                    <td class='font-weight-normal'>
                      <span class='my-2 text-xs'>$user[created_date]</span>
                    </td>
                    <td class='text-xs font-weight-normal'>
                      <div class='d-flex align-items-center'>
                        <span>$user[mobile]</span>
                      </div>
                    </td>
                    <td class='text-xs font-weight-normal'>
                      <div class='d-flex align-items-center'>

                        <span>$user[person_name]</span>
                      </div>
                    </td>
                    <td class='text-xs font-weight-normal'>
                    <select class='custom-select' name='input_select' required>
                    <option selected disabled>Select</option>
                    <option value='In transit'>In transit</option>
                    <option value='Delivered'>Delivered</option>
                    <option value='Cancelled'>Cancelled</option>
                    <option value='Dispute'>Dispute</option>
                    </select>
                      <span>$user[status]</span>
                    </div>
                  </td>
                    <td>
                   <form action='./Order_Details.php' method='POST'>
                   <input type='hidden' name='services_id' value='$user[services_id]'>
                   <input type='hidden' name='created_date' value='$user[created_date]'>
                   <button class='btn btn-sm btn-success mt-1' name='order_status_update' type='submit'>View</button>
                   </form>
                    </td>
                  </tr>
                  ";}
?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- <footer class='footer py-4  '>
        <div class='container-fluid'>
          <div class='row align-items-center justify-content-lg-between'>
            <div class='col-lg-6 mb-lg-0 mb-4'>
              <div class='copyright text-center text-sm text-muted text-lg-start'>
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class='fa fa-heart'></i> by
                <a href='https://www.creative-tim.com' class='font-weight-bold' target='_blank'>Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class='col-lg-6'>
              <ul class='nav nav-footer justify-content-center justify-content-lg-end'>
                <li class='nav-item'>
                  <a href='https://www.creative-tim.com' class='nav-link text-muted' target='_blank'>Creative Tim</a>
                </li>
                <li class='nav-item'>
                  <a href='https://www.creative-tim.com/presentation' class='nav-link text-muted' target='_blank'>About Us</a>
                </li>
                <li class='nav-item'>
                  <a href='https://www.creative-tim.com/blog' class='nav-link text-muted' target='_blank'>Blog</a>
                </li>
                <li class='nav-item'>
                  <a href='https://www.creative-tim.com/license' class='nav-link pe-0 text-muted' target='_blank'>License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
    </div>
  </main>

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