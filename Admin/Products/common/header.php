<?php
require '../connection.php';

session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header('location: ../admin_login.php');
}

$sub_sql = "";
$toDate = $fromDate = "";
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fromDate = $from;
    $fromArr = explode("/", $from);
    $from = $fromArr['2'] . '-' . $fromArr['1'] . '-' . $fromArr['0'];
    $from = $from . " 00:00:00";

    $to = $_POST['to'];
    $toDate = $to;
    $toArr = explode("/", $to);
    $to = $toArr['2'] . '-' . $toArr['1'] . '-' . $toArr['0'];
    $to = $to . " 23:59:59";
    $sub_sql = " where date >= '$from' &&  date <= '$to' ";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link rel='apple-touch-icon' sizes='76x76' href='../../../assets/img/apple-icon.png'>
  <link rel='icon' type='image/png' href='../../../assets/img/favicon.png'>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <title>
   Primo turfs
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
  <link id="pagestyle" href="../Products/Edit_product/material-dashboard.min.css?v=3.0.2" rel="stylesheet" />
  <!-- Anti-flicker snippet (recommended)  -->

                                <meta name='viewport' content='width=device-width, initial-scale=1'>

                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>body {
    background: rgb(99, 39, 120)
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}</style>
<style>
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
  padding: 0;
  width: 180px;
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
  <style>

    .async-hide {
      opacity: 0 !important
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
