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

    <!-- Bootstrap CSS -->
    <?php
    require './views/link.php'
    ?>

    <title>Dashboard Seller</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <?php
            $page = 1;
            $title_nav = 'Dashboard';
            require './views/sidebar.php';
            ?>

        </div>


        <div class="col-12 col-xl-9">
            <?php
            require './views/navbar.php'
            ?>
            <div class="content">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card simple">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                    <h5 class="content-desc">Produk</h5>
                                    <h3 class="statistics-value">1</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card simple">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                    <h5 class="content-desc">Transaksi pending</h5>
                                    <h3 class="statistics-value">1</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card simple">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                    <h5 class="content-desc">Transaksi verif</h5>
                                    <h3 class="statistics-value">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card simple">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                    <h5 class="content-desc">Pengiriman</h5>
                                    <h3 class="statistics-value">2</h3>
                                </div>
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