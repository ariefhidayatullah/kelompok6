<?php
require 'function.php';
$bahan = query('SELECT * FROM produk order by rand()');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

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
							<a href="index.html">
								<img src="images/logo/logo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex">
								<li class="drop"><a href="#">daftar produk</a>
									<div class="megamenu mega03">
										<ul class="item item01">
											<li><a href="my-account.html">label</a></li>
											<li><a href="cart.html">kartu nama</a></li>
											<li><a href="checkout.html">undangan</a></li>
											<li><a href="wishlist.html">brosur</a></li>
											<li><a href="error404.html">poster</a></li>
											<li><a href="faq.html">Foto</a></li>
										</ul>
										<ul class="item item01">
											<li><a href="my-account.html">piagam</a></li>
											<li><a href="cart.html">kemasan</a></li>
											<li><a href="checkout.html">sticker</a></li>
											<li><a href="wishlist.html">kalender</a></li>
											<li><a href="error404.html">buku</a></li>
											<li><a href="faq.html">kartu sovenir</a></li>
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
														<span><a href="cek_login.php">Sign In</a></span>
														<span><a href="login.php">Log In</a></span>
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
			<!-- Start Single Slide -->
			<div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
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
												<li><a href="produk.php?id=<?= $row['id_produk']; ?>""><i class=" bi bi-search"></i></a></li>
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
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>tetap bersama kami</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
								lookbooks and exclusive offers.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Enter your e-mail">
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
									<p>There are many variations of passages of Lorem Ipsum available, but the majority
										have suffered duskam alteration variations of passages</p>
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
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights
										Reserved</p>
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