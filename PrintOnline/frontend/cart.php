﻿<?php 
session_start();
include 'include/navbar.php';
include 'include/_header.php';
$username = $_SESSION["LOGIN"];
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
</head>
<body>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.html">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.html">Shop</a>
									<ul>
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
				<div class="mobile-menu d-block d-lg-none">
				</div>
				<!-- Mobile Menu -->
			</div>
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">Shopping Cart</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">Shopping Cart</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- cart-main-area start -->
		<div class="cart-main-area section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 ol-lg-12">
						<form action="#">
							<div class="table-content wnro__table table-responsive">
								<table>
									<thead>
										<tr class="title-top">
											<th class="product-thumbnail">Image</th>
											<th class="product-name"><?php echo $username ?></th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-subtotal">Total</th>
											<th class="product-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/1.jpg" alt="product img"></a></td>
											<td class="product-name"><a href="#">Natoque penatibus</a></td>
											<td class="product-price"><span class="amount">$165.00</span></td>
											<td class="product-quantity"><input type="number" value="1"></td>
											<td class="product-subtotal">$165.00</td>
											<td class="product-remove"><a href="#">X</a></td>
										</tr>
										<tr>
											<td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/2.jpg" alt="product img"></a></td>
											<td class="product-name"><a href="#">Quisque fringilla</a></td>
											<td class="product-price"><span class="amount">$50.00</span></td>
											<td class="product-quantity"><input type="number" value="1"></td>
											<td class="product-subtotal">$50.00</td>
											<td class="product-remove"><a href="#">X</a></td>
										</tr>
										<tr>
											<td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/3.jpg" alt="product img"></a></td>
											<td class="product-name"><a href="#">Vestibulum suscipit</a></td>
											<td class="product-price"><span class="amount">$50.00</span></td>
											<td class="product-quantity"><input type="number" value="1"></td>
											<td class="product-subtotal">$50.00</td>
											<td class="product-remove"><a href="#">X</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
						<div class="cartbox__btn">
							<ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
								<li><a href="#">Coupon Code</a></li>
								<li><a href="#">Apply Code</a></li>
								<li><a href="#">Update Cart</a></li>
								<li><a href="#">Check Out</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 offset-lg-6">
						<div class="cartbox__total__area">
							<div class="cartbox-total d-flex justify-content-between">
								<ul class="cart__total__list">
									<li>Cart total</li>
									<li>Sub Total</li>
								</ul>
								<ul class="cart__total__tk">
									<li>$70</li>
									<li>$70</li>
								</ul>
							</div>
							<div class="cart__total__amount">
								<span>Grand Total</span>
								<span>$140</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- cart-main-area end -->
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
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
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
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
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

