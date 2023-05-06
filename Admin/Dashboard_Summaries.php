<?php

function total_sales()
{
    include './connection.php';
    $sql = "Select SUM(total_order) from order_manager";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function sales_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(order_id) FROM order_manager";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function intransit_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(order_id) FROM order_manager WHERE orders_status='Intransit'";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function neworder_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(order_id) FROM order_manager WHERE order_status=''";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function customer_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(DISTINCT email) FROM order_manager";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function client_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(DISTINCT email) FROM order_manager";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function cancelled_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(order_id) FROM order_manager WHERE order_status='Intransit'";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}

function delivered_count()
{
    include "./connection.php";
    $sql = "SELECT COUNT(order_id) FROM order_manager WHERE order_status='Intransit'";
    $result = $con->query($sql);
    if($result->num_rows>0)
        $row = $result->fetch_array();
    return $row[0];
}