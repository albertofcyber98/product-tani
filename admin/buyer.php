<?php
require './function/function_connection.php';
require './function/function_global.php';
require './function/function_buyer.php';
$pembeli_aktifs = query_data("SELECT * FROM data_pembeli WHERE status='Aktif'");
$cek_pembeli_aktifs = mysqli_query($conn, "SELECT * FROM data_pembeli WHERE status='Aktif'");
$results_pembeli_aktif = mysqli_num_rows($cek_pembeli_aktifs);
$pembeli_belums = query_data("SELECT * FROM data_pembeli WHERE status='Belum'");
$cek_pembeli_belums = mysqli_query($conn, "SELECT * FROM data_pembeli WHERE status='Belum'");
$results_pembeli_belum = mysqli_num_rows($cek_pembeli_belums);
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
$result = data_admin($_SESSION['username']);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require './views/link.php';
    ?>

    <title>Admin</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <?php
            $page = 4;
            $title_nav = 'Akun Pembeli';
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
                        <div class="statistics-card simple mb-5 table-responsive">
                            <h4 class="mt-2">Data Pembeli Aktif</h4>
                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="align-middle">Username</th>
                                            <th class="align-middle text-center">Nama</th>
                                            <th class="align-middle text-center">Jenis Kelamin</th>
                                            <th class="align-middle text-center">Nomor HP</th>
                                            <th class="align-middle text-center">Email</th>
                                            <th class="align-middle text-center">Alamat</th>
                                            <th class="align-middle text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if ($results_pembeli_aktif === 0) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" colspan="8">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    } else {
                                    ?>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pembeli_aktifs as $pembeli_aktif) :
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?= $no ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['username'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['nama'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['jenis_kelamin'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['nomor_hp'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['email'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_aktif['alamat'] ?></td>
                                                    <td class="text-center">
                                                        <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapuss<?= $pembeli_aktif['username']; ?>">Hapus</button>
                                                    </td>
                                                    <!-- Modal Hapus-->
                                                    <div class="modal fade" id="modalHapuss<?= $pembeli_aktif['username']; ?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Data</h5>
                                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                                        <?php
                                                                        $username = $pembeli_aktif['username'];
                                                                        $edits = query_data("SELECT * FROM data_pembeli WHERE username='$username'");
                                                                        foreach ($edits as $edit) :
                                                                        ?>
                                                                            <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                                            <p>Yakin untuk menghapus data ?</p>
                                                                            <div class="flex text-center mt-4 mb-3">
                                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit" name="delete" class="btn btn-danger ml-2">Hapus</button>
                                                                            </div>
                                                                        <?php
                                                                        endforeach
                                                                        ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Hapus -->
                                                </tr>
                                            <?php
                                                $no++;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="statistics-card simple mb-5 table-responsive">
                            <h4 class="mt-2">Data Pembeli Pending</h4>
                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="align-middle">Username</th>
                                            <th class="align-middle text-center">Nama</th>
                                            <th class="align-middle">Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if ($results_pembeli_belum === 0) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" colspan="8">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    } else {
                                    ?>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pembeli_belums as $pembeli_belum) :
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?= $no ?></td>
                                                    <td class="align-middle"><?= $pembeli_belum['username'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_belum['nama'] ?></td>
                                                    <td class="align-middle"><?= $pembeli_belum['jenis_kelamin'] ?></td>
                                                    <td class="text-center">
                                                        <button class="mb-2 ml-2 btn-update-table" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $pembeli_belum['username']; ?>">Aktif</button>
                                                        <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $pembeli_belum['username']; ?>">Hapus</button>
                                                    </td>
                                                    <!-- Modal Hapus-->
                                                    <div class="modal fade" id="modalHapus<?= $pembeli_belum['username']; ?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Data</h5>
                                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                                        <?php
                                                                        $username = $pembeli_belum['username'];
                                                                        $edits = query_data("SELECT * FROM data_pembeli WHERE username='$username'");
                                                                        foreach ($edits as $edit) :
                                                                        ?>
                                                                            <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                                            <p>Yakin untuk menghapus data ?</p>
                                                                            <div class="flex text-center mt-4 mb-3">
                                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit" name="delete" class="btn btn-danger ml-2">Hapus</button>
                                                                            </div>
                                                                        <?php
                                                                        endforeach
                                                                        ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Hapus -->
                                                    <!-- Modal Edit -->
                                                    <div class="modal fade" id="modalEdit<?= $pembeli_belum['username']; ?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Data</h5>
                                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form role="form" action="#" method="POST" autocomplete="off">
                                                                        <?php
                                                                        $username = $pembeli_belum['username'];
                                                                        $edits = query_data("SELECT * FROM data_pembeli WHERE username='$username'");
                                                                        foreach ($edits as $edit) :
                                                                        ?>
                                                                            <input type="hidden" class="form-control" name="username" value="<?= $edit['username']; ?>">
                                                                            <p>Aktifkan akun penjual ?</p>
                                                                            <div class="flex text-center mt-4 mb-3">
                                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit" name="update" class="text-white btn btn-warning ml-2">Aktif</button>
                                                                            </div>
                                                                        <?php endforeach ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Edit -->
                                                </tr>
                                            <?php
                                                $no++;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require './views/script.php';
    if (isset($_POST['delete'])) {
        if (delete_buyer($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("buyer.php");
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
                        text: "Gagal dihapus",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("buyer.php");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['update'])) {
        if (update_buyer($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil aktif",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("buyer.php");
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
                        text: "Gagal aktif",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("buyer.php");
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