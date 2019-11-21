<?php
require 'function.php';
$bahan = query('SELECT * FROM produk order by rand()');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | The King Advertising</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/logo/3.png">
	<link rel="apple-touch-icon" href="images/logo/3.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>


	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
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
							<li class="setting__bar__icon"><a href="login.php"></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- End Search Popup -->
		<!-- Start Slider area -->
		<div class="slider-area slider--15 slide__activation slide__arrow01 owl-carousel">

			<!-- Start Single Slide -->
			<div class="slide animation__style09 bg-image--1 fullscreen align__center--left">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider__content">
								<div class="contentbox">
									<h2>Percayakan <span>Kebutuhan </span></h2>
									<h2>Cetak <span>Dokumen </span></h2>
									<h2>Anda <span>Kepada </span></h2>
									<h2><span>Ahlinya </span></h2>
									<a class="shopbtn" href="#">shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slide -->
			<!-- Start Single Slide -->
			<div class="slide animation__style10 bg-image--3 fullscreen align__center--left">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider__content">
								<div class="contentbox">
									<h2>Buy <span>your </span></h2>
									<h2>favourite <span>Book </span></h2>
									<h2>from <span>Here </span></h2>
									<a class="shopbtn" href="#">shop now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slide -->
		</div>
		<!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><span class="color--theme">produk</span></h2>
							<hr>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50 ">
					<!-- Start Single Product -->
					<?php foreach ($bahan as $row) : ?>
						<div class="product product__style--3">
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="product__thumb">
									<a class="first__img" href="single-product.html"><img src="img/<?= $row['gambar']; ?>" width="100" alt=""></a>
									<a class="second__img animation1" href="single-product.html"><img src="img/<?= $row['gambar']; ?>" alt="product image"></a>
									<div class="hot__box">
										<span class="hot-label">BEST SELLER</span>
									</div>
								</div>
								<div class="product__content content--center">
									<h4><a href="single-product.html"><?= $row['jenis_produk']; ?></a></h4>
									<div class="action">
										<div class="actions_inner">
											<ul class="add_to_links">
												<li><a href="produk/<?= $row['jenis_produk']; ?>.php?id=<?= $row['id_produk']; ?>""><i class=" bi bi-search"></i></a></li>
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
						</div>
					<?php endforeach; ?>
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--4">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>tetap bersama kami</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>ngeue.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email">
									<button>Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Best Sale Area Area -->
		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.html">
										<img src="images/logo/3.png" alt="logo">
									</a>
									<p>JL Ki S. Mngunsarkoro, No 52, Kampung Templek Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68211 </p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.html">Trending</a></li>
										<li><a href="index.html">Best Seller</a></li>
										<li><a href="index.html">All Product</a></li>
										<li><a href="index.html">Wishlist</a></li>
										<li><a href="index.html">Blog</a></li>
										<li><a href="index.html">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-instagram"></i> <a href="https://www.instagram.com/arfhdytllh_/">.arfhdytllh_</a> </p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		<!-- END QUICKVIEW PRODUCT -->
	</div>
	<!-- //Main wrapper -->
	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>

</body>

</html>