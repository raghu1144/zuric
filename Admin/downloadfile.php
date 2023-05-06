<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/dist/boxicons.js" integrity="sha512-kWH92pHUC/rcjpSMu19lT+H6TlZwZCAftg9AuSw+AVYSdEKSlXXB8o6g12mg5f+Pj5xO40A7ju2ot/VdodCthw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/animations.min.css" integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abel&family=Roboto:ital,wght@1,500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bellefair&display=swap');

        section h1 {
            font-family: 'Abel', sans-serif;
            color: #545454;



        }


        .Main {
            height: 400px;
            /* padding: 10px 15px; */
            display: flex;
            align-items: center;
            justify-content: start;
            flex-direction: column;
            /* border: 1px solid goldenrod; */
            gap: 3px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 20px;
        }

        .logo {
            height: 120px;
            width: 300px;
        }

        .logo img {
            width: 100%;
        }

        .contents {
            margin-top: 25%;
            display: flex;
            /* gap: 20px; */

        }

        /* .rating p {
            margin: 0;
        }

        .rating {
            display: flex;
            flex-direction: column;
        } */

.downloads span{
    font-size: 25px;
    font-weight: 600;
}
        .downloads p {
            margin: 0;
            font-size: 35px;
            font-weight: 800;
        }
        .playstore img{
            margin: -50px 0;
        }
        .appstore img{
            width: 520px;
            margin-left: -110px;
            margin-top: -2px;
        }

        .downloads {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .Total{
            display: flex;
            justify-content: center;
        }
        .Huawei img{
            height: 138px;
    margin-top: 28px;
    width: 346px;
    margin-left: -23px;
        }
    </style>




</head>

<body>
    <section style="padding: 0px 20px">
        <h1>Mobile App Download</h1>
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="Main">
                        <div class="logo playstore">
                            <img src="./images/playstore.png" />
                        </div>
                        <div class="contents">
                           
                            <div class="downloads">
                                <p>Downloads</p>
                                <span>100</span>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="Main">
                        <div class="logo appstore">
                            <img src="./images/appstore.png" />
                        </div>
                        <div class="contents">
                           
                            <div class="downloads">
                                <p>Downloads</p>
                                <span>100</span>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="Main">
                        <div class="logo Huawei">
                            <img src="./images/huwaeai.png" />
                        </div>
                        <div class="contents">
                          
                            <div class="downloads">
                                <p>Downloads</p>
                                <span>100</span>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-4 ">
                    <div class="Total">
                        <h3>Total Download : <span>300</span></h3>
                        

                    </div>
                </div>
            </div>
    </section>







    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./validationScript/Dashboard.js"></script>
    <script src="./validationScript/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>