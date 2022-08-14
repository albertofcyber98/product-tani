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
ON data_produk.username_penjual = data_penjual.username");
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
    <title>Produk</title>
</head>

<body>
    <?php
    require './views/navbar.php';
    ?>
    <main class="container">
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
        </section>
    </main>
    <?php
    require './views/footer.php';
    require './views/script.php';
    ?>
</body>

</html>