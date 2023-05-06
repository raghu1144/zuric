<?php
require '../connection.php';
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header('location: ../admin_login.php');
}
$name = $_SESSION['AdminLoginId'];
$sql = "Select * from admin_login where Admin_name='$name'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../images//title.png">
  <title>
    ZURIC
  </title>
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, material dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, material design, material dashboard bootstrap 5 dashboard">
  <meta name="description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/default.html" />
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg" />
  <meta property="og:description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../Products/Edit_product/nucleo-icons.css" rel="stylesheet" />
  <link href="../Products/Edit_product/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../Products/Edit_product/material-dashboard.min.css" rel="stylesheet" />
  <!-- Anti-flicker snippet (recommended)  -->
  <style>
    .async-hide {
      opacity: 0 !important
    }

    .background1{
      background:#545454! important;
    }

      .table thead th
      {
        padding: 0.75rem 0.2rem;
      }


      /* Code for Drop down */
      .dropbtn {
  /* background-color: #4CAF50; */
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  /* background-color: #f9f9f9; */
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* .dropdown-content a:hover {background-color: #f1f1f1} */

.dropdown:hover .dropdown-content {
  display: block;
}
/*
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
} */
.container{
  max-width: 1500px;
}
  </style>
  <script>
    (function(a, s, y, n, c, h, i, d, e) {
      s.className += ' ' + y;
      h.start = 1 * new Date;
      h.end = i = function() {
        s.className = s.className.replace(RegExp(' ?' + y), '')
      };
      (a[n] = a[n] || []).hide = h;
      setTimeout(function() {
        i();
        h.end = null
      }, c);
      h.timeout = c;
    })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
      'GTM-K9BGS8K': true
    });
  </script>
  <!-- Analytics-Optimize Snippet -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-46172202-22', 'auto', {
      allowLinker: true
    });
    ga('set', 'anonymizeIp', true);
    ga('require', 'GTM-K9BGS8K');
    ga('require', 'displayfeatures');
    ga('require', 'linker');
    ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
  </script>
  <!-- end Analytics-Optimize Snippet -->
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="g-sidenav-show  bg-gray-200">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   background1" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0"  target="_blank">
        <img src="../Products/Edit_product/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"> Admin Panel
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0">
          <!-- <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false"> -->
          <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  class="avatar" style="width: 40px; height: 40px; margin-left: 30px">
            <span class="ms-1 font-weight-bold text-white"> <?php echo $_SESSION['AdminLoginId']; ?></span>
            <!-- <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span> -->
          </a>
          <div class="collapse" id="ProfileNav" style="">
            <ul class="nav ">

              <!-- <li class="nav-item">
              <form method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
                <button type="submit" name="Logout">Logout</button>
               </form>
              </li> -->
            </ul>
          </div>
        </li>

        <hr class="horizontal light mt-0">
         <P style="margin-left: 10px; color:#fff; margin-top: 20px;">MAIN NAVIGATION </P>
        <li class="nav-item active">
          <a href="../index.php" class="nav-link text-white collapsed active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
          <img src="../Products/image/dashboard svg.svg" alt="" width="25px" height="20px">
          <!-- <i class="material-icons-round opacity-10 ">dashboard</i> -->
            <span class="nav-link-text ms-2 ps-1 active">Dashboards</span>
          </a>
          </li>

        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white active" aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
            <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
          </a>
          <div class="collapse  show " id="ecommerceExamples">
            <ul class="nav "> -->
              <li class="nav-item ">
                <a class="nav-link text-white  active " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
                <img src="../Products/image/products svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Products <b class="caret"></b></span>
                </a>
                <div class="collapse show" id="productsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/NewProduct.php">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white active" href="../Products/Product_List.php">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
                      </a>
                    </li>

            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white " aria-controls="authExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
            <span class="nav-link-text ms-2 ps-1">Authentication</span>
          </a>
          <div class="collapse " id="authExamples">
            <ul class="nav "> -->

            <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">

                <img src="../Products/image/order icon svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
                </a>
                <div class="collapse " id="ordersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/Order_List.php">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/orders/details.html">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </li>

              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                <img src="../Products/image/customers svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Customers <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white ">
                        <!-- <span class="sidenav-mini-icon"> C </span> -->
                        <i class="material-icons opacity-10">group</i>
                        <span class="sidenav-normal  ms-2  ps-1"> Customers </span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/cover.html">
                        <span class="sidenav-mini-icon"> F </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Feedback </span>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#resetExample">


                <img src="../Products/image/news & updates svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Newsletters <b class="caret"></b></span>
                </a>
                <div class="collapse " id="resetExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/newsletter.php">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Newsletters </span>
                      </a>

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
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">

        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none " style="margin-left: -20px;">
          <a href="javascript:;" class="nav-link text-body p-0" style="margin-left: -400px;">
            <div class="sidenav-toggler-inner" style="margin-right: 100px;">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </div>

   <div class="dropdown">
  <button class="dropbtn"><img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  class="avatar" style="width: 40px; height: 40px;"> <span class="ms-1 font-weight-bold" style="color: black;"> <?php echo $_SESSION['AdminLoginId']; ?></span></button>
  <div class="dropdown-content">
  <a href="../Products/profile.php">My Profile</a>
  <a href="./logout.php">Logout</a>
  </div>
 </div>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card" style="width: 1200px">
            <!-- Card header -->
            <div class="card-header pb-0">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0"> Customers</h5>

                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                    <!-- <a href="http://localhost/Admin_Primo/Products/NewProduct.php" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp; New Product</a> -->
                    <!-- <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                      Import
                    </button> -->
                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog mt-lg-10">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                            <i class="material-icons ms-3">file_upload</i>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>You can browse your computer for a file.</p>
                            <div class="input-group input-group-dynamic mb-3">
                              <label class="form-label">Browse file...</label>
                              <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                              <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> -->
                  </div>
                </div>
              </div>
            </div>

      <div class="container mt-5">
    <!-- <button style="background-color: #0e402d;"><a href="http://localhost/Admin_Primo/Products/NewProduct.php" class="text-light">Add New Product</a></button> -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No.</th>
      <th scope="col">Customer Id</th>
      <th scope="col">Customer Name</th>
      <th scope="row">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Update</th>










     </tr>
  </thead>
  <tbody>


 <?php
$sql = "select * from signup";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $customerid = $row['customerid'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $date = $row['date'];

        echo '<tr>
    <th scope="row">' . $id . '</th>
     <td>' . $customerid . '</td>
     <td>' . $name . '</td>
     <td>' . $email . '</td>
     <td>' . $mobile . '</td>
     <td>' . $date . '</td>
     <td> <form action="newcustomer_script.php" method = "post">
     <input type="hidden" name="customerid" value=' . $customerid . '>
     <select name="status" id="status">
     <option value="Active">Active</option>
     <option value="Inactive">Inactive</option>

   </select>
   <td>
    <button type=submit name=update_status style="background-color: #0e402d; border-radius: 10px; color: white">Update</button>
    </td>
     </form></td>



  </tr>';
    }
}

?>
  </tbody>
</table>


</div>
    </div>



  </main>
  <div class="fixed-plugin">
    <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a> -->
    <!-- <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div> -->
        <!-- End Toggle Button -->
      <!-- </div> -->
      <!-- <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0"> -->
        <!-- Sidebar Backgrounds -->
        <!-- <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> -->
        <!-- Sidenav Type -->
        <!-- <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p> -->
        <!-- Navbar Fixed -->
        <!-- <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Sidenav Mini</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div> -->
        <!-- <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Buy now</a>
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard">Free demo</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div> -->
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../Products/Edit_product/popper.min.js"></script>
  <script src="../Products/Edit_product/bootstrap.min.js"></script>
  <script src="../Products/Edit_product/perfect-scrollbar.min.js"></script>
  <script src="../Products/Edit_product/smooth-scrollbar.min.js"></script>
  <script src="../Products/Edit_product/datatables.js"></script>
  <script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
      });

      document.querySelectorAll(".export").forEach(function(el) {
        el.addEventListener("click", function(e) {
          var type = el.dataset.type;

          var data = {
            type: type,
            filename: "material-" + type,
          };

          if (type === "csv") {
            data.columnDelimiter = "|";
          }

          dataTableSearch.export(data);
        });
      });
    };
  </script>
  <!-- Kanban scripts -->
  <script src="../Products/Edit_product/dragula.min.js"></script>
  <script src="../Products/Edit_product/jkanban.js"></script>
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
  <script async defer src="../Products/Edit_product/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Products/Edit_product/material-dashboard.min.js"></script>

</body>

</html>