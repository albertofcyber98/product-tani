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
function upload_bukti_pembayaran()
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
    move_uploaded_file($tmpName, 'bukti_pembayaran/' . $namaFileBaru);
    return $namaFileBaru;
}
function format_tanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
function format_rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
