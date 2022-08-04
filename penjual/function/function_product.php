<?php
require './function/function_connection.php';
require './function/function_global.php';

function add_produk($data)
{
    global $conn;
    $nama_produk = $data['nama_produk'];
    $deskripsi_produk = $data['deskripsi_produk'];
    $harga_produk = $data['harga_produk'];
    $stok_produk = $data['stok_produk'];
    $username = $data['username'];
    $foto = upload_foto();
    mysqli_query($conn, "INSERT INTO 
    data_produk VALUES(NULL,'$nama_produk',
    '$deskripsi_produk','$harga_produk',
    '$stok_produk','$foto','$username')");
    return mysqli_affected_rows($conn);
}
function update_produk($data)
{
    global $conn;
    $id = $data['id'];
    $nama_produk = $data['nama_produk'];
    $deskripsi_produk = $data['deskripsi_produk'];
    $harga_produk = $data['harga_produk'];
    $stok_produk = $data['stok_produk'];
    $foto_lama = $data['fileLama'];
    //
    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = upload_foto();
        unlink("img/$foto_lama");
    }
    mysqli_query($conn, "UPDATE data_produk SET
    nama_produk='$nama_produk',
    deskripsi_produk='$deskripsi_produk',
    harga_produk='$harga_produk',
    stok_produk='$stok_produk',
    foto='$foto' WHERE id='$id'");
    return mysqli_affected_rows($conn);
}
function delete_produk($data)
{
    global $conn;
    $id = $data['id'];
    mysqli_query($conn, "DELETE FROM data_produk WHERE id='$id'");
    return mysqli_affected_rows($conn);
}
