<?php
session_start();
include 'include/_header.php';
require 'function.php';

if (isset($_SESSION["LOGIN"])) {

	$username = $_SESSION["LOGIN"];
	$user = query("SELECT * FROM user where email = '$username'");
	$bahan = query('SELECT * FROM produk order by rand()');

if (isset($_GET["cart"])) {

	//cek data berhasil ditambah atau tidak
	if (tambahcart($_GET) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'cart.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				
			</script>
		";
	}
}
} else {
echo "<script> alert('silahkan login terlebih dahulu!');</script>";
echo "<script>Location ='login.php'; </script>";

}
?>
<!doctype html>
<html class="no-js" lang="zxx">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart | Bookshop Responsive Bootstrap4 Template</title>
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
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

<div class="wrapper" id="wrapper">

	<!-- Header -->
	<?php include 'include/navbar.php'; ?>
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
			<div class="row">
			</div>
		</div>
	</div>
	<!-- cart-main-area end -->
	<!-- Footer Area -->
	<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
		<div class="footer-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 ol-lg-12">
						<table>
							<tr>
								<th>Jenis Produk</th>
								<th>Nama Bahan</th>
								<th>Pilihan</th>
							</tr>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE username = '$username'");
			while ($data = mysqli_fetch_array($query)) {
            $id_produk     = $data['id_produk'];
            $nama_bahan       = $data['nama_bahan'];
            ?>
            <tr>
            	<td><?php 
				$ba = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$ro = mysqli_fetch_array($ba);
				echo $ro['jenis_produk'];
            	 ?></td>
            	<td><?php echo $nama_bahan ?></td>
            	<td>
            		<button class="btn btn-success btn-sm">Checkout</button></a>
                    <a onclick="return confirm('apakah anda yakin ? ');"><button class="btn btn-danger btn-sm">Hapus</button></a>
            	</td>
            </tr>
    	    <?php } ?>
					</table>
                   	</div>
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
								<!-- <ul class="mainmenu d-flex justify-content-center">
									<li><a href="index.html">Trending</a></li>
									<li><a href="index.html">Best Seller</a></li>
									<li><a href="index.html">All Product</a></li>
									<li><a href="index.html">Wishlist</a></li>
									<li><a href="index.html">Blog</a></li>
									<li><a href="index.html">Contact</a></li>
								</ul> -->
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