<?php
include '../connection.php';
$serial_no = $_GET['updateserial_no'];
$sql = "Select * from product where serial_no=$serial_no";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$product_id = $row['product_id'];
$product_name = $row['product_name'];
$product_quantity = $row['product_quantity'];
$product_price = $row['product_price'];
$status = $row['status'];
$sku = $row['sku'];

?>
<?php
require '../connection.php';
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header('location: ../admin_login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <title>
    Primo Admin
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
  <!-- Open Graph dat

  a -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/default.html" />
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg" />
  <meta property="og:description" content="Material
  PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
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
  <link id="pagestyle" href="../Products/Edit_product/material-dashboard.min.css?v=3.0.2:41" rel="stylesheet" />
  <!-- Anti-flicker snippet (recommended)  -->

  <style>
    .async-hide {
      opacity: 0 !important
    }


    .async-hide {
      opacity: 0 !important
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
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0"  target="_blank">
        <img src="../Products/Edit_product/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0">
          <!-- <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false"> -->
          <img src="./Edit_product/logo1.png" class="avatar" style="width: 40px; height: 40px; margin-left: 30px">
          <span class="ms-1 font-weight-bold text-white"> <?php echo $_SESSION['AdminLoginId']; ?></span>
            <!-- <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span> -->
          </a>
          <div class="collapse" id="ProfileNav" style="">
            <ul class="nav ">
              <!-- <li class="nav-item">
                <a class="nav-link text-white" href="../../../pages/pages/profile/overview.html">
                  <span class="sidenav-mini-icon"> MP </span>
                  <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="../../../pages/pages/account/settings.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Settings </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="../../../pages/authentication/signin/basic.html">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                </a>
              </li>-->
            </ul>
          </div>
        </li>
        <hr class="horizontal light mt-0">
        <P style="margin-left: 10px; color:#fff; margin-top: 20px;">MAIN NAVIGATION </P>
        <li class="nav-item">
          <a href="../index.php" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
          <img src="../Products/image/dashboard svg.svg" alt="" width="25px" height="20px">
          <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
            <span class="nav-link-text ms-2 ps-1">Dashboards</span>
          </a>

        <!-- </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">PAGES</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white " aria-controls="pagesExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
            <span class="nav-link-text ms-2 ps-1">Pages</span>
          </a>
          <div class="collapse " id="pagesExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Profile <b class="caret"></b></span>
                </a>
                <div class="collapse " id="profileExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/overview.html">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Profile Overview </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/projects.html">
                        <span class="sidenav-mini-icon"> A </span>
                        <span class="sidenav-normal  ms-2  ps-1"> All Projects </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/profile/messages.html">
                        <span class="sidenav-mini-icon"> M </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Messages </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                  <span class="sidenav-mini-icon"> U </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Users <b class="caret"></b></span>
                </a>
                <div class="collapse " id="usersExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/users/reports.html">
                        <span class="sidenav-mini-icon"> R </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Reports </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/users/new-user.html">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New User </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Account <b class="caret"></b></span>
                </a>
                <div class="collapse " id="accountExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/settings.html">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Settings </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/billing.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Billing </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/invoice.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Invoice </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/account/security.html">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Security </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Projects <b class="caret"></b></span>
                </a>
                <div class="collapse " id="projectsExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/general.html">
                        <span class="sidenav-mini-icon"> G </span>
                        <span class="sidenav-normal  ms-2  ps-1"> General </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/timeline.html">
                        <span class="sidenav-mini-icon"> T </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Timeline </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/projects/new-project.html">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Project </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                  <span class="sidenav-mini-icon"> V </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Virtual Reality <b class="caret"></b></span>
                </a>
                <div class="collapse " id="vrExamples">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/vr/vr-default.html">
                        <span class="sidenav-mini-icon"> V </span>
                        <span class="sidenav-normal  ms-2  ps-1"> VR Default </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/pages/vr/vr-info.html">
                        <span class="sidenav-mini-icon"> V </span>
                        <span class="sidenav-normal  ms-2  ps-1"> VR Info </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/pricing-page.html">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Pricing Page </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/rtl-page.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal  ms-2  ps-1"> RTL </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/widgets.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Widgets </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/charts.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Charts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/sweet-alerts.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sweet Alerts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/pages/notifications.html">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Notifications </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
            <span class="nav-link-text ms-2 ps-1">Applications</span>
          </a>
          <div class="collapse " id="applicationsExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/crm.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/kanban.html">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Kanban </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/wizard.html">
                  <span class="sidenav-mini-icon"> W </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Wizard </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/datatables.html">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal  ms-2  ps-1"> DataTables </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/calendar.html">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Calendar </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/applications/stats.html">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Stats </span>
                </a>
              </li>
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white active" aria-controls="ecommerceExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
            <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
          </a> -->
          <div class="collapse  show " id="ecommerceExamples">
            <ul class="nav ">
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
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white active" href="../../../pages/ecommerce/products/edit-product.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Edit Product </span>
                      </a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/ecommerce/products/product-page.html">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Product Page </span>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/Product_List.php">
                        <span class="sidenav-mini-icon"> P </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
                      </a>
                    </li>
                  </ul>
                </div>
              <!-- </li> -->
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

                  </ul>
                </div>
              </li>
              <!-- <li class="nav-item ">
                <a class="nav-link text-white " href="../../../pages/ecommerce/referral.html">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Referral </span>
                </a>
              </li> -->
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white " aria-controls="authExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
            <span class="nav-link-text ms-2 ps-1">Authentication</span>
          </a> -->

          <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                <img src="../Products/image/customers svg.svg" alt="" width="25px" height="20px">
                  <span class="sidenav-normal  ms-2  ps-1"> Customers <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../Products/NewCustomer.php">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Customers </span>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/cover.html">
                        <span class="sidenav-mini-icon"> F </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Feedback </span>
                      </a>
                    </li> -->
                     <!-- <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/signup/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
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
              <!-- <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Lock <b class="caret"></b></span>
                </a>
                <div class="collapse " id="lockExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/lock/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#StepExample">
                  <span class="sidenav-mini-icon"> 2 </span>
                  <span class="sidenav-normal  ms-2  ps-1"> 2-Step Verification <b class="caret"></b></span>
                </a>
                <div class="collapse " id="StepExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/basic.html">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/cover.html">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/verification/illustration.html">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#errorExample">
                  <span class="sidenav-mini-icon"> E </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Error <b class="caret"></b></span>
                </a>
                <div class="collapse " id="errorExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/error/404.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Error 404 </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="../../../pages/authentication/error/500.html">
                        <span class="sidenav-mini-icon"> E </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Error 500 </span>
                      </a>
                    </li>-->
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <hr class="horizontal light" />
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">DOCS</h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link text-white " aria-controls="basicExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">upcoming</i>
            <span class="nav-link-text ms-2 ps-1">Basic</span>
          </a>
          <div class="collapse " id="basicExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#gettingStartedExample">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Getting Started <b class="caret"></b></span>
                </a>
                <div class="collapse " id="gettingStartedExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/quick-start/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> Q </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Quick Start </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/license/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal  ms-2  ps-1"> License </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Contents </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/build-tools/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> B </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Build Tools </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#foundationExample">
                  <span class="sidenav-mini-icon"> F </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Foundation <b class="caret"></b></span>
                </a>
                <div class="collapse " id="foundationExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/colors/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Colors </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/grid/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> G </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Grid </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/typography/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> T </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Typography </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/icons/material-dashboard" target="_blank">
                        <span class="sidenav-mini-icon"> I </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Icons </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> -->
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link text-white " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
            <span class="nav-link-text ms-2 ps-1">Components</span>
          </a>
          <div class="collapse " id="componentsExamples">
            <ul class="nav ">
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/alerts/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Alerts </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/badge/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> B </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Badge </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/buttons/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> B </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Buttons </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/cards/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Card </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/carousel/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Carousel </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/collapse/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Collapse </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/dropdowns/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> D </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Dropdowns </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/forms/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> F </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Forms </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/modal/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Modal </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/navs/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Navs </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/navbar/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> N </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Navbar </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/pagination/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Pagination </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/popovers/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Popovers </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/progress/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Progress </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/spinners/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> S </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Spinners </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/tables/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Tables </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="https://www.creative-tim.com/learning-lab/bootstrap/tooltips/material-dashboard" target="_blank">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Tooltips </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/creativetimofficial/ct-material-dashboard-pro/blob/master/CHANGELOG.md" target="_blank">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">receipt_long</i>
            <span class="nav-link-text ms-2 ps-1">Changelog</span>
          </a>
        </li> -->
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
    <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 border-radius-xl z-index-sticky shadow-none" id="navbarBlur" data-scroll="true">
    <!-- <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" data-scroll="true"> -->
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-3 text-dark" href="javascript:;">
                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                          <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Product</li>
          </ol> -->
          <!-- <h6 class="font-weight-bolder mb-0">Edit Product</h6> -->
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link text-body p-0" >
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </div>

        <div class="dropdown">
  <button class="dropbtn"><img src="./Edit_product/logo1.png" class="avatar" style="width: 40px; height: 40px;"> <span class="ms-1 font-weight-bold" style="color: black;"> <?php echo $_SESSION['AdminLoginId']; ?></span></button>
  <div class="dropdown-content">
  <a href="../Products/profile.php">My Profile</a>
  <a href="./logout.php">Logout</a>
  </div>
 </div>
        <!-- <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Search here</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item">
              <a href="../../../pages/authentication/signin/illustration.html" class="nav-link text-body p-0 position-relative" target="_blank">
                <i class="material-icons me-sm-1">
              account_circle
            </i>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="material-icons fixed-plugin-button-nav cursor-pointer">
              settings
            </i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2">
              <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons cursor-pointer">
              notifications
            </i>
                <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
                  <span class="small">11</span>
                  <span class="visually-hidden">unread notifications</span>
                </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex align-items-center py-1">
                      <span class="material-icons">email</span>
                      <div class="ms-2">
                        <h6 class="text-sm font-weight-normal my-auto">
                          Check new messages
                        </h6>
                      </div>
                    </div>
                  </a>
                </li> -->
                <!-- <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex align-items-center py-1">
                      <span class="material-icons">podcasts</span>
                      <div class="ms-2">
                        <h6 class="text-sm font-weight-normal my-auto">
                          Manage podcast session
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex align-items-center py-1">
                      <span class="material-icons">shopping_cart</span>
                      <div class="ms-2">
                        <h6 class="text-sm font-weight-normal my-auto">
                          Payment successfully completed
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <form action="EditProduct_script.php" method="post">
      <input type="hidden" name="serial_no" value=<?php echo $serial_no; ?>>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6">
          <!-- <h4>Make the changes below</h4>
          <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p> -->
        </div>
        <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
          <input type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2" value="Update">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4">
          <div class="card mt-4">
            <div class="card-header p-0  mt-n4 mx-3 z-index-2">
              <a class="d-block">
              <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['product_image']); ?>" alt="" class="img-fluid shadow border-radius-lg" >
              </a>
              <!-- <div  style="background-image: url(&quot;../Edit_product/elite.png&quot;);"></div> -->
            </div>

             <div class="card-body text-center">
              <!-- <div class="mt-n6 mx-auto">
                <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button" name="button">Edit</button>
                <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="button">Remove</button>
              </div> -->
              <!-- <h5 class="font-weight-normal mt-4">
                Product Image
              </h5>
              <p class="mb-0">
                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-lg-8 mt-lg-0 mt-4">
          <div class="card">
            <div class="card-body">
              <h5 class="font-weight-bolder">Product Information</h5>
              <div class="row mt-4">
                <div class="col-12 col-sm-6">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Product id</label>
                    <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)" name="product_id" value=<?php echo $product_id; ?>>
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control w-100" onfocus="focused(this)" onfocusout="defocused(this)" name="product_name" value=<?php echo $product_name; ?>>
                  </div>
                </div>

                <!-- <div class="row mt-4">
                <div class="col-3">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Product Specification</label>
                    <input type="text" class="form-control w-100" onfocus="focused(this)" onfocusout="defocused(this)" name="product_specification">
                  </div>
                </div>    -->

                <div class="col-12 col-sm-6 mt-3">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Product Quantity</label>
                    <input type="text" class="form-control w-100" onfocus="focused(this)" onfocusout="defocused(this)" name="product_quantity" value=<?php echo $product_quantity; ?>>
                  </div>
                </div>

                <div class="col-12 col-sm-6 mt-3">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Product Price</label>
                    <input type="text" class="form-control w-100" onfocus="focused(this)" onfocusout="defocused(this)" name="product_price" value=<?php echo $product_price ?>>
                  </div>
                </div>

                  <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <div class="input-group input-group-dynamic">
                    <label class="form-label">Status</label>
                    <input list="statuslist" class="multisteps-form__input form-control" type="text" name="status"/>
                          <datalist name="statuslist" id="statuslist">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Delete"><a href="Product_List.php">Delete</a></option>
                          </datalist>

                  </div>
                </div>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="font-weight-bolder">Socials</h5>
              <div class="input-group input-group-dynamic">
                <label class="form-label">Instagram Account</label>
                <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)" name="instagram">
              </div>
              <div class="input-group input-group-dynamic my-3">
                <label class="form-label">Facebook Account</label>
                <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)" name="facebook">
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-8 mt-sm-0 mt-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="font-weight-bolder mb-3">Pricing</h5>
                <div class="col-3">
              <div class=" input-group input-group-dynamic">
                  <label class="form-label" >Price</label>
                  <input type="text" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)" name="price">
                </div>
              </div>
              <div class="col-4">
                <select class="form-control" name="choices-sizes" id="choices-currency-edit">
                  <option value="Choice 1" selected="" name="usd">USD</option>
                  <option value="Choice 2">EUR</option>
                  <option value="Choice 3">GBP</option>
                  <option value="Choice 4">CNY</option>
                  <option value="Choice 5">INR</option>
                  <option value="Choice 6">BTC</option>
                </select>
              </div>
              <div class="col-5">
                <div class="input-group input-group-dynamic">
                  <label class="form-label">SKU</label>
                  <input type="email" class="form-control w-100" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)" name="sku">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label class="mt-4">Tags</label>
                <select class="form-control" name="choices-tags" id="choices-tags-edit" multiple>
                  <option value="Choice 1" selected name="tag">In Stock</option>
                  <option value="Choice 3">Sale</option>
                  <option value="Choice 4">Black Friday</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
    <!-- <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div> -->
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
        </div> -->
        <!-- <a href="javascript:void(0)" class="switch-trigger background-color">
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
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
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
        </div>
        <hr class="horizontal dark my-sm-4">
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
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../Products/Edit_product/popper.min.js"></script>
  <script src="../Products/Edit_product/bootstrap.min.js"></script>
  <script src="../Products/Edit_product/perfect-scrollbar.min.js"></script>
  <script src="../Products/Edit_product/smooth-scrollbar.min.js"></script>
  <script src="../Products/Edit_product/choices.min.js"></script>
  <script src="../Products/Edit_product/quill.min.js"></script>
  <script>
    if (document.getElementById('edit-deschiption-edit')) {
      var quill = new Quill('#edit-deschiption-edit', {
        theme: 'snow' // Specify theme in configuration
      });
    };

    if (document.getElementById('choices-category-edit')) {
      var element = document.getElementById('choices-category-edit');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-color-edit')) {
      var element = document.getElementById('choices-color-edit');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-currency-edit')) {
      var element = document.getElementById('choices-currency-edit');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-tags-edit')) {
      var tags = document.getElementById('choices-tags-edit');
      const examples = new Choices(tags, {
        removeItemButton: true
      });

      examples.setChoices(
        [{
            value: 'One',
            label: 'Expired',
            disabled: true
          },

        ],
        'value',
        'label',
        false,
      );
    }
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