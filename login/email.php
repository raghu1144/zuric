<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Email Popup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #fff;
        }

        .backg {
            color: #fff;
            background-color: #0e402d;
            padding: 10px 5px;
            border-radius: 5px;
        }

        .txt-col {
            color: #545252;
            font-size: 21px;

        }

        .img_size {
            width: 28%;
            margin-left: -3px;
        }
        .img_size1 {
            width: 30%;
            margin-left: 112px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mt-3">
                    <img src="img1.png">
                </div>
            </div>
            <div class="col-md-12">
                <h3 class="text-center mt-5">Verify your email address</h3>
            </div>
            <div class="col-md-12">
                <p class="text-center mt-2 txt-col">Thanks for sinning up for<br>Primo! We are excited to
                    have<br>you.<br>Here is your OTP</p>
            </div>
            <div class="col-md-12 mt-3 mb-3">
                <p class="text-center mt-3"><span class="backg">1 &nbsp;9 &nbsp;1 &nbsp;4 &nbsp;6 &nbsp;8</span></p>
            </div>
            <div class="col-md-12">
                <p class="text-center mt-2 txt-col">Thanks,<br>The Primo Team</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4"></div>
            <div class="col-md-2"><img class="img_size1" src="icon1.png"></div>
            <div class="col-md-2"><img class="img_size" src="icon.png"></div>
            <div class="col-md-4"></div>
        </div>
        <div class="col-md-12">
            <p class="text-center mt-3">Primo<br>Copyright 2022 , All right reserved.</p>
        </div>
        
    </div>

</body>
</html>