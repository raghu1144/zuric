<?php
function get_monthly_orders()
{
    $data = "[";
    require "./connection.php";
    for ($i = 1; $i <= 12; $i++) {
        $sql = "SELECT count(services_id) FROM services WHERE month(created_date)=$i";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $data = $data . $row[0];
        } else {
            $data = $data . "0 ";
        }
        if ($i < 12)
            $data = $data . ", ";
    }
    $data = $data . "]";
    return $data;
}


function get_newsletter()
{
    $data = "[";
    require "./connection.php";
    for ($i = 1; $i <= 12; $i++) {
        $sql = "SELECT count(services_id) FROM services WHERE month(created_date)=$i";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $data = $data . $row[0];
        } else {
            $data = $data . "0 ";
        }
        if ($i < 12)
            $data = $data . ", ";
    }
    $data = $data . "]";
    return $data;
}
