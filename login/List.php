<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html >

<head>
    <title>primo</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="./../images/logo 3-01.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- form section start -->
    <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="./../index.html" style="height: 65px; width: auto; display: flex; justify-content: center;"><img src="./../images/logo final.svg"></a></h1>
                    <!-- if logo is image enable this
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <?php
include '../connection.php';
?>
 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <div class="container"> -->
        <button class="btn btn-primary"><a href="signup.php" class="text-light">Add user</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Customer Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
   <?php

$sql = "select * from signup where customerid = '00002'";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $customerid = $row['customerid'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $status = $row['status'];

        echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $customerid . '</td>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>' . $mobile . '</td>
        <td>' . $status . '</td>
        <td>
        <button class="btn btn-primary"><a href="edit_admin.php? updatecustomerid=' . $customerid . '" class="text-light" style="text-decoration: none">Update</a></button>
        <button class="btn btn" style="background-color: #0e402d"><a href="delete_list.php? deletecustomerid=' . $customerid . '" class="text-light" style="text-decoration: none">Delete</a></button>
       </td>

        </tr>';
    }

}

?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
    </div>


        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper">
                <p class="copy-footer-29"><b>© 2022 Primo. Privacy policy</b></p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>
</html>