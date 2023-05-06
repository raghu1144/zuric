<?php
include "header.php";
include "Dashboard_Summaries.php";
?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient shadow-dark text-center border-radius-xl mt-n4 position-absolute" style="background-color: #0e402d;">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0"><?=total_sales()?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize"> Users</p>
                <?php
                  include './connection.php';
                  // $sql = "SELECT * FROM register";
                  // $result = mysqli_query($con, $sql);
                  // if ($user_total = mysqli_num_rows($result)) {
                  //     echo '<h4 class="mb-0">' . $user_total . '</h4>';
                  // } else {
                  //     echo '<h4> No data </h4>';
                  // }
                ?>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                <!-- <h4 class="mb-0"><?=client_count()?></h4> -->
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient shadow-info text-center border-radius-xl mt-n4 position-absolute" style="background-color: lightgreen;">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">News letter</p>
                <?php
                   include './connection.php';
                //    $sql = "Select * from newsetller";
                //    $result = $con->query($sql);
                //    if ($newsletter = mysqli_num_rows($result)) {
                //        echo '<h4> ' . $newsletter . '</h4>';
                //    } else {
                //        '<h4> No Data</h4>';
                //    }

                // ?>
                <!-- <h4 class="mb-0">$103,430</h4> -->
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent" >
              <div class="bg-gradient shadow-primary border-radius-lg py-3 pe-1" style="background-color: #0e402d;" >
                <div class="chart" >
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <!-- <p class="text-sm ">Last Campaign Performance</p> -->
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div> 
             <div class="card-body">
              <h6 class="mb-0 "> Orders </h6> 
               <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p> -->
               <hr class="dark horizontal"> -->
               <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div> 
             </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Newsletters</h6>
              <!-- <p class="text-sm ">Last Campaign Performance</p> -->
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Customer Reviews</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                 <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <!-- <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a> -->
                    <!-- <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                       <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li> -->

                    <!-- </ul> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl no.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarks</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      <select name="" id="">
                       <option value="Action" selected>Action</option>
                        <option value="post">Post</option>
                        <option value="Intagado">Intagado</option>
                      </select>
                      <button type="submit" style="width: 70px;">Post</button>
                      </th> -->
                    </tr>
                  </thead>
                  <tbody>

              </div>
            </div>
                  <!-- <?php
                    include './connection.php';
                    $sql = "Select * from customer_remarks";
                    $result = $con->query($sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $rating = $row['rating'];
                            $remarks = $row['remarks'];
                    
                            echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $rating . '</td>
                            <td>' . $remarks . '</td>
                            </tr>';
                        }
                    }
                  ?> -->

                      
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                   <span class="timeline-step">
                    <!-- <i class="material-icons text-success text-gradient">notifications</i> -->
                    <img src="./Products/image/sales.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>
                  </span>
                  <div class="timeline-content">
                  <!-- <img src="./Products/image/sales.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"> Sales</span>  -->
                    <!-- <img src="./Products/image/sales.jpeg" alt="" style="width: 10;">Sales -->
                      <h6 class="text-dark text-sm font-weight-bold mb-0">Sales</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=sales_count()?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <!-- <i class="material-icons text-danger text-gradient">code</i> -->
                     <img src="./Products/image/neworder.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>

                  </span>
                  <div class="timeline-content">
                  <!-- <img src="./Products/image/neworder.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"><b> New Order </b></span> -->
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=neworder_count()?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <!-- <i class="material-icons text-info text-gradient">shopping_cart</i> -->
                    <img src="./Products/image/transit.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>
                  </span>
                  <div class="timeline-content">
                  <!-- <img src="./Products/image/transit.jpeg" alt="" style="width: 20px; height: 20px; margin-right: 25px;position:relative;left:-39px"/><span style="margin-left: -50px;"><b> Transit </b></span> -->
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><b>Transit</b></h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=intransit_count()?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <!-- <i class="material-icons text-warning text-gradient">credit_card</i> -->
                    <img src="./Products/image/delivered.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Delivered</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=delivered_count()?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <!-- <i class="material-icons text-primary text-gradient">key</i> -->
                    <img src="./Products/image/newcustomer.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New Customer</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=customer_count()?></p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <!-- <i class="material-icons text-dark text-gradient">payments</i> -->
                    <img src="./Products/image/cancel.jpeg" alt="" style="width: 20px; height: 20px; position:relative;"/>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Cancelled</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=cancelled_count()?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <footer class="footer py-4  ">
        
    </div>
  </main>
  <!-- <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <!-- <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <!-- <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div> -->
        <!-- <a href="javascript:void(0)" class="switch-trigger background-color"> -->
          <!-- <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div> -->
        <!-- </a>  -->
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
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <!-- <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div> -->
        <!-- <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div> -->
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
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
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php
// if(isset($_POST['Logout']))
// {
//     session_destroy();
//     echo
//     "
//     <script>
//     window.location.href = 'admin_login.php';
//     </script>

//     ";

// }
?>
</body>

</html>