<?php
session_start();

require 'function.php';
$bahan = query('SELECT * FROM produk order by rand()');

if (isset($_POST["submit"])) {
	if (registrasi($_POST) > 0) {
		echo "<script> alert('user baru berhasil ditambahkan!');</script>
		header('Location:dashboard.php');";
	} else {
		echo mysqli_error($conn);
	}
}

if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' OR username = '$email' ");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		// cek password
		if (password_verify($password, $row["password"])) {

			$result0 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' or username ='email");
			$row0 = mysqli_fetch_array($result0);
			$username = $row0['nama_user'];

			$_SESSION["LOGIN"] = $username;
			header("Location:dashboard.php");
			exit;
		}
	}
	$error  = true;
	?>

<?php
}

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> login register | The King Advertising</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

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
		<!-- Header -->
		<?php include 'include/navbar.php'; ?>
		<!-- //Header -->
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">My Account</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">My Account</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Masuk</h3>
							<?php if (isset($error)) : ?>
								<p style="color : red; font-style:italic">
									username / password salah
								</p>
							<?php endif; ?>
							<form class="user" action="" method="post">
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="text" id="email" name="email" placeholder="Masukkan email atau username anda..." required="" autofocus>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" id="password" name="password" required placeholder="Masukkan password anda">
									</div>
									<div class="form__btn">
										<button type="submit" name="login">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Daftar akun</h3>
							<form action="" method="post" class="user">
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" id="email" placeholder="Masukkan email anda..." required="" autofocus>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" id="password" placeholder="Masukkan password anda..." required>
										<small>(minimal 8 character huruf besar, kecil, dan angka)</small>
									</div>
									<div class="input__box">
										<label>konfirmasi Password <span>*</span></label>
										<input type="password" name="password2" id="password2" placeholder="konfirmasi password anda..." required>
										<small>(minimal 8 character huruf besar, kecil, dan angka)</small>
									</div>
									<div class="form__btn">
										<button type="submit" name="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
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