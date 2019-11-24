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
                                    <?php foreach ($bahan as $row) : ?>
                                        <li><a href="produk.php?id=<?= $row['id_produk']; ?>"><?= $row['jenis_produk']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <!-- Start Shopping Cart -->
                    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                        <div class="searchbar__content setting__block">
                            <div class="content-inner">
                                <div class="switcher-currency">
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                <?php if (isset($_SESSION["LOGIN"])) : ?>
                                                    <span><a href="logout.php">Log Out</a></span>
                                                    <span><a href="profil.php">Profile</a></span>
                                                <?php else : ?>
                                                    <span><a href="login.php">login</a></span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>