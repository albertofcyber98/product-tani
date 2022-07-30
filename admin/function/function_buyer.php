<?php
require './function/function_connection.php';

function update_buyer($data)
{
    global $conn;
    $username = $data['username'];
    mysqli_query($conn, "UPDATE data_pembeli SET status='Aktif' WHERE username='$username'");
    return mysqli_affected_rows($conn);
}
function delete_buyer($data)
{
    global $conn;
    $username = $data['username'];
    mysqli_query($conn, "DELETE FROM data_pembeli WHERE username='$username'");
    return mysqli_affected_rows($conn);
}
