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
            <h1 class="title" data-aos="zoom-in-up" data-aos-duration="1000">Beras Rojolele</h1>
            <div class="row mt-4 justify-content-center justify-content-md-center justify-content-xl-start">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 offset-xl-1">
                    <div class="card-product mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="px-3 pt-3">
                            <img src="asset/img/product (1).png" alt="" class="img-fluid w-100">
                        </div>
                        <div class="deskripsi-product px-3">
                            <h6>Deskripsi Beras Rojolele</h6>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                                obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                                nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                                tenetur error, harum nesciunt ipsum debitis quas aliquid.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                    <div class="card-product" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="mx-4 detail-checkout">
                            <h4>Start Checkout</h4>
                            <p>Stock: <span class="stock">18 kg</span></p>
                            <h3><span class="price">Rp. 15.000</span> / kg</h3>
                            <p class="quest">Berapa kg yang ingin kamu beli ?</p>
                            <div class="d-flex">
                                <button class="btn-minus" onclick="dec()">-</button>
                                <input type="text" placeholder="1" name="jumlah" id="jumlah">
                                <button class="btn-plus" onclick="inc()">+</button>
                            </div>
                            <p class="mt-4">Sub total harga <span class="sub-total" id="subTotal">Rp. 15.000 / 1 kg</span></p>
                            <p class="note">Note: Sub total belum termasuk ongkir</p>
                            <div class="btn-checkout-margin">
                                <a href="checkout_step_1.php" class="btn-checkout-detail">Checkout</a>
                            </div>
                        </div>
                        <hr class="hr-checkout">
                        <div class="mx-4 d-flex pb-4 profile-checkout">
                            <div>
                                <img src="asset/img/profile (2).png" alt="">
                            </div>
                            <div>
                                <p>M. Yusuf</p>
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