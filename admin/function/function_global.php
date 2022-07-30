<?php
require './function/function_connection.php';
function query_data($data)
{
    global $conn;
    $result = mysqli_query($conn, $data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function data_admin($data)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM data_admin WHERE username='$data'");
    $result = mysqli_fetch_assoc($data);
    return $result;
}
function total_admin()
{
    global $conn;
    $data = mysqli_query($conn, "SELECT*FROM data_admin");
    $count_row = mysqli_num_rows($data);
    return $count_row;
}
function total_buyer_aktif()
{
    global $conn;
    $data = mysqli_query($conn, "SELECT*FROM data_pembeli WHERE status='Aktif'");
    $count_row = mysqli_num_rows($data);
    return $count_row;
}
function total_seller_aktif()
{
    global $conn;
    $data = mysqli_query($conn, "SELECT*FROM data_penjual WHERE status='Aktif'");
    $count_row = mysqli_num_rows($data);
    return $count_row;
}
