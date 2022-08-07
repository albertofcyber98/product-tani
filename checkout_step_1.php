<?php
require './function/function_global.php';
$invoice = $_GET['invoice'];
$queryKeranjang = mysqli_query(
    $conn,
    "SELECT data_transaksi.nama_produk as nama_produk, 
    data_transaksi.sub_total as sub_total,
    data_transaksi.kode_unik as kode_unik,
    data_transaksi.jumlah_produk as jumlah_produk,
    data_penjual.nama_bank as nama_bank,
    data_penjual.nama_akun_bank as nama_akun_bank,
    data_penjual.no_rekening as no_rekening
    FROM data_transaksi INNER JOIN data_penjual 
    ON data_transaksi.username_penjual=data_penjual.username 
    WHERE data_transaksi.id_transaksi='$invoice'"
);
$resultKeranjang = mysqli_fetch_assoc($queryKeranjang);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require './views/link.php'
    ?>
    <title>Step 1</title>
</head>

<body class="container">
    <main class="step-1">
        <section class="step-bar d-flex">
            <div class="row mx-auto">
                <div>
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">
                </div>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 ">
                <div class="card-product" data-aos="zoom-in-up" data-aos-duration="1000">
                    <h1 class="title-transaksi"><?= $invoice ?></h1>
                    <div class="row">
                        <div class="col">
                            <div>
                                <h2 class="title-product"><?= $resultKeranjang['nama_produk'] ?></h2>
                            </div>
                            <div>
                                <h3 class="quantity-product"><?= $resultKeranjang['jumlah_produk'] ?> kg</h3>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <h2 class="sub-total"><?= format_rupiah($resultKeranjang['sub_total']) ?></h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h3 class="title-kode-unik">Kode Unik</h3>
                        </div>
                        <div class="col">
                            <h4 class="kode-unik"><?= $resultKeranjang['kode_unik'] ?></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row total-bayar-row">
                        <div class="col">
                            <div>
                                <h1 class="title-total">Total Bayar</h1>
                            </div>
                            <div>
                                <h6 class="note-ongkir">Ongkir bayar ditempat</h6>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <h5 class="total-price"><?= format_rupiah($resultKeranjang['sub_total'] + $resultKeranjang['kode_unik']) ?></h5>
                        </div>
                    </div>
                    <div class="rekening d-flex">
                        <div class="mt-2">
                            <img src="asset/img/icon_bank.png" width="40px" alt="">
                        </div>
                        <div class="desk-rekening">
                            <h6 class="nama-penjual"><?= $resultKeranjang['nama_akun_bank'] ?></h6>
                            <p class="rek-penjual"><?= $resultKeranjang['nama_bank'] ?> - <?= $resultKeranjang['no_rekening'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="btn-cancel-step-1 text-center">
                            <a href="produk.php">Cancel</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn-paid-step-1 text-center">
                            <a href="checkout_step_2.php?invoice=<?= $invoice ?>">Paid</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require './views/script.php';
    ?>
</body>

</html>