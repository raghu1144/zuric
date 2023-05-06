if(!isset($_SESSION['AdminLoginId']))
 {
    header("location: admin_login.php");
 }


 <?php
if(isset($_POST['Logout']))
{
    session_destroy();
    header("location: admin_login.php");
}


?>
$user_fetch[LastName]
$user_fetch[Address2]$user_fetch[State]$user_fetch[LandMark]
                    $user_fetch[Country]$user_fetch[PostalCode]