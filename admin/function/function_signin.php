<?php
require './function/function_connection.php';

function signin($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    $query = "SELECT * FROM data_admin WHERE username='$username'";
    $get = mysqli_query($conn, $query);
    $result = mysqli_num_rows($get);
    $row_account = mysqli_fetch_assoc($get);
    if ($result === 1) {
        if (password_verify($password, $row_account['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
