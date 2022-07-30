<?php
require './function/function_connection.php';
require './function/function_global.php';
require './function/function_seller.php';
$penjual_aktifs = query_data("SELECT * FROM data_penjual WHERE status='Aktif'");
$penjual_belums = query_data("SELECT * FROM data_penjual WHERE status='Belum'");
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
            $page = 3;
            $title_nav = 'Akun Penjual';
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
                            <h4 class="mt-2">Data Penjual Aktif</h4>
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
                                            <th class="align-middle text-center">Nama Akun Bank</th>
                                            <th class="align-middle text-center">Nama Bank</th>
                                            <th class="align-middle text-center">No Rekening</th>
                                            <th class="align-middle text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penjual_aktifs as $penjual_aktif) :
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $no ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['username'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['nama'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['jenis_kelamin'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['nomor_hp'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['email'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['alamat'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['nama_akun_bank'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['nama_bank'] ?></td>
                                                <td class="align-middle"><?= $penjual_aktif['no_rekening'] ?></td>
                                                <td class="text-center">
                                                    <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapuss<?= $penjual_aktif['username']; ?>">Hapus</button>
                                                </td>
                                                <!-- Modal Hapus-->
                                                <div class="modal fade" id="modalHapuss<?= $penjual_aktif['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $penjual_aktif['username'];
                                                                    $edits = query_data("SELECT * FROM data_penjual WHERE username='$username'");
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
                                </table>
                            </div>
                        </div>
                        <div class="statistics-card simple mb-5 table-responsive">
                            <h4 class="mt-2">Data Penjual Pending</h4>
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
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penjual_belums as $penjual_belum) :
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $no ?></td>
                                                <td class="align-middle"><?= $penjual_belum['username'] ?></td>
                                                <td class="align-middle"><?= $penjual_belum['nama'] ?></td>
                                                <td class="align-middle"><?= $penjual_belum['jenis_kelamin'] ?></td>
                                                <td class="text-center">
                                                    <button class="mb-2 ml-2 btn-update-table" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $penjual_belum['username']; ?>">Aktif</button>
                                                    <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $penjual_belum['username']; ?>">Hapus</button>
                                                </td>
                                                <!-- Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $penjual_belum['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $penjual_belum['username'];
                                                                    $edits = query_data("SELECT * FROM data_penjual WHERE username='$username'");
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
                                                <div class="modal fade" id="modalEdit<?= $penjual_belum['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="#" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $penjual_belum['username'];
                                                                    $edits = query_data("SELECT * FROM data_penjual WHERE username='$username'");
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
        if (delete_seller($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("seller.php");
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
                            window.location.replace("seller.php");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['update'])) {
        if (update_seller($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil aktif",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("seller.php");
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
                            window.location.replace("seller.php");
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