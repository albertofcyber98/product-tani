<?php
session_start();
require './function/function_global.php';
$datas = query_data("SELECT data_produk.id as id, 
data_produk.nama_produk as nama_produk,
data_produk.foto as foto,
data_produk.harga_produk as harga_produk,
data_penjual.nama as nama,
data_penjual.foto as foto_penjual 
FROM data_produk INNER JOIN data_penjual 
ON data_produk.username_penjual = data_penjual.username 
WHERE data_produk.stok_produk>0 LIMIT 4");
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
    <title>Beranda</title>
</head>

<body>
    <?php
    require './views/navbar.php'
    ?>
    <header>
        <h1 class="text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000">Beras dengan <span>kualitas baik</span> <br>
            dan <span>harga terjangkau</span> <br>
            dari para <span>petani</span>
        </h1>
        <div class="text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000">
            <a href="produk.php">Mulai Belanja</a>
        </div>
    </header>
    <main class="container">
        <section class="benefit row justify-content-center">
            <div class="col-10 col-sm-9 col-md-6 col-lg-4">
                <div class="card-benefit mb-3" data-aos="fade-right" data-aos-duration="1000">
                    <div class="d-flex px-3">
                        <div class="mt-3 ml-3">
                            <img src="asset/img/icon-quality.png" width="80px" alt="benefit-produk">
                        </div>
                        <div class="mt-4 benefit-deskripsi">
                            <h6>Kualitas Baik</h6>
                            <p>Untuk kualitas beras sangat baik tentunya</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-9 col-md-6 col-lg-4">
                <div class="card-benefit mb-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="d-flex px-3">
                        <div class="mt-3 ml-3">
                            <img src="asset/img/icon-price.png" width="80px" alt="">
                        </div>
                        <div class="mt-4 benefit-deskripsi">
                            <h6>Harga Murah</h6>
                            <p>Harga yang ditawarkan para petani murah</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-9 col-md-6 col-lg-4">
                <div class="card-benefit mb-3" data-aos="fade-left" data-aos-duration="1000">
                    <div class="d-flex px-3">
                        <div class="mt-3 ml-3">
                            <img src="asset/img/icon-product.png" width="80px" alt="">
                        </div>
                        <div class="mt-4 benefit-deskripsi">
                            <h6>Jenis Beras</h6>
                            <p>Banyak jenis beras yang dijual oleh para petani</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product">
            <div class="title-product" data-aos="zoom-in-up" data-aos-duration="1000">
                <h1 class="text-center">Produk</h1>
                <p class="text-center">“Berbagai jenis beras dengan harga relatif murah”</p>
            </div>
            <div class="row justify-content-center">
                <?php
                foreach ($datas as $data) :
                ?>
                    <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                            <div class="mx-3 pt-3">
                                <img src="./penjual/img/<?= $data['foto'] ?>" class="w-100 img-rounded" alt="">
                            </div>
                            <div class="px-3">
                                <h4><?= $data['nama_produk'] ?></h4>
                                <h6><?= format_rupiah($data['harga_produk']) ?>/kg</h6>
                            </div>
                            <hr>
                            <div class="row px-3 profile-product pb-2">
                                <div class="col d-flex">
                                    <div class="foto-penjual">
                                        <img src="./penjual/img/<?= $data['foto_penjual'] ?>" alt="" onload="fixAspect(this);">
                                    </div>
                                    <div>
                                        <p><?= $data['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4 justify-content-center">
                                    <div class="btn-buy-profile">
                                        <a href="detail_produk.php?id=<?= $data['id'] ?>">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <div class="text-center btn-lainnya" data-aos="zoom-in-up" data-aos-duration="2000">
                <a href="">Lainnya</a>
            </div>
        </section>
        <section class="testimoni" id="testimoni">
            <div class="title-testimoni text-center" data-aos="zoom-in-down" data-aos-duration="1000">
                <h1>Testimoni</h1>
                <p>“Pengalaman mereka berbelanja langsung <br>
                    dengan para petani lewat platform ini”</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-sm-9 col-md-6 col-lg-4 col-xl-3">
                    <div class="card-testimoni d-flex mb-4" data-aos="zoom-in-down" data-aos-duration="1000">
                        <div>
                            <img src="asset/img/testimoni (1).png" width="50px" alt="">
                        </div>
                        <div class="title-card-testimoni">
                            <h5>Hermawan</h5>
                            <h6>Wiraswasta</h6>
                            <p>“Beras yang ditawarkan relatif murah”</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-9 col-md-6 col-lg-4 col-xl-3">
                    <div class="card-testimoni d-flex mb-4" data-aos="zoom-in-down" data-aos-duration="1000">
                        <div>
                            <img src="asset/img/testimoni (2).png" width="50px" alt="">
                        </div>
                        <div class="title-card-testimoni">
                            <h5>Lisa</h5>
                            <h6>Ibu Rumah Tangga</h6>
                            <p>“Berbagai jenis beras tersedia disini”</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-9 col-md-6 col-lg-4 col-xl-3">
                    <div class="card-testimoni d-flex mb-4" data-aos="zoom-in-down" data-aos-duration="1000">
                        <div>
                            <img src="asset/img/testimoni (3).png" width="50px" alt="">
                        </div>
                        <div class="title-card-testimoni">
                            <h5>Arnold</h5>
                            <h6>PNS</h6>
                            <p>“Selalu belanja disini karena murah”</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-9 col-md-6 col-lg-4 col-xl-3">
                    <div class="card-testimoni d-flex mb-4" data-aos="zoom-in-down" data-aos-duration="1000">
                        <div>
                            <img src="asset/img/testimoni (4).png" width="50px" alt="">
                        </div>
                        <div class="title-card-testimoni">
                            <h5>Angel</h5>
                            <h6>Wiraswasta</h6>
                            <p>“Harga yang murah dan kualitas baik”</p>
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