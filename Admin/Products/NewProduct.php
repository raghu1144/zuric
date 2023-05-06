<?php
require "../connection.php";
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: admin_login.php");
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
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <link rel="shortcut icon" href="../images/./title.png">
  <title>
    ZURIC
  </title>
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->

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
  <link id="pagestyle" href="../Products/Edit_product/material-dashboard.min.css?v=3.0.2" rel="stylesheet" />
  <!-- Anti-flicker snippet (recommended)  -->
  <style>
    .async-hide {
      opacity: 0 !important
    }


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
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 background1" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../index.php">
        <!-- <img src="../Products/Edit_product/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mb-2 mt-0">
          <!-- <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false"> -->
          <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="avatar" style="width: 40px; height: 40px; margin-left: 20px">
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
              </li> -->

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
         <li class="nav-item">
          <a href="../index.php" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
          <img src="../Products/image/dashboard svg.svg" alt="" width="25px" height="20px">
          <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
            <span class="nav-link-text ms-2 ps-1">Dashboards</span>
          </a>
          
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
                      <a class="nav-link text-white active">
                        <span class="sidenav-mini-icon"> N </span>
                        <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
                      </a>
                     </li>
                      
                    <li class="nav-item">
                      <a class="nav-link text-white " href="./Product_List.php">
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
                      <a class="nav-link text-white " href="./Order_List.php">
                        <span class="sidenav-mini-icon"> O </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                      </a>
                    </li>
                    
                  </ul>
                </div>
              </li>

            </ul>
          </div>
        </li>
         
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signinExample">
                <img src="../Products/image/customers svg.svg" alt="" width="25px" height="20px">

                  <span class="sidenav-normal  ms-2  ps-1"> Customers <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signinExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="./NewCustomer.php">
                        <span class="sidenav-mini-icon"> C </span>
                        <span class="sidenav-normal  ms-2  ps-1"> Customers </span>
                      </a>
                    </li>
                    

                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
                <img src="../Products/image/news & updates svg.svg" alt="" width="25px" height="20px">

                  <span class="sidenav-normal  ms-2  ps-1"> Newsletters <b class="caret"></b></span>
                </a>
                <div class="collapse " id="signupExample">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white " href="./newsletter.php">
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
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link text-body p-0" style="margin-left: -400px;">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </div>

        <div class="dropdown">
  <button class="dropbtn"><img src= "data:image/png;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="avatar" style="width: 40px; height: 40px;"> <span class="ms-1 font-weight-bold" style="color: black;"> <?php echo $_SESSION['AdminLoginId']; ?></span></button>
  <div class="dropdown-content">
  <a href="./profile.php">My Profile</a>
  <a href="./logout.php">Logout</a>
  </div>
 </div>

        
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-lg-8 col-md-10 col-12 m-auto">
          <h3 class="mt-3 mb-0 text-center">Add new Product</h3>
          <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let us know more about you.</p>
          <div class="card">
            <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                    <span>1. Product Info</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="Media">2. Media</button>
                  <button class="multisteps-form__progress-btn" type="button" title="Socials">3. Socials</button>
                  <button class="multisteps-form__progress-btn" type="button" title="Pricing">4. Pricing</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form  action="NewProduct_Script.php" class="multisteps-form__form" method="post" enctype="multipart/form-data">
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                  <h5 class="font-weight-bolder">Product Information</h5>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Product id</label>
                          <input class="multisteps-form__input form-control" type="text" name="product_id" />
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                          <input class="multisteps-form__input form-control" type="text" name="product_name" />
                        </div>
                      </div>
                    </div>

                    <div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Product Specification</label><br>
                        </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Height</label>
                          <input class="multisteps-form__input form-control" type="text" name="height"/>
                        </div>
                      </div>

                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >density</label>
                          <input class="multisteps-form__input form-control" type="text" name="density" />
                        </div>
                      </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Dtex</label>
                          <input class="multisteps-form__input form-control" type="text" name="dtex"/>
                        </div>
                      </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Guage</label>
                          <input class="multisteps-form__input form-control" type="text" name="guage" />
                        </div>
                      </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Standard</label>
                          <input class="multisteps-form__input form-control" type="text" name="standard" />
                        </div>
                      </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Quantity</label>
                          <input class="multisteps-form__input form-control" type="text" name="quantity" />
                        </div>
                      </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Shock absorbtion</label>
                          <input class="multisteps-form__input form-control" type="text" name="shock_observation" />
                        </div>
                     </div>
                      </div>
                      <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Elasticity</label>
                          <input class="multisteps-form__input form-control" type="text" name="elasticity"/>
                        </div>
                      </div>
                      </div>
                      </div>

                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label">Product Quantity</label>
                          <input class="multisteps-form__input form-control" type="text" name="product_quantity" />
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                          <input class="multisteps-form__input form-control" type="text" name="product_price"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label">Stock</label>
                          <input class="multisteps-form__input form-control" type="text" name="stock" />
                        </div>
                      </div>
                    </div>


                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label for="exampleFormControlInput1" class="form-label" >Status</label><br>
                          <input list="statuslist" class="multisteps-form__input form-control" type="text" name="status" />
                          <datalist name="statuslist" id="statuslist">
                            <option value="Active" selected>Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Delete">Delete</option>
                          </datalist>
                        </div>
                      </div>
                    </div>

                    <div class="button-row d-flex mt-4">
                      <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>

                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                  <h5 class="font-weight-bolder" name="media">Media</h5>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                      <div class="col-12">
                        <label class="form-control mb-0">Product images</label>
                        <div action="/file-upload" class="form-control border dropzone" id="productImg"></div>
                        <input type="file" name="image" id="image">
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                  <h5 class="font-weight-bolder">Socials</h5>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">

                      <div class="col-12 mt-3">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label" name="facebook_acount">Facebook Account</label>
                          <input class="multisteps-form__input form-control" type="text" name="facebook"/>
                        </div>
                      </div>
                      <div class="col-12 mt-3">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label" name="intagram_acount">Instagram Account</label>
                          <input class="multisteps-form__input form-control" type="text" name="instagram" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="button-row d-flex mt-4 col-12">
                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel pt-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                  <h5 class="font-weight-bolder">Pricing</h5>
                  <div class="multisteps-form__content mt-3">
                    <div class="row">
                      <div class="col-3">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label" name="price">Price</label>
                          <input type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="col-4">
                        <select class="form-control" name="currency" id="choices-currency">
                          <option value="USD" selected="" name="usd">USD</option>
                          <option value="EUR">EUR</option>
                          <option value="GBR">GBP</option>
                          <option value="CNY">CNY</option>
                          <option value="INR">INR</option>
                          <option value="BTC">BTC</option>
                        </select>
                      </div>
                      <div class="col-5">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label" name="">SKU</label>
                          <input class="multisteps-form__input form-control" type="text" name="sku"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <label class="mt-4 form-label" name="tags">Tags</label>
                        <select class="form-control" name="tag" id="choices-tags" multiple>
                          <option value="In Stock" selected>In Stock</option>
                          <option value="Sale">Sale</option>
                          <option value="Black Friday">Black Friday</option>
                        </select>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-0 mt-md-4">
                      <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                      <input class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" value="send">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
  <script src="../Products/Edit_product/dropzone.min.js"></script>
  <script src="../Products/Edit_product/quill.min.js"></script>
  <script src="../Products/Edit_product/multistep-form.js"></script>
  <script>
    if (document.getElementById('edit-deschiption')) {
      var quill = new Quill('#edit-deschiption', {
        theme: 'snow' // Specify theme in configuration
      });
    };

    if (document.getElementById('choices-category')) {
      var element = document.getElementById('choices-category');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-sizes')) {
      var element = document.getElementById('choices-sizes');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-currency')) {
      var element = document.getElementById('choices-currency');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-tags')) {
      var tags = document.getElementById('choices-tags');
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
  <script async defer src="/Products/Edit_product/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Products/Edit_product/material-dashboard.min.js?v=3.0.2"></script>
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