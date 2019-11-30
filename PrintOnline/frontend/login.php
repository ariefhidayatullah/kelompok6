<?php
session_start();

require 'function.php';
include 'include/_header.php';


if (isset($_POST["SUBMIT"])) {
	if (registrasi($_POST) > 0) {
		echo "<script> alert('user baru berhasil ditambahkan!');</script>
		header('Location:index.php');";
	} else {
		echo mysqli_error($conn);
	}
}

if (isset($_POST["LOGIN"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		// cek password
		if (password_verify($password, $row["password"])) {

			$result0 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
			$row0 = mysqli_fetch_array($result0);
			$email = $row0['email'];

			$_SESSION["LOGIN"] = $email;
			header("Location:index.php");
			exit;
		}
	}
	$error  = true;
	?>

<?php
}

?>

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
						<form class="user" action="" method="POST">
							<div class="account__form">
								<div class="input__box">
									<label>Email address / Username<span>*</span></label>
									<input type="text" id="email" name="email" placeholder="Masukkan email atau username anda..." required="" autofocus>
								</div>
								<div class="input__box">
									<label>Password<span>*</span></label>
									<input type="password" id="password" name="password" required placeholder="Masukkan password anda">
								</div>
								<div class="form__btn">
									<button type="submit" name="LOGIN">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="my__account__wrapper">
						<h3 class="account__title">Daftar akun</h3>
						<form action="" method="POST">
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
									<button type="submit" name="SUBMIT">Register</button>
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