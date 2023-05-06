<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
 {
    header("location: admin_login.php");
 }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>admin panel</h1>

    <h2><?php echo $_SESSION['AdminLoginId'] ?></h2>

    <form method="POST" action="<?php echo ($_SERVER['PHP_SELF']) ?>">
      <button type="submit" name="Logout">Logout</button>
    </form>

    <?php
  if(isset($_POST['Logout']))
  {
      session_destroy();
      header("location: admin_login.php");
  }
  
  
  
  ?>
  </body>
</html>
