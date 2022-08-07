<?php
require './function/function_connection.php';
require './function/function_global.php';
function add_checkout($data)
{
    global $conn;
    $queryTransaksi = mysqli_query($conn, "SELECT max(id_transaksi) as kodeTerbesar FROM data_transaksi");
    $dataTransaksi = mysqli_fetch_assoc($queryTransaksi);
    $kodeTransaksi = $dataTransaksi['kodeTerbesar'];
    $urutan = (int) substr($kodeTransaksi, 3, 3);
    $urutan++;
    $huruf = "BRS-";
    $invoice = $huruf . sprintf("%03s", $urutan);
    $id_produk = $data['id_produk'];
    $queryProduk = mysqli_query($conn, "SELECT*FROM data_produk WHERE id='$id_produk'");
    $resultProduk = mysqli_fetch_assoc($queryProduk);
    $nama_produk = $resultProduk['nama_produk'];
    $jumlah = $data['jumlah'];
    $sub_total = $resultProduk['harga_produk'] * $jumlah;
    $username_pembeli = $data['username_pembeli'];
    $username_penjual = $data['username_penjual'];
    $kode_unik = mt_rand(100, 300);

    mysqli_query($conn, "UPDATE data_produk SET stok_produk = stok_produk-$jumlah WHERE id='$id_produk'");
    mysqli_query($conn, "INSERT INTO data_transaksi
    VALUES('$invoice','$nama_produk',$jumlah,$sub_total,$kode_unik,'','Pending','$username_penjual','$username_pembeli','','',0)");
    return array(mysqli_affected_rows($conn), $invoice);
}
function add_pembayaran($data)
{
    global $conn;
    $invoice = $data['invoice'];
    $detail_alamat = $data['detail_alamat'];
    $desa = $data['desa'];
    $nama_pengirim = $data['nama_pengirim'];
    $no_telpon = $data['no_telpon'];
    $bukti_transfer = upload_bukti_pembayaran();
    $alamat = $detail_alamat . ', ' . $desa;
    mysqli_query($conn, "UPDATE data_transaksi SET 
    alamat='$alamat', 
    no_telpon=$no_telpon,
    nama_pengirim='$nama_pengirim',
    status='Proses',
    bukti_pembayaran='$bukti_transfer' WHERE id_transaksi='$invoice'");
    return mysqli_affected_rows($conn);
}
