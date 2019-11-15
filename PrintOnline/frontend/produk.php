<?php
require 'function.php';

$id_produk = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>produk | The king</title>
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
		<header id="wn__header" class="oth-page header__area header__absolute">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-7 col-lg-2">
						<div class="logo">
							<a href="index.html">
								<img src="images/logo/logo.png" alt="logo images">
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
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shopcart"><a href="cart.php"></a>
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="#">Compare Product</a></span>
														<span><a href="#">My Account</a></span>
														<span><a href="#">My Wishlist</a></span>
														<span><a href="#">Sign In</a></span>
														<span><a href="#">Create An Account</a></span>
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
				<!-- End Mobile Menu -->
				<div class="mobile-menu d-block d-lg-none">
				</div>
				<!-- Mobile Menu -->
			</div>
		</header>
		<!-- //Header -->
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--4">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">Shop Single</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">Shop Single</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start main Content -->
		<div class="maincontent bg--white pt--80 pb--55">
			<?php foreach ($mhs as $row) : ?>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="wn__single__product">
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="wn__fotorama__wrapper">
											<div class="fotorama wn__fotorama__action" data-nav="thumbs">
												<a href="1.jpg"><img src="img/<?= $row['gambar']; ?>" alt=""></a>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="product__info__main">
											<h1><?= $row['jenis_produk']; ?></h1>
											<div class="product-reviews-summary d-flex">
												<ul class="rating-summary d-flex">
													<li><i class="zmdi zmdi-star-outline"></i></li>
													<li><i class="zmdi zmdi-star-outline"></i></li>
													<li><i class="zmdi zmdi-star-outline"></i></li>
													<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
													<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
												</ul>
											</div>
											<div class="price-box">
												<span>$52.00</span>
											</div>
											<div class="product__overview">
												<p>Ideal for cold-weather training or work outdoors, the Chaz Hoodie
													promises superior warmth with every wear. Thick material blocks out the
													wind as ribbed cuffs and bottom band seal in body heat.</p>
												<p>Ideal for cold-weather training or work outdoors, the Chaz Hoodie
													promises superior warmth with every wear. </p>
											</div>
											<div class="box-tocart d-flex">
												<span>Qty</span>
												<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
												<div class="addtocart__actions">
													<button class="tocart" type="submit" title="Add to Cart">Add to
														Cart</button>
												</div>
												<div class="product-addto-links clearfix">
													<a class="wishlist" href="#"></a>
													<a class="compare" href="#"></a>
												</div>
											</div>
											<div class="product_meta">
												<span class="posted_in">Categories:
													<a href="#">Adventure</a>,
													<a href="#">Kids' Music</a>
												</span>
											</div>
											<div class="product-share">
												<ul>
													<li class="categories-title">Share :</li>
													<li>
														<a href="#">
															<i class="icon-social-twitter icons"></i>
														</a>
													</li>
													<li>
														<a href="#">
															<i class="icon-social-tumblr icons"></i>
														</a>
													</li>
													<li>
														<a href="#">
															<i class="icon-social-facebook icons"></i>
														</a>
													</li>
													<li>
														<a href="#">
															<i class="icon-social-linkedin icons"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			<?php endforeach; ?>
		</div>

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
		<div id="quickview-wrapper">
			<!-- Modal -->
			<div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal__container" role="document">
					<div class="modal-content">
						<div class="modal-header modal__header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								<!-- Start product images -->
								<div class="product-images">
									<div class="main-image images">
										<img alt="big images" src="images/product/big-img/1.jpg">
									</div>
								</div>
								<!-- end product images -->
								<div class="product-info">
									<h1>Simple Fabric Bags</h1>
									<div class="rating__and__review">
										<ul class="rating">
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
											<li><span class="ti-star"></span></li>
										</ul>
										<div class="review">
											<a href="#">4 customer reviews</a>
										</div>
									</div>
									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">$17.20</span>
											<span class="old-price">$45.00</span>
										</div>
									</div>
									<div class="quick-desc">
										Designed for simplicity and made from high quality materials. Its sleek geometry
										and material combinations creates a modern look.
									</div>
									<div class="select__color">
										<h2>Select color</h2>
										<ul class="color__list">
											<li class="red"><a title="Red" href="#">Red</a></li>
											<li class="gold"><a title="Gold" href="#">Gold</a></li>
											<li class="orange"><a title="Orange" href="#">Orange</a></li>
											<li class="orange"><a title="Orange" href="#">Orange</a></li>
										</ul>
									</div>
									<div class="select__size">
										<h2>Select size</h2>
										<ul class="color__list">
											<li class="l__size"><a title="L" href="#">L</a></li>
											<li class="m__size"><a title="M" href="#">M</a></li>
											<li class="s__size"><a title="S" href="#">S</a></li>
											<li class="xl__size"><a title="XL" href="#">XL</a></li>
											<li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
										</ul>
									</div>
									<div class="social-sharing">
										<div class="widget widget_socialsharing_widget">
											<h3 class="widget-title-modal">Share this product</h3>
											<ul class="social__net social__net--2 d-flex justify-content-start">
												<li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
												<li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
												<li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
												<li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="addtocart-btn">
										<a href="#">Add to cart</a>
									</div>
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
				</div><!-- .modal-dialog -->
			</div>
			<!-- END Modal -->
		</div>
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