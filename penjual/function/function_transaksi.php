<?php
require './function/function_connection.php';
function update_verif($data)
{
    global $conn;
    $invoice = $data['id_transaksi'];
    mysqli_query($conn, "UPDATE data_transaksi SET status='Verifikasi' WHERE id_transaksi='$invoice'");
    return mysqli_affected_rows($conn);
}
function update_pengiriman($data)
{
    global $conn;
    $invoice = $data['id_transaksi'];
    mysqli_query($conn, "UPDATE data_transaksi SET status='Pengiriman' WHERE id_transaksi='$invoice'");
    return mysqli_affected_rows($conn);
}
