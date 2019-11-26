<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_GET['id'];
$bahan = query("SELECT * FROM user WHERE id_user = '$id_user'");
?>


<!-- Main wrapper -->
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
						<h2 class="bradcaump-title">Profil</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="dashboard.php">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Profil</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach ($bahan as $row) : ?>
				<div class="col-lg-6 col-12 offset-3">
					<div class="my__account__wrapper">
						<form class="user" action="" method="post">
							<div class="account__form">
								<div class="input__box">
									<label>nama <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['nama_user']; ?>
								</div>
								<div class="input__box">
									<label>email <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['email']; ?>
								</div>
								<div class="input__box">
									<label>username <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['username']; ?>
								</div>
								<div class="input__box">
									<label>password <span>:</span></label>
								</div>
								<div class="input__box">*****
								</div>
								<div class="input__box">
									<label>jenis kelamin <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['jenis_kelamin']; ?>
								</div>
								<div class="input__box">
									<label>no hp <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['nohp_user']; ?>
								</div>
								<div class="input__box">
									<label>alamat <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['alamat']; ?>
								</div>
								<div class="input__box">
									<label>kode pos <span>:</span></label>
								</div>
								<div class="input__box"><?= $row['kodepos']; ?>
								</div>
								<div class="form__btn">
									<a href="ubahprofil1.php?id=<?= $row['id_user']; ?>"><button>edit profil</button></a>
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<?php
	include 'include/_footer.php';
	?>