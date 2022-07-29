<?php
session_start();
require './function/function_signin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require './views/link.php'
    ?>
    <title>Sign in</title>
</head>

<body class="background-login">
    <main>
        <div class="text-center">
            <a href="index.php">
                <img src="asset/img/logo.png" alt="" width="160px">
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-4">
                <div class="card-login">
                    <h1 class="text-center">Welcome Back</h1>
                    <p class="text-center">Enter your credentials to access your account</p>
                    <form action="" method="POST">
                        <div class="input-login mb-4 mt-3">
                            <h5>Username</h5>
                            <input type="text" name="username" placeholder="Enter your username">
                        </div>
                        <div class="input-login">
                            <h5>Password</h5>
                            <input type="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="text-center btn-sign-in">
                            <button type="submit" name="submit_signin" class="btn-signin">Sign in</button>
                        </div>
                    </form>
                </div>
                <p class="text-center link-signup">Don’t have a account ? <a href="signup.php">Sign up</a> or <a href="./penjual/signup.php">Sign up a Seller</a></p>
            </div>
        </div>
    </main>
    <?php
    require './views/script.php';
    if (isset($_POST['submit_signin'])) {
        $username = $_POST['username'];
        if (signin($_POST) === true) {
            $_SESSION['username'] = $username;
            echo '
                    <script type="text/javascript">
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Signin",
                            icon: "success",
                            showConfirmButton: true,
                        }).then(function(isConfirm){
                            if(isConfirm){
                                window.location.replace("index.php");
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
                            text: "Username dan Password Salah",
                            icon: "error",
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
        }
    }
    ?>
</body>

</html>