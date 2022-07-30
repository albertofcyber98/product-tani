<?php
require './function/function_connection.php';
require './function/function_global.php';
require './function/function_admin.php';
$admins = query_data("SELECT * FROM data_admin");
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
            $page = 2;
            $title_nav = 'Akun Admin';
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
                            <div class="btn-entry-data">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#daftar-data">Tambah Data</button>
                            </div>
                            <h4 class="mt-2">Data Admin</h4>
                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="align-middle">Username</th>
                                            <th class="align-middle text-center">Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($admins as $admin) :
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $no ?></td>
                                                <td class="align-middle"><?= $admin['username'] ?></td>
                                                <td class="align-middle"><?= $admin['nama'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($_SESSION['username'] == $admin['username']) {
                                                    ?>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button class="mb-2 ml-2 btn-update-table" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $admin['username']; ?>">Ubah</button>
                                                        <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $admin['username']; ?>">Hapus</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <!-- Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $admin['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $admin['username'];
                                                                    $edits = query_data("SELECT * FROM data_admin WHERE username='$username'");
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
                                                <div class="modal fade" id="modalEdit<?= $admin['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="#" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $admin['username'];
                                                                    $edits = query_data("SELECT * FROM data_admin WHERE username='$username'");
                                                                    foreach ($edits as $edit) :
                                                                    ?>
                                                                        <input type="hidden" class="form-control" name="username" value="<?= $edit['username']; ?>">
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Password</label>
                                                                            <div class="col-8">
                                                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Nama</label>
                                                                            <div class="col-8">
                                                                                <input type="text" class="form-control" name="nama" value="<?= $edit['nama'] ?>" placeholder="Nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex text-center mt-4 mb-3">
                                                                            <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" name="update" class="text-white btn btn-warning ml-2">Ubah</button>
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
                                    <div class="modal modal-custom fade" id="daftar-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="#" enctype="multipart/form-data" autocomplete="off" id="daftarForm">
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Username</label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control" name="username" required placeholder="Username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Password</label>
                                                            <div class="col-8">
                                                                <input type="password" class="form-control" name="password" required placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Nama</label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control" name="nama" required placeholder="Nama">
                                                            </div>
                                                        </div>
                                                        <div class="btn-modal">
                                                            <button type="submit" name="add">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    if (isset($_POST['add'])) {
        $kondisi_username = $_POST['username'];
        $query = mysqli_query($conn, "SELECT*FROM data_admin WHERE username='$kondisi_username'");
        $result = mysqli_num_rows($query);
        if ($result === 0) {
            if (add_admin($_POST) > 0) {
                echo '
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil ditambahkan",
                            icon: "success",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("admin.php");
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
                            text: "Gagal ditambahkan",
                            icon: "error",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("admin.php");
                            }else{
                                //if no clicked => do something else
                            }
                        });
                    </script>
                ';
            }
        } else {
            echo '
                    <script type="text/javascript">
                        swal({
                            title: "Gagal",
                            text: "Username sudah terdaftar",
                            icon: "error",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("admin.php");
                            }else{
                                //if no clicked => do something else
                            }
                        });
                    </script>
                ';
        }
    }
    if (isset($_POST['delete'])) {
        if (delete_admin($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("admin.php");
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
                            window.location.replace("admin.php");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['update'])) {
        if (update_admin($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("admin.php");
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
                        text: "Gagal diubah",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("admin.php");
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