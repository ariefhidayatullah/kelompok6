<?php
session_start();
require 'function.php';
include 'include/_header.php';
$bahan = query('SELECT * FROM produk order by rand()');
$user = query("SELECT * FROM user");

?>

<div class="wrapper" id="wrapper">
    <!-- Header -->
    <?php include 'include/navbar.php'; ?>
    <!-- //Header -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Daftar Produk</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Daftar Produk</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt--80  pb--30">
        <div class="col-lg-12">
            <div class="section__title text-center">
                <h2 class="title__be--2"><span class="color--theme">produk</span></h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 order-1 order-lg-2">
                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                <?php foreach ($bahan as $row) : ?>
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img src="img/<?= $row['gambar']; ?>" width="100" alt=""></a>
                                            <a class="second__img animation1" href="single-product.html"><img src="img/<?= $row['gambar']; ?>" width="100" alt=""></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html"><?= $row['jenis_produk']; ?></a></h4>
                                            <ul class="prize d-flex">
                                                <li>$35.00</li>
                                                <li class="old_prize">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a href="produk-login.php?id=<?= $row['id_produk']; ?>"><i class=" bi bi-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__hover--content">
                                                <ul class="rating d-flex">
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- End Single Product -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'include/_footer.php';
?>