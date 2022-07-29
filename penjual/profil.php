<?php
require './function/function_connection.php';
require './function/function_profil.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
$result = data_penjual($_SESSION['username']);
if (isset($_POST['logout'])) {
    $_SESSION['username'] = '';
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    header('Location: signin.php');
}
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
            $page = 2;
            $title_nav = 'Profil';
            require './views/sidebar.php'
            ?>

        </div>


        <div class="col-12 col-xl-9">
            <?php
            require './views/navbar.php'
            ?>

            <div class="content">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="statistics-card simple mb-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-10 col-md-8 col-lg-7 col-xl-6">
                                        <div class="d-flex justify-content-center mt-4">
                                            <div class="circleFotoProfil">
                                                <img src="
                                                <?php
                                                if ($result['foto'] == '' && $result['jenis_kelamin'] == 'Laki-laki') {
                                                    echo '../asset/img/img-male.jpg';
                                                } else if ($result['foto'] == '' && $result['jenis_kelamin'] == 'Perempuan') {
                                                    echo '../asset/img/img-famela.jpg';
                                                } else {
                                                    echo 'img/' . $result['foto'];
                                                }
                                                ?>
                                                " alt="" onload="fixAspect(this);">
                                            </div>
                                            <!-- <div>
                                                <img src="asset/img/img-camera.png" alt="" width="120px" class="position-absolute top-50 start-50 translate-middle img-camera">
                                            </div> -->
                                        </div>
                                        <input type="hidden" name="fileLama" value="<?= $result['foto']; ?>">
                                        <input type="hidden" value="<?= $result['username'] ?>" name="username" class="form-control">
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Nama Lengkap
                                            </label>
                                            <input type="text" value="<?= $result['nama'] ?>" name="nama" class="form-control">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Jenis Kelamin
                                            </label>
                                            <div class="row">
                                                <div>
                                                    <input <?= $result['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?> type="radio" name="jenis_kelamin" value="Laki-laki" id="laki-laki" class="align-items-center">
                                                    <label for="laki-laki" class="form-label">Laki-laki</label>
                                                </div>
                                                <div>
                                                    <input <?= $result['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?> type="radio" class="ml-3" name="jenis_kelamin" value="Perempuan" id="perempuan">
                                                    <label for="perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Nomor Handphone
                                            </label>
                                            <input type="text" value="<?= $result['nomor_hp'] ?>" name="nomor_hp" class="form-control">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Email
                                            </label>
                                            <input type="email" value="<?= $result['email'] ?>" name="email" class="form-control">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Alamat
                                            </label>
                                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Tobadak 3"><?= $result['alamat'] ?></textarea>
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Nama Akun Bank
                                            </label>
                                            <input type="text" placeholder="Hermawan Suryanto" class="form-control" value="<?= $result['nama_akun_bank'] ?>" name="nama_akun_bank">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Nama Bank
                                            </label>
                                            <input type="text" placeholder="BCA" class="form-control" value="<?= $result['nama_bank'] ?>" name="nama_bank">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Nomor Rekening
                                            </label>
                                            <input type="text" placeholder="129873812321" class="form-control" value="<?= $result['no_rekening'] ?>" name="no_rekening">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Foto Profile
                                            </label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="form-label">
                                                Password
                                            </label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button class="btn-save" name="submit_profil" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require './views/script.php';
    if (isset($_POST['submit_profil'])) {
        if (update_profil($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil update profil",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
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
                        text: "Gagal update profil",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
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