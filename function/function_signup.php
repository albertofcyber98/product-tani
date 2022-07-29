<?php
require './function/function_connection.php';

function signup($data)
{
    global $conn;
    $fullname = $data['fullname'];
    $username = $data['username'];
    $password = $data['password'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO data_pembeli VALUES('$username','$fullname','$jenis_kelamin','0','','','','$password_hash','')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
