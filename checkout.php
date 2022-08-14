<?php
require './function/function_checkout.php';
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
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
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
    <title>Checkout</title>
</head>

<body class="container">
    <main class="step-1">
        <form action="" method="post" enctype="multipart/form-data">
            <section class="row justify-content-center">
                <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 " data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="card-product">
                        <input type="hidden" name="invoice" value="<?= $invoice ?>">
                        <div>
                            <label for="alamat">Detail Alamat</label>
                        </div>
                        <div class="mt-2">
                            <textarea name="detail_alamat" id="alamat" class="form-control col-alamat" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="mt-4">
                            <label for="desa">Desa</label>
                        </div>
                        <div class="mt-2">
                            <select name="desa" id="desa" class="form-control">
                                <option selected>--Pilih--</option>
                                <option value="Desa Tobadak (Tobadak 1)">Desa Tobadak (Tobadak 1)</option>
                                <option value="Desa Mahahe (Tobadak 2)">Desa Mahahe (Tobadak 2)</option>
                                <option value="Desa Polongaan (Tobadak 3)">Desa Polongaan (Tobadak 3)</option>
                                <option value="Desa Batu Parigi (Tobadak 4)">Desa Batu Parigi (Tobadak 4)</option>
                                <option value="Desa Sulobaja (Tobadak 5)">Desa Sulobaja (Tobadak 5)</option>
                                <option value="Desa Bambadaru (Tobadak 6)">Desa Bambadaru (Tobadak 6)</option>
                                <option value="Desa Sejati (Tobadak 7)">Desa Sejati (Tobadak 7)</option>
                                <option value="Desa Saluadak (Tobadak 8)">Desa Saluadak (Tobadak 8)</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="nama_pengirim">Nama Pengirim <span style="font-size: 12px;">(Nama pengirim akun bank)</span></label>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="nama_pengirim" required class="form-control" id="nama_pengirim">
                        </div>
                        <div class="mt-4">
                            <label for="no_telpon">No Telpon/WA</label>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="no_telpon" required class="form-control" id="no_telpon" placeholder="082245xxxxxx">
                        </div>
                        <div class="mt-4">
                            <label for="bukti_pembayaran">Bukti Transfer</label>
                        </div>
                        <div class="mt-2 mb-3">
                            <input type="file" name="foto" required class="form-control" id="bukti_pembayaran">
                        </div>
                    </div>
                </div>
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
                    <div class="row mt-4 justify-content-center">
                        <div class="col">
                            <div class="btn-cancel-step-1 text-center d-block">
                                <button type="submit" name="delete">Cancel</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="btn-paid-step-1 text-center">
                                <button type="submit" name="submit">Paid</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </form>
    </main>
    <?php
    require './views/script.php';
    if (isset($_POST['submit'])) {
        if (add_pembayaran($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    window.location.replace("success.php");
                </script>
                ';
        } else {
            echo '
                <script type="text/javascript">
                    window.location.replace("checkout.php?invoice=' . $invoice . '");
                </script>
                ';
        }
    }
    ?>
</body>

</html>