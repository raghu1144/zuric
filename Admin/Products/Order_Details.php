<?php

include './common/header.php';

?>
<?php

include './common/aside.php';

?>
<?php

include './common/navbar.php';

?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card mb-4">
            <div class="card-header p-3 pb-0">
              <div class="d-flex justify-content-between align-items-center">
                <div class="w-50">
                  <h6>Order Details</h6>
                  <p class="text-sm mb-0">
                    <?php
                    // if(isset($_POST('sumbit'))) {

                    // }
                    ?>
                    Order no. <b>PRIMO00<?php echo $_POST['services_id'] ?></b> from <b><?php echo $_POST['created_date'] ?></b>
                  </p>
                </div>
                <!-- <a href="javascript:;" class="btn bg-gradient-dark ms-auto mb-0">Invoice</a> -->
              </div>
            </div>

               <div class='card-body p-3 pt-0'>
              <hr class='horizontal dark mt-0 mb-4'>
              <div class='row'>
                <div>
                <?php
                $services_id = $_POST['services_id'];
                $created_date = $_POST['created_date'];
                $query = "SELECT * 
                  FROM user u
                  INNER JOIN user_xref ux
                  ON u.user_id = ux.user_id
                  INNER JOIN register_details rd
                  ON ux.pk_value = rd.register_details_id
                  INNER JOIN services s
                  ON u.user_id = s.services_id
                  INNER JOIN address a
                  ON u.user_id = a.user_id
                  WHERE services_id = '$services_id'";
                  $result = mysqli_query($con, $query);
                  $user_fetch = mysqli_fetch_assoc($result);
                  $order_query = "SELECT user_order_id,item_name, price*quantity as total_price,quantity,color,email  FROM `user_order` WHERE `user_Id` ='$services_id'";
                  $order_result = mysqli_query($con, $order_query);

                  while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                  if ($order_['color'] == 'Green' || $order_fetch['color'] == 'verde') {
                     $src = '../images/22.png';
                  } else {
                    $src = '../images/11.png';
                  }
                  echo "

                  <div class='d-flex'>
                    <div>

                      <img src='$src' class='avatar me-3'  style='width:154px;height: 100px;'
                       alt='product image'>

                    </div>
                    <div style='line-height:1.2rem' class='mb-4'>
                      <h6 class='text-sm '>$order_fetch[item_name]</h6>
                      <div style='display:flex;justify-content: space-around; width:100%'> <h6 class='text-sm '>Color : $order_fetch[color] </h6>
                      <h6 class='text-sm ' style= 'margin:0 25px'>Quantity : $order_fetch[quantity]</h6>
                      <h6 class='text-sm '> Total Price : $order_fetch[total_price]</h6> </div>
                      <h6 class='text-sm '> Expected delivery date : $user_fetch[created_date]</h6>
                      <span class='badge badge-sm bg-gradient-success'>$user_fetch[status]</span>
                    </div>
                  </div>
                  ";
                }
                ?>
                </div>

              </div>
              <div style="text-align: center;">
                  <a href='#billing' class='btn bg-gradient-dark btn-lg mb-0'>Contact</a>
                </div>
              <hr class='horizontal dark mt-4 mb-4'>
              <div class='row'>
                <div class='col-lg-3 col-md-6 col-12'>
                  <h6 class='mb-3'> Order Status</h6>
                  <div >
                  <div >
                   <h6 class='text-dark text-sm font-weight-bold mb-3'><?php echo $user_fetch['status'] ?></h6>
                    <form action='order_status.php' method='post'>
                    <input type='hidden' id='input_id'  name='input_id' class="mt-2" value='<?php echo $services_id; ?>'>
                    <select class='custom-select' name='input_select' required>
                    <option selected disabled>Select</option>
                    <option value='In transit'>In transit</option>
                    <option value='Delivered'>Delivered</option>
                    <option value='Cancelled'>Cancelled</option>
                    <option value='Dispute'>Dispute</option>
                    </select>

                    <?php
                      $status = $user_fetch['status'];
                      if ($status == 'Cancelled' || $status == 'cancelada') {
                          echo "<button href='javascript:;'  name='order_status_update' class='btn bg-gradient-dark btn-sm mb-0 mt-3' disabled >UPDATE</button>";
                      } else {
                          echo " <button href='javascript:;' type='submit' name='order_status_update' class='btn bg-gradient-dark btn-sm mb-0 mt-3'>UPDATE</button>";
                      }
                      ?>


                    </form>
                      </div>

                  </div>
                </div>
                <div class='col-lg-5 col-md-6 col-12'>
                  <h6 class='mb-3'>Payment details</h6>
                  <div class='card card-body border card-plain border-radius-lg d-flex align-items-center flex-row'>
                    <!-- <img class='w-10 me-3 mb-0' src='../Products/Edit_product/mastercard.png' alt='logo'> -->
                    <!-- <h6 class='mb-0'>****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6> -->
                    <!-- <button type='button' class='btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto' data-bs-toggle='tooltip' data-bs-placement='bottom' title='' data-bs-original-title='We do not store card details'> -->
                      <!-- <i class='material-icons text-sm' aria-hidden='true'>priority_high</i> -->
                    <!-- </button> -->
                    <h6> Cash On Delivery</h6>
                  </div>
                  <h6 class='mb-3 mt-4'>Billing / Shipping Information</h6>
                  <ul class='list-group'>
                    <li class='list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg'>
                      <div id='billing' class='d-flex flex-column'>
                        <h6 class='mb-3 text-sm'><?php echo $user_fetch['person_name'] ?></h6>
                        <span class='mb-2 text-xs'>Address: <span class='text-dark font-weight-bold ms-2'><?php echo $user_fetch['address'] ?>, <?php echo $user_fetch['parmanent_address'] ?>,
                        <?php echo $user_fetch['city'] ?>, <?php echo $user_fetch['state'] ?>, <?php echo $user_fetch['country'] ?>, <?php echo $user_fetch['zip_code'] ?></span></span>
                        <span class='mb-2 text-xs'>Email Address: <span class='text-dark ms-2 font-weight-bold'><a href='#' class='__cf_email__' data-cfemail='2f404346594a5d6f4d5a5d5d465b40014c4042'><?php echo $user_fetch['email'] ?></a></span></span>
                        <span class='text-xs'>Phone: <span class='text-dark ms-2 font-weight-bold'><?php echo $user_fetch['mobile'] ?></span></span>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class='col-lg-4 col-12 '>
                  <h6 class='mb-3'>Order Summary</h6>
                  <div class='d-flex justify-content-between'>
                    <span class='mb-2 text-sm'>
                      Product Price:
                    </span>
                    <span class='text-dark font-weight-bold ms-2'>$ <?php echo $user_fetch['services_id'] ?>.00</span>
                  </div>
                  <div class='d-flex justify-content-between'>
                    <span class='mb-2 text-sm'>
                      Delivery:
                    </span>
                    <span class='text-dark ms-2 font-weight-bold'>$00.00</span>
                  </div>
                  <div class='d-flex justify-content-between'>
                    <span class='text-sm'>
                      Taxes:
                    </span>
                    <span class='text-dark ms-2 font-weight-bold'>$00.00</span>
                  </div>
                  <div class='d-flex justify-content-between mt-4'>
                    <span class='mb-2 text-lg'>
                      Total:
                    </span>
                    <span class='text-dark text-lg ms-2 font-weight-bold'>$ <?php echo $user_fetch['services_id'] ?>.00</span>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

      <?php

include './common/footer.php';

?>
<?php

include './common/scripts.php';

?>
