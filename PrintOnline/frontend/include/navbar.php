<?php
if (isset($_SESSION["LOGIN"])) {
    $email = $_SESSION["LOGIN"];
    $user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
}
$daftarproduk = query('SELECT * FROM produk order by rand()');

?>
<header id="wn__header" class="header__area header-menu header__absolute">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex">
                        <li class="drop"><a href="#">daftar produk</a>
                            <div class="megamenu mega02">
                                <ul class="item item01">
                                    <?php foreach ($daftarproduk as $row) : ?>
                                        <li><a href="produk.php?id=<?= base64_encode($row['id_produk']); ?>"><?= $row['jenis_produk']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                        <li class="drop"><a href="tentangkami.php">Tentang kami</a></li>
                    </ul>
                </nav>
            </div>
            <!-- <div class="col-md-6 col-sm-6 col-6 col-lg-2"> -->
            <ul class="header__sidebar__right d-flex justify-content-end">
                <!-- Start Shopping Cart -->
                <div class="col d-none d-lg-block">
                    <nav class="mainmenu__nav">
                        <ul class="meninmenu d-flex">
                            <?php if (isset($_SESSION["LOGIN"])) : ?>
                                <?php foreach ($user as $row) : ?>
                                    <li class="drop"><a href="profil.php?id=<?= $row['id_user']; ?>" type="hidden">profil</a></li>
                                    <li class="drop"><a href="logout.php">Keluar</a></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li class="drop"><a href="login.php">login / registrasi</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </ul>
            <!-- </div> -->
        </div>
    </div>
    <div class="brown--color box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="daftarproduk.php" method="get">
            <div class="field__search">
                <input type="text" name="cari" placeholder="Cari produk disini ...">
                <div class="action">
                    <button class="btn btn-warning" type="submit" value="submit"><i class="zmdi zmdi-search"></i></button>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
</header>