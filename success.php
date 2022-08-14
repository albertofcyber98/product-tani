<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require './views/link.php';
    ?>
    <title>Step 3</title>
</head>

<body class="container">
    <main class="step-3">
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 ">
                <section class="text-center">
                    <h1 data-aos="zoom-in-up" data-aos-duration="2000">Yay!! Completed</h1>
                    <img src="asset/img/success.png" class="w-50 img-success" alt="" data-aos="zoom-in-up" data-aos-duration="2000">
                    <p data-aos="zoom-in-up" data-aos-duration="2000">Your order will be processed immediately</p>
                </section>
                <div class="btn-finish-step-3 text-center">
                    <a href="index.php">Beranda</a>
                </div>
            </div>
        </section>
    </main>
    <?php
    require './views/script.php';
    ?>
</body>

</html>