<?php
$id_produk = $_GET['id'];
session_start();
require './function/function_global.php';
$query_data = mysqli_query($conn, "SELECT data_produk.id as id, 
data_produk.nama_produk as nama_produk,
data_produk.foto as foto,
data_produk.harga_produk as harga_produk,
data_produk.deskripsi_produk as deskripsi_produk,
data_produk.stok_produk as stok_produk,
data_penjual.nama as nama,
data_penjual.foto as foto_penjual 
FROM data_produk INNER JOIN data_penjual 
ON data_produk.username_penjual = data_penjual.username WHERE data_produk.id=$id_produk");
$result = mysqli_fetch_assoc($query_data);

$datas = query_data("SELECT data_produk.id as id, 
data_produk.nama_produk as nama_produk,
data_produk.foto as foto,
data_produk.harga_produk as harga_produk,
data_penjual.nama as nama,
data_penjual.foto as foto_penjual 
FROM data_produk INNER JOIN data_penjual 
ON data_produk.username_penjual = data_penjual.username 
WHERE data_produk.stok_produk>0 AND data_produk.id != $id_produk LIMIT 4");
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
    <title>Detail Produk</title>
</head>

<body>
    <?php
    require './views/navbar.php';
    ?>
    <main class="container main-class">
        <section>
            <div class="breadcrumb-custom">
                <p><a href="index.php">Beranda</a> <span class="garing-bread">/</span> <a href="produk.php">Produk</a> <span class="garing-bread">/</span> <span class="detail-breadcrumb">Detail Produk</span></p>
            </div>
        </section>
        <section class="detail-product">
            <h1 class="title" data-aos="zoom-in-up" data-aos-duration="1000"><?= $result['nama_produk'] ?></h1>
            <div class="row mt-4 justify-content-center justify-content-md-center justify-content-xl-start">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 offset-xl-1">
                    <div class="card-product mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="px-3 pt-3">
                            <img src="./penjual/img/<?= $result['foto'] ?>" alt="" class="img-fluid w-100 img-rounded">
                        </div>
                        <div class="deskripsi-product px-3">
                            <h6>Deskripsi <?= $result['nama_produk'] ?></h6>
                            <p>
                                <?= $result['deskripsi_produk'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                    <div class="card-product" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="mx-4 detail-checkout">
                            <h4>Start Checkout</h4>
                            <p>Stock: <span class="stock"><?= $result['stok_produk'] ?> kg</span></p>
                            <h3><span class="price"><?= format_rupiah($result['harga_produk']) ?></span> / kg</h3>
                            <p class="quest">Berapa kg yang ingin kamu beli ?</p>
                            <div class="d-flex">
                                <button class="btn-minus" onclick="dec()">-</button>
                                <input type="text" placeholder="1" name="jumlah" id="jumlah">
                                <button class="btn-plus" onclick="inc()">+</button>
                            </div>
                            <p class="mt-4">Sub total harga <span class="sub-total" id="subTotal">Rp. 12.000 / 1 kg</span></p>
                            <p class="note">Note: Sub total belum termasuk ongkir</p>
                            <div class="btn-checkout-margin">
                                <a href="checkout_step_1.php" class="btn-checkout-detail">Checkout</a>
                            </div>
                        </div>
                        <hr class="hr-checkout">
                        <div class="row mx-3 pb-4 profile-checkout">
                            <div class="col d-flex">
                                <div class="foto-penjual">
                                    <img src="./penjual/img/<?= $result['foto_penjual'] ?>" alt="" onload="fixAspect(this);">
                                </div>
                                <div>
                                    <p><?= $result['nama'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="detail-product-lain">
            <h1 data-aos="zoom-in-up" data-aos-duration="1000">Produk Lainnya</h1>
            <div class="row justify-content-center mt-4">
                <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                        <img src="asset/img/product (1).png" class="w-100 img-fluid px-3 pt-3" alt="">
                        <div class="px-3">
                            <h4>Beras Rojolele</h4>
                            <h6>Rp 16.000/kg</h6>
                        </div>
                        <hr>
                        <div class="row px-3 profile-product pb-2">
                            <div class="col d-flex">
                                <div>
                                    <img src="asset/img/profile (1).png" width="40px" alt="">
                                </div>
                                <div>
                                    <p>Isma</p>
                                </div>
                            </div>
                            <div class="col-4 col-lg2 justify-content-center">
                                <div class="btn-buy-profile">
                                    <a href="">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                        <img src="asset/img/product (2).png" class="w-100 img-fluid px-3 pt-3" alt="">
                        <div class="px-3">
                            <h4>Beras Pandanwangi</h4>
                            <h6>Rp 11.000/kg</h6>
                        </div>
                        <hr>
                        <div class="row px-3 profile-product pb-2">
                            <div class="col d-flex">
                                <div>
                                    <img src="asset/img/profile (2).png" width="40px" alt="">
                                </div>
                                <div>
                                    <p>M.Yusuf</p>
                                </div>
                            </div>
                            <div class="col-4 col-lg2 justify-content-center">
                                <div class="btn-buy-profile">
                                    <a href="">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                        <img src="asset/img/product (3).png" class="w-100 img-fluid px-3 pt-3" alt="">
                        <div class="px-3">
                            <h4>Beras IR64</h4>
                            <h6>Rp 9.000/kg</h6>
                        </div>
                        <hr>
                        <div class="row px-3 profile-product pb-2">
                            <div class="col d-flex">
                                <div>
                                    <img src="asset/img/profile (3).png" width="40px" alt="">
                                </div>
                                <div>
                                    <p>Suryono</p>
                                </div>
                            </div>
                            <div class="col-4 col-lg2 justify-content-center">
                                <div class="btn-buy-profile">
                                    <a href="">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                        <img src="asset/img/product (4).png" class="w-100 img-fluid px-3 pt-3" alt="">
                        <div class="px-3">
                            <h4>Beras Solok</h4>
                            <h6>Rp 16.000/kg</h6>
                        </div>
                        <hr>
                        <div class="row px-3 profile-product pb-2">
                            <div class="col d-flex">
                                <div>
                                    <img src="asset/img/profile (4).png" width="40px" alt="">
                                </div>
                                <div>
                                    <p>Supono</p>
                                </div>
                            </div>
                            <div class="col-4 col-lg2 justify-content-center">
                                <div class="btn-buy-profile">
                                    <a href="">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require './views/footer.php';
    require './views/script.php';
    ?>
</body>

</html>