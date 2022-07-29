<?php
require './function/function_connection.php';
require './function/function_global.php';

function update_profil($data)
{
    global $conn;
    $username = $data['username'];
    $fullname = $data['nama'];
    $email = $data['email'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $nomor_hp = $data['nomor_hp'];
    $alamat = $data['alamat'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $foto_lama = $data['fileLama'];
    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = upload_foto();
        unlink("img/$foto_lama");
    }
    if ($password && $foto) {
        mysqli_query(
            $conn,
            "UPDATE data_pembeli SET
            nama='$fullname',
            email='$email',
            jenis_kelamin='$jenis_kelamin',
            nomor_hp=$nomor_hp,
            alamat='$alamat',
            password='$hash_password',
            foto='$foto' WHERE username='$username'"
        );
        return mysqli_affected_rows($conn);
    } else if ($foto) {
        mysqli_query(
            $conn,
            "UPDATE data_pembeli SET
            nama='$fullname',
            email='$email',
            jenis_kelamin='$jenis_kelamin',
            nomor_hp='$nomor_hp',
            alamat='$alamat',
            foto='$foto' WHERE username='$username'"
        );
        return mysqli_affected_rows($conn);
    } else if ($password) {
        mysqli_query(
            $conn,
            "UPDATE data_pembeli SET
            nama='$fullname',
            email='$email',
            jenis_kelamin='$jenis_kelamin',
            nomor_hp='$nomor_hp',
            alamat='$alamat',
            password='$hash_password' WHERE username='$username'"
        );
        return mysqli_affected_rows($conn);
    } else {
        mysqli_query(
            $conn,
            "UPDATE data_pembeli SET
            nama='$fullname',
            email='$email',
            jenis_kelamin='$jenis_kelamin',
            nomor_hp='$nomor_hp',
            alamat='$alamat' WHERE username='$username'"
        );
        return mysqli_affected_rows($conn);
    }
    // return mysqli_affected_rows($conn);
}
