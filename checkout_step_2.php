<?php
require './function/function_checkout.php';
$invoice = $_GET['invoice'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require './views/link.php';
    ?>
    <title>Step 2</title>
</head>

<body class="container">
    <main class="step-2">
        <section class="step-bar d-flex">
            <div class="row mx-auto">
                <div>
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">
                </div>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 " data-aos="zoom-in-up" data-aos-duration="1000">
                <form action="" method="post" enctype="multipart/form-data">
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
                            <input type="number" name="no_telpon" required class="form-control" id="no_telpon">
                        </div>
                        <div class="mt-4">
                            <label for="bukti_pembayaran">Bukti Transfer</label>
                        </div>
                        <div class="mt-2 mb-3">
                            <input type="file" name="foto" required class="form-control" id="bukti_pembayaran">
                        </div>
                    </div>
                    <div class="btn-finish-step-2 text-center">
                        <button type="submit" name="submit">Finish</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require './views/script.php';
    if (isset($_POST['submit'])) {
        if (add_pembayaran($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    window.location.replace("checkout_step_3.php");
                </script>
                ';
        } else {
            echo '
                <script type="text/javascript">
                    window.location.replace("checkout_step_2.php?invoice=' . $invoice . '");
                </script>
                ';
        }
    }
    ?>
</body>

</html>