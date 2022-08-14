<?php
$id_produk = $_GET['id'];
session_start();
if (!isset($_SESSION['username'])) {
    $username_pembeli = '';
} else {
    $username_pembeli = $_SESSION['username'];
}
require './function/function_checkout.php';
$query_data = mysqli_query($conn, "SELECT data_produk.id as id, 
data_produk.nama_produk as nama_produk,
data_produk.foto as foto,
data_produk.harga_produk as harga_produk,
data_produk.deskripsi_produk as deskripsi_produk,
data_produk.stok_produk as stok_produk,
data_penjual.nama as nama,
data_produk.username_penjual as username_penjual,
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
                            <form action="" method="post">
                                <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                <input type="hidden" name="username_pembeli" value="<?= $username_pembeli ?>">
                                <input type="hidden" name="username_penjual" value="<?= $result['username_penjual'] ?>">
                                <h4>Start Checkout</h4>
                                <p>Stock: <span class="stock"><?= $result['stok_produk'] ?> kg</span></p>
                                <h3><span class="price"><?= format_rupiah($result['harga_produk']) ?></span> / kg</h3>
                                <p class="quest">Berapa kg yang ingin kamu beli ?</p>
                                <div class="d-flex">
                                    <a class="btn-minus" onclick="dec()">-</a>
                                    <input type="text" placeholder="0" onchange="getJumlah(this.value)" name="jumlah" id="jumlah">
                                    <a class="btn-plus" onclick="inc()">+</a>
                                </div>
                                <p class="mt-4">Sub total harga <span class="sub-total" id="subTotal">Rp. 0 / 0 kg</span></p>
                                <p class="note">Note: Sub total belum termasuk ongkir</p>
                                <div class="btn-checkout-margin">
                                    <?php
                                    if (!isset($_SESSION['username'])) {
                                    ?>
                                        <a href="signin.php" class="btn-login-checkout">Login</a>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="submit" name="checkout" class="btn-checkout-detail">Checkout</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </form>
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
    if (isset($_POST['checkout'])) {
        $resultReturn = add_checkout($_POST);
        if ($resultReturn[0] > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Checkout",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("checkout.php?invoice=' . $resultReturn[1] . '");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Checkout",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("detail_checkout.php?id=' . $id_produk . '");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        }
    }
    ?>
</body>

</html>