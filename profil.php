<?php
require './function/function_connection.php';
require './function/function_profil.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
$username = $_SESSION['username'];
$data = mysqli_query($conn, "SELECT * FROM data_pembeli WHERE username='$username'");
$result = mysqli_fetch_assoc($data);
if (isset($_POST['logout'])) {
    $_SESSION['username'] = '';
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    header('Location: signin.php');
}

$transaksis = query_data("SELECT*FROM data_transaksi WHERE username_pembeli='$username'");
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
    <title>Profil</title>
</head>

<body>
    <?php
    require './views/navbar.php';
    ?>
    <main class="container profil-page">
        <div class="card-profile-page">
            <div class="position-relative">
                <div class="position-absolute top-50 start-50 translate-middle circleFotoProfil">
                    <img src="
                    <?php
                    if ($result['foto'] == '' && $result['jenis_kelamin'] == 'Laki-laki') {
                        echo 'asset/img/img-male.jpg';
                    } else if ($result['foto'] == '' && $result['jenis_kelamin'] == 'Perempuan') {
                        echo 'asset/img/img-famela.jpg';
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
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-lg-4 col-xl-4">
                    <input type="hidden" name="username" value="<?= $username ?>">
                    <input type="hidden" name="fileLama" value="<?= $result['foto']; ?>">
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Nama Lengkap
                        </label>
                        <input type="text" value="<?= $result['nama'] ?>" name="nama" placeholder="<?= $result['nama'] ?>" class="form-control">
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
                            Email
                        </label>
                        <input type="email" value="<?= $result['email'] ?>" name="email" class="form-control" placeholder="producttani@gmail.com">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Nomor Handphone
                        </label>
                        <input type="text" value="<?= $result['nomor_hp'] ?>" name="nomor_hp" placeholder="0831782xxxxx" class="form-control">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Alamat
                        </label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Jln. smadlsad"><?= $result['alamat'] ?></textarea>
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
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn-save" name="submit_profil" type="submit">Save</button>
            </div>
            <div class="text-center mt-4">
                <button class="btn-logout" name="logout" type="submit">Logout</button>
            </div>
        </form>
        <div class="tabel-riwayat">
            <h1 class="text-center">Riwayat Transaksi</h1>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-10">
                    <div class="table-responsive">
                        <table class="table table-striped table-transaksi">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                    <th>Kode Unik</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transaksis as $transaksi) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td><?= $transaksi['nama_produk'] ?></td>
                                        <td><?= $transaksi['jumlah_produk'] ?> kg</td>
                                        <td><?= format_rupiah($transaksi['sub_total']) ?></td>
                                        <td><?= $transaksi['kode_unik'] ?></td>
                                        <td><?= format_rupiah($transaksi['sub_total'] + $transaksi['kode_unik']) ?></td>
                                        <td><?= $transaksi['status'] ?></td>
                                        <td>
                                            <?php
                                            if ($transaksi['status'] === 'Pending') {
                                            ?>
                                                <a href="checkout_step_1.php?invoice=<?= $transaksi['id_transaksi'] ?>" class="btn btn-sm btn-primary text-white">Update</a>
                                            <?php
                                            } else if ($transaksi['status'] === 'Proses') {
                                            ?>
                                                <a disabled class="btn btn-sm btn-secondary text-white">Proses</a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require './views/footer.php';
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