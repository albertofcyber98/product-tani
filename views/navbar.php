<nav class="navbar navbar-expand-lg navbar-light bg-nav">
    <div class="container py-1">
        <a class="navbar-brand text-brand" href="index.php">
            <img src="asset/img/logo.png" alt="logo" class="img-fluid" width="160px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link custom-menu-nav" aria-current="page" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-menu-nav" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-menu-nav" href="index.php#testimoni">Testimoni</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                ?>
                    <li class="nav-item mt-2">
                        <a class="btn-custom-menu-nav" href="signin.php">Login</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item mt-2">
                        <a class="btn-custom-menu-nav" href="profil.php">Profile</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>