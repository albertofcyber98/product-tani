<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
}
require './function/function_connection.php';
require './function/function_product.php';
$username = $_SESSION['username'];
$produks = query_data("SELECT * FROM data_produk WHERE username_penjual='$username'");
$result = data_penjual($_SESSION['username']);
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

    <title>Dashboard Seller</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <?php
            $page = 3;
            $title_nav = 'Produk';
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
                            <h4 class="mt-2">Data Produk</h4>
                            <div class="table-responsive mt-4">
                                <table id="example" class="table table-striped table-bordered nowrap " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="align-middle">Nama Produk</th>
                                            <th class="align-middle text-center">Gambar Produk</th>
                                            <th class="align-middle">Deskripsi Produk</th>
                                            <th class="align-middle">Harga Produk</th>
                                            <th class="align-middle">Stok Produk</th>
                                            <th class="align-middle text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($produks as $produk) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td><?= $produk['nama_produk'] ?></td>
                                                <td class="text-center">
                                                    <img src="./img/<?= $produk['foto'] ?>" alt="">
                                                </td>
                                                <td><?= $produk['deskripsi_produk'] ?></td>
                                                <td><?= $produk['harga_produk'] ?></td>
                                                <td><?= $produk['stok_produk'] ?></td>
                                                <td class="text-center">
                                                    <button class="mb-2 ml-2 btn-update-table" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $produk['id']; ?>">Ubah</button>
                                                    <button class="btn-delete-table" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $produk['id']; ?>">Hapus</button>
                                                </td>
                                                <!-- Modal Hapus-->
                                                <div class="modal fade" id="modalHapus<?= $produk['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $id = $produk['id'];
                                                                    $edits = query_data("SELECT * FROM data_produk WHERE id='$id'");
                                                                    foreach ($edits as $edit) :
                                                                    ?>
                                                                        <input type="hidden" name="id" value="<?= $edit['id']; ?>">
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
                                                <div class="modal fade" id="modalEdit<?= $produk['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="#" enctype="multipart/form-data" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $id = $produk['id'];
                                                                    $edits = query_data("SELECT * FROM data_produk WHERE id='$id'");
                                                                    foreach ($edits as $edit) :
                                                                    ?>
                                                                        <input type="hidden" class="form-control" name="id" value="<?= $edit['id']; ?>">
                                                                        <input type="hidden" class="form-control" name="fileLama" value="<?= $edit['foto']; ?>">
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Nama Produk</label>
                                                                            <div class="col-8">
                                                                                <input type="text" class="form-control" name="nama_produk" value="<?= $edit['nama_produk'] ?>" placeholder="Nama Produk">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Deskripsi Produk</label>
                                                                            <div class="col-8">
                                                                                <textarea name="deskripsi_produk" class="form-control" cols="30" rows="5"><?= $edit['deskripsi_produk'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Harga Produk</label>
                                                                            <div class="col-6">
                                                                                <input type="number" class="form-control" name="harga_produk" value="<?= $edit['harga_produk'] ?>" placeholder="0">
                                                                            </div>
                                                                            <div class="col-2 align-self-center">
                                                                                <label>/kg</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Stok Produk</label>
                                                                            <div class="col-3 d-flex">
                                                                                <input type="number" class="form-control" name="stok_produk" value="<?= $edit['stok_produk'] ?>" placeholder="0">
                                                                            </div>
                                                                            <div class="col-2 align-self-center">
                                                                                <label>kg</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-4 col-form-label">Foto Produk</label>
                                                                            <div class="col-8">
                                                                                <input type="file" class="form-control" name="foto">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <h6 style="font-size: 15px; font-weight: 300; color:red;">*foto wajib memiliki ukuran lebar 255px dan tinggi 205px </h6>
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
                                                        <input type="hidden" class="form-control" name="username" value="<?= $username ?>">
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Nama Produk</label>
                                                            <div class="col-8">
                                                                <input type="text" class="form-control" name="nama_produk" required placeholder="Nama Produk">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Deskripsi Produk</label>
                                                            <div class="col-8">
                                                                <textarea name="deskripsi_produk" class="form-control" cols="30" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Harga Produk</label>
                                                            <div class="col-6">
                                                                <input type="number" class="form-control" name="harga_produk" required placeholder="0">
                                                            </div>
                                                            <div class="col-2 align-self-center">
                                                                <label>/kg</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Stok Produk</label>
                                                            <div class="col-3 d-flex">
                                                                <input type="number" class="form-control" name="stok_produk" required placeholder="0">
                                                            </div>
                                                            <div class="col-2 align-self-center">
                                                                <label>kg</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-4 col-form-label">Foto Produk</label>
                                                            <div class="col-8">
                                                                <input type="file" class="form-control" name="foto" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <h6 style="font-size: 15px; font-weight: 300; color:red;">*foto wajib memiliki ukuran lebar 255px dan tinggi 205px </h6>
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
        if (add_produk($_POST) > 0) {
            echo '
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil ditambahkan",
                            icon: "success",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("produk.php");
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
                                window.location.replace("produk.php");
                            }else{
                                //if no clicked => do something else
                            }
                        });
                    </script>
                ';
        }
    }
    if (isset($_POST['delete'])) {
        if (delete_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("produk.php");
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
                            window.location.replace("produk.php");
                        }else{
                            //if no clicked => do something else
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['update'])) {
        if (update_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("produk.php");
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
                            window.location.replace("produk.php");
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