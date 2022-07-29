<?php
require './function/function_connection.php';
require './function/function_profil.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
$result = data_penjual($_SESSION['username']);
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
            $page = 4;
            $title_nav = 'Transaksi Pending';
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
                                            <th class="align-middle">Nama Produk</th>
                                            <th class="align-middle text-center">Gambar Produk</th>
                                            <th class="align-middle">Deskripsi Produk</th>
                                            <th class="align-middle">Harga Produk</th>
                                            <th class="align-middle">Stok Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">No</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>61</td>
                                            <td>5421</td>
                                        </tr>
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