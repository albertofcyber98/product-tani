<?php
require './function/function_connection.php';
require './function/function_signup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style-sign.css">
    <title>Sign up</title>
</head>

<body class="background-register">
    <main>
        <div class="text-center">
            <a href="index.php">
                <img src="../asset/img/logo.png" alt="" width="160px">
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-4">
                <div class="card-login">
                    <h1 class="text-center mb-4">Sign Up Seller</h1>
                    <form action="" method="POST">
                        <div class="input-login mb-4 mt-3">
                            <h5>Fullname</h5>
                            <input type="text" name="fullname" placeholder="Enter your fullname">
                        </div>
                        <div class="input-login mt-3">
                            <h5>Username</h5>
                            <input type="text" name="username" placeholder="Enter your username">
                        </div>
                        <div class="input-login mt-3">
                            <h5>Password</h5>
                            <input type="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="input-login mt-3 mb-2">
                            <h5>Jenis Kelamin</h5>
                        </div>
                        <div class="flex mb-1">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="mx-2" id="laki-laki">
                            <label for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="flex">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="mx-2" id="perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                        <div class="text-center btn-sign-in">
                            <button type="submit" name="submit_signup" class="btn-signup">Create Account</button>
                        </div>
                    </form>
                </div>
                <p class="text-center link-signup">Already have an account ? <a href="signin.php">Sign in</a> or <a href="signin.php">Sign in a Seller</a></p>
            </div>
        </div>
    </main>
    <?php
    require './views/script.php';
    if (isset($_POST['submit_signup'])) {
        $cek_username = $_POST['username'];
        $query_cek = "SELECT * FROM data_pembeli WHERE username = '$cek_username'";
        $result_cek = mysqli_query($conn, $query_cek);
        if (mysqli_num_rows($result_cek) === 0) {
            if (signup($_POST) > 0) {
                echo '
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Menunggu konfirmasi persetujuan admin",
                            icon: "success",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("signin.php");
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
                            text: "Gagal Ditambahkan",
                            icon: "error",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("signup.php");
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
                            window.location.replace("signup.php");
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