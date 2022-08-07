<?php
require './function/function_connection.php';
require './function/function_profil.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
$result = data_penjual($_SESSION['username']);
$username = $_SESSION['username'];
$transasis = query_data("SELECT data_transaksi.nama_produk as nama_produk,
data_transaksi.jumlah_produk as jumlah_produk,
data_transaksi.id_transaksi as id_transaksi,
data_transaksi.sub_total as sub_total,
data_transaksi.kode_unik as kode_unik,
data_transaksi.bukti_pembayaran as bukti_pembayaran,
data_transaksi.nama_pengirim as nama_pengirim,
data_transaksi.no_telpon as no_telpon,
data_transaksi.alamat as alamat,
data_transaksi.username_pembeli as username_pembeli,
data_pembeli.nama as nama
FROM data_transaksi INNER JOIN data_pembeli ON data_transaksi.username_pembeli=data_pembeli.username WHERE data_transaksi.username_penjual='$username' AND data_transaksi.status='Diterima'");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require './views/link.php';
    ?>

    <title>Dashboard Seller</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <?php
            $page = 7;
            $title_nav = 'Laporan';
            require './views/sidebar.php';
            ?>

        </div>


        <div class="col-12 col-xl-9">
            <?php
            require './views/navbar.php'
            ?>

            <div class="content">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="statistics-card simple mb-5 table-responsive">
                            <h4 class="mt-2">Data Produk</h4>
                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="align-middle">Username Pembeli</th>
                                            <th class="align-middle">Nama Pembeli</th>
                                            <th class="align-middle text-center">Produk</th>
                                            <th class="align-middle">Jumlah</th>
                                            <th class="align-middle">Total</th>
                                            <th class="align-middle">Bukti Transfer</th>
                                            <th class="align-middle">Alamat</th>
                                            <th class="align-middle">Nama Pengirim</th>
                                            <th class="align-middle">No. Telpon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($transasis as $transasi) :
                                        ?>
                                            <tr>
                                                <td class="text-center">No</td>
                                                <td><?= $transasi['username_pembeli'] ?></td>
                                                <td><?= $transasi['nama'] ?></td>
                                                <td><?= $transasi['nama_produk'] ?></td>
                                                <td><?= $transasi['jumlah_produk'] ?> kg</td>
                                                <td><?= format_rupiah($transasi['sub_total'] + $transasi['kode_unik']) ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#daftar-data">
                                                        <ion-icon name="eye-outline" size='normal'></ion-icon>
                                                    </button>
                                                </td>
                                                <td><?= $transasi['alamat'] ?></td>
                                                <td><?= $transasi['nama_pengirim'] ?></td>
                                                <td><?= $transasi['no_telpon'] ?></td>
                                                <div class="modal modal-custom fade" id="daftar-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Bukti Transfer</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="../bukti_pembayaran/<?= $transasi['bukti_pembayaran'] ?>" class="w-100" alt="">
                                                                <div class="text-center mt-2">
                                                                    <button type="button" class="btn btn-sm btn-secondary mr-2" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require './views/script.php';
    ?>
</body>

</html>