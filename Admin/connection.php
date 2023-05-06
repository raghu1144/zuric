<?php

$con = mysqli_connect("localhost","root","","zuric");


if(mysqli_connect_error())
{
    echo "cannot connect to db";
    exit();
}
// else {
//     echo "Conection Successfully.";
// }


?>