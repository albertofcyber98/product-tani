<?php
require './function/function_connection.php';

function add_admin($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    $nama = $data['nama'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO data_admin VALUES('$username','$hash_password','$nama')");
    return mysqli_affected_rows($conn);
}
function update_admin($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $nama = $data['nama'];
    if ($password) {
        mysqli_query($conn, "UPDATE data_admin SET password='$hash_password', nama='$nama' WHERE username='$username'");
        return mysqli_affected_rows($conn);
    } else {
        mysqli_query($conn, "UPDATE data_admin SET nama='$nama' WHERE username='$username'");
        return mysqli_affected_rows($conn);
    }
}
function delete_admin($data)
{
    global $conn;
    $username = $data['username'];
    mysqli_query($conn, "DELETE FROM data_admin WHERE username='$username'");
    return mysqli_affected_rows($conn);
}
