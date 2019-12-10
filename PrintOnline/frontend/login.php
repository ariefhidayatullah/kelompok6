<?php
session_start();

require 'function.php';
include 'include/_header.php';


if (isset($_POST["register"])) {
	if (registrasi($_POST) === 0) {
		echo "<script> alert('user baru berhasil ditambahkan!');</script>
		header('Location:index.php');";
	} else {
		echo mysqli_error($conn);
	}
}

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password='$password'");

	$query = $result->num_rows;

	if ($query == 1) {
		$akun = $result->fetch_assoc();
		$_SESSION["LOGIN"] = $akun;
		echo "<script> alert('anda sukses login !');</script>";
		echo "<script> location='chekout.php';</script>";
	} else {
		echo "<script> alert('anda gagal login !');</script>";
		echo "<script> location='login.php';</script>";
	}
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
									<input type="text" id="emaill" name="email" placeholder="Masukkan email atau username anda..." required="" autofocus>
								</div>
								<div class="input__box">
									<label>Password<span>*</span></label>
									<input type="password" id="passwordd" name="password" required placeholder="Masukkan password anda">
								</div>
								<div class="form__btn">
									<button type="submit" name="submit">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="my__account__wrapper">
						<h3 class="account__title">Daftar akun</h3>
						<form action="" method="post">
							<div class="account__form">
								<div class="input__box">
									<label>nama : <span>*</span></label>
									<input type="text" name="nama_user" id="nama_user" placeholder="Masukkan nama anda..." required="" autofocus>
									<small class="nama_user" style="color: red;"></small>
								</div>
								<div class="input__box">
									<label>Email address <span>*</span></label>
									<input type="email" name="email" id="email" placeholder="Masukkan email anda..." required="" autofocus>
									<small class="email" style="color: red;"></small>
								</div>
								<div class="input__box">
									<label>Password<span>*</span></label>
									<input type="password" name="password" id="password" placeholder="Masukkan password anda..." required>
									<small class="password" style="color: red;"></small>
								</div>
								<div class="input__box">
									<label>konfirmasi Password <span>*</span></label>
									<input type="password" name="password2" id="password2" placeholder="konfirmasi password anda..." required>
									<small class="password2" style="color: red;"></small>
								</div>
								<div class="input__box">
									<label>no hp <span>*</span></label>
									<input type="text" name="nohp_user" id="nohp_user" placeholder="Masukkan no hp anda..." required="" autofocus>
									<small class="nohp_user" style="color: red;"></small>
								</div>
								<div class="form__btn">
									<button type="submit" name="register">Register</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- //Main wrapper -->
<script>
	$(document).ready(function() {

		// Validasi Nama Lengkap
		$('#nama_user').on('keyup', function() {
			var regex = /^[a-z A-Z]+$/;
			if (regex.test(this.value) !== true) {
				this.value = this.value.replace(/[^a-zA-Z]+/, '');
			} else if ($(this).val().length < 5) {
				$('.nama_user').text('Anda Yakin Nama Anda Terdiri Dari ' + $(this).val().length + ' Huruf?');
			} else {
				$('.nama_user').text('');
			}
			if ($(this).val().length == 0) {
				$('.nama_user').text('Nama Harus Di isi!');
			}
		});

		// validasi email
		$('#email').on('keyup', function() {
			var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!this.value.match(valid)) {
				$('.email').text('Isi Email dengan Benar!');
			} else {
				$('.email').text('');
			}
		});

		// validasi nohp
		$('#nohp_user').on('keyup', function() {
			var regex = /^[0-9]+$/;
			if (regex.test(this.value) !== true) {
				this.value = this.value.replace(/[^0-9]+/, '');
			} else {
				$('.nohp_user').text('');
			}

			if ($(this).val().length < 12) {
				$('.nohp_user').text('maksimal 12 angka!');
			} else {
				$('.nohp_user').text('');
			}

		});

		// validasi kata sandi
		$('#password').on('keyup', function() {
			if ($(this).val().length < 8) {
				$('.password').text('Password Minimal 8 digit');
			} else {
				$('.password').text('');
			}
		});
		$('#password2').on('keyup', function() {
			if ($(this).val() != $('#password').val()) {
				$('.password2').text('Password Tidak Sama');
			} else {
				$('.password2').text('');
			}
		});

	});
</script>

<?php
include 'include/_footer.php';
?>