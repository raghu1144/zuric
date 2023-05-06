<?php


include '../connection.php';
$name = $_SESSION['AdminLoginId'];
$sql = "SELECT * FROM user WHERE email='$name'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
// $namee = $row['name'];
// $mobile = $row['mobile'];
// $postcode = $row['postcode'];
// $state = $row['state'];
// $email = $row['email'];
// $country = $row['country'];

?>

<body class='g-sidenav-show  bg-gray-200'>
  
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <aside class='sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark' id='sidenav-main'>
    <div class='sidenav-header'>
      <i class='fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none' aria-hidden='true' id='iconSidenav'></i>
      <a class='navbar-brand m-0' href='#'>
        <img src='../Products/Edit_product/logo-ct.png' class='navbar-brand-img h-100' alt='main_logo'/>
        <span class='ms-1 font-weight-bold text-white'><span>Admin Panel</span>
      </a>
    </div>
    <hr class='horizontal light mt-0 mb-2'>
    <div class='collapse navbar-collapse  w-auto h-auto' id='sidenav-collapse-main'>
      <ul class='navbar-nav'>
        <li class='nav-item mb-2 mt-0'>
          <!-- <a  href='#ProfileNav' class='nav-link text-white' aria-controls='ProfileNav' role='button' aria-expanded='false'> -->
            <img src= "data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class='avatar' style="margin-left: 25px;">
            <span class="ms-1 font-weight-bold text-white" style="margin-bottom: 10px;"> <?php echo $_SESSION['AdminLoginId']; ?></span>
            </li>
            <!-- <span class='nav-link-text ms-2 ps-1'>Brooklyn Alice</span> -->
          <!-- </a> -->
          <!-- <div class='collapse' id='ProfileNav' >
            <ul class='nav '>
              <li class='nav-item'>
                <a class='nav-link text-white' href='../../../pages/pages/profile/overview.html'>
                  <span class='sidenav-mini-icon'> MP </span>
                  <span class='sidenav-normal  ms-3  ps-1'> My Profile </span>
                </a>
              </li>
              <li class='nav-item'>
                <a class='nav-link text-white ' href='../../../pages/pages/account/settings.html'>
                  <span class='sidenav-mini-icon'> S </span>
                  <span class='sidenav-normal  ms-3  ps-1'> Settings </span>
                </a>
              </li>
              <li class='nav-item'>
              <form method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
                <button type="submit" name="Logout">Logout</button>
               </form>
              </li>
            </ul>
          </div> -->

        <hr class="horizontal light mt-0">
         <P style="margin-left: 10px; color:#fff; margin-top: 20px;">MAIN NAVIGATION </P>
        <li class="nav-item active">
          <a href="../index.php" class="nav-link text-white collapsed active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
          <img src="./image/dashboard svg.svg" alt="" width="25px;" height="20px">
            <span class="nav-link-text ms-2 ps-1 active">Dashboards</span>
          </a>
          </li>
          
          <div class='collapse  show ' id='ecommerceExamples'>
            <ul class='nav '>
              <li class='nav-item '>
                <a class='nav-link text-white ' data-bs-toggle='collapse' aria-expanded='false' href='#productsExample'>
                <img src="./image/products svg.svg" alt="" width="25px;" height="20px">
                  <span class='sidenav-normal  ms-2  ps-1'> Products <b class='caret'></b></span>
                </a>
                <div class='collapse ' id='productsExample'>
                  <ul class='nav nav-sm flex-column'>
                    <li class='nav-item'>
                      <a class='nav-link text-white ' href='../Products/NewProduct.php'>
                        <span class='sidenav-mini-icon'> N </span>
                        <span class='sidenav-normal  ms-2  ps-1'> New Product </span>
                      </a>
                    </li>
                    <!-- <li class='nav-item'>
                      <a class='nav-link text-white ' href='../../../pages/ecommerce/products/edit-product.html'>
                        <span class='sidenav-mini-icon'> E </span>
                        <span class='sidenav-normal  ms-2  ps-1'> Edit Product </span>
                      </a>
                    </li> -->

                    <li class='nav-item'>
                      <a class='nav-link text-white ' href="../Products/Product_List.php">
                        <span class='sidenav-mini-icon'> P </span>
                        <span class='sidenav-normal  ms-2  ps-1'> Products List </span>
                      </a>
                    </li>
                  </ul>
                </div>
              <!-- </li> -->
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                <img src="./image/order icon svg.svg" alt="" width="25px;" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1">Orders  <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/Order_List.php">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                      </a>
                    </li>
              <!-- <li class='nav-item '>
                <a class='nav-link text-white ' href='../../../pages/ecommerce/referral.html'>
                  <span class='sidenav-mini-icon'> R </span>
                  <span class='sidenav-normal  ms-2  ps-1'> Referral </span>
                </a>
              </li> -->
            </ul>
          </div>
        </li>
         <!-- <li class='nav-item'>
          <a data-bs-toggle='collapse' href='#authExamples' class='nav-link text-white ' aria-controls='authExamples' role='button' aria-expanded='false'>
            <i class='material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}'>content_paste</i>
            <span class='nav-link-text ms-2 ps-1'>Authentication</span>
          </a> -->
          <!-- <div class='collapse ' id='authExamples'>
            <ul class='nav '> -->
              <li class='nav-item '>
                <a class='nav-link text-white ' data-bs-toggle='collapse' aria-expanded='false' href='#signinExample'>
                <img src="./image/customers svg.svg" alt="" width="25px;" height="20px">
                  <span class='sidenav-normal  ms-2  ps-1'> Customers <b class='caret'></b></span>
                </a>
                <div class='collapse ' id='signinExample'>
                  <ul class='nav nav-sm flex-column'>
                    <li class='nav-item'>
                      <a class='nav-link text-white ' href='../Products/NewCustomer.php'>
                        <span class='sidenav-mini-icon'> C </span>
                        <span class='sidenav-normal  ms-2  ps-1'>  Customers </span>
                      </a>
                    </li>
                    <!-- <li class='nav-item'>
                      <a class='nav-link text-white ' href='../../../pages/authentication/signin/basic.html'>
                        <span class='sidenav-mini-icon'> F </span>
                        <span class='sidenav-normal  ms-2  ps-1'> Feedback </span>
                      </a>
                    </li> -->
                    <!-- <li class='nav-item'>
                      <a class='nav-link text-white ' href='../../../pages/authentication/signin/cover.html'>
                        <span class='sidenav-mini-icon'> C </span>
                        <span class='sidenav-normal  ms-2  ps-1'> Cover </span>
                      </a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link text-white ' href='../../../pages/authentication/signin/illustration.html'>
                        <span class='sidenav-mini-icon'> I </span>
                        <span class='sidenav-normal  ms-2  ps-1'> Illustration </span>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </li>

              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
                <img src="./image/news & updates svg.svg" alt="" width="25px;" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Newsletter <b class="caret"></b></span>
                </a>
                <div class="collapse " id="lockExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/newsletter.php">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Newsletters </span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../pages/authentication/lock/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li> -->

                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                <img src="../Products/image/website details svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Website Details <b class="caret"></b></span>
                </a>
                <div class="collapse " id="profileExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/contactus.php">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Contact us  </span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/projects.html">
                        <span class="sidenav-mini-icon"> A </span>
                        <span class="sidenav-normal  ms-2  ps-1"> All Projects </span>
                      </a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/messages.html">
                        <span class="sidenav-mini-icon"> M </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Messages </span>
                      </a>
                    </li> -->
                  <!-- </ul>
                </div>
              </li> -->
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                  <span class="sidenav-mini-icon"> B </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Banners <b class="caret"></b></span>
                </a>
                <div class="collapse " id="usersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/bannercopy.php">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Banners </span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>
      </ul>
    </div>
  </aside>