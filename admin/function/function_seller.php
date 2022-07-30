<?php
require './function/function_connection.php';

function update_seller($data)
{
    global $conn;
    $username = $data['username'];
    mysqli_query($conn, "UPDATE data_penjual SET status='Aktif' WHERE username='$username'");
    return mysqli_affected_rows($conn);
}
function delete_seller($data)
{
    global $conn;
    $username = $data['username'];
    mysqli_query($conn, "DELETE FROM data_penjual WHERE username='$username'");
    return mysqli_affected_rows($conn);
}
