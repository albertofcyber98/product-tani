<?php
require './function/function_connection.php';
function upload_foto()
{
    // return false;
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    // cek jika tidak ada gambar diupload

    if ($error === 4) {
        echo "
        <script>
            alert('Masukkan Foto');
        </script>
        ";
        return false;
    }
    // cek yang boleh diupload
    $ekstensiFileValid = ['jpg', 'jpeg', 'png', 'JPG'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
            alert('Unggah file gambar berekstensi jpg/jpeg/png');
        </script>
        ";
        return false;
    }
    //cek size
    if ($ukuranFile > 5000000) {
        echo "
        <script>
            alert('Ukuran gambar yang diupload lebih dari 5mb');
        </script>
        ";
        return false;
    }
    // lolos pengecekan
    //generate
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
function data_penjual($data)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM data_penjual WHERE username='$data'");
    $result = mysqli_fetch_assoc($data);
    return $result;
}
