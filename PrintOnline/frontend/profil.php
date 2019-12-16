<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_GET['id'];
$bahan = query('SELECT * FROM produk order by rand()');
$user=$_SESSION["LOGIN"]
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
			<div class="col">
				<div class="my__account__wrapper">
					<div class="account__form">
						<h5>Silahkan lengkapi data anda</h5>
						<?php
						$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
						while ($data = mysqli_fetch_array($query)) {
							$gambar    = $data['profil_user'];
							$nama    = $data['nama_user'];
							$email   = $data['email'];
							$jk		 = $data['jenis_kelamin'];
							$nohp 	 = $data['nohp_user'];
							$provinsi 	 = $data['provinsi'];
							$kabupaten 	 = $data['kabupaten'];
							$kecamatan	 = $data['kecamatan'];
							$alamat = $data['alamat'];
							$kodepos = $data['kodepos'];
							?>
							<div class="input__box">
								<label>gambar <span>:</span></label>
							</div>
							<div class="input__box"><img src="img/<?= $gambar ?>" width="100">
							</div>
							<div class="input__box">
								<label>nama <span>:</span></label>
							</div>
							<div class="input__box"><?php echo $nama; ?>
							</div>
							<div class="input__box">
								<label>email <span>:</span></label>
							</div>
							<div class="input__box"><?php echo $email; ?>
							</div>
							<div class="input__box">
								<label>password <span>:</span></label>
							</div>
							<div class="input__box">********
							</div>
							<div class="input__box">
								<label>jenis kelamin <span>:</span></label>
							</div>
							<div class="input__box"><?php echo $jk; ?>
							</div>
							<div class="input__box">
								<label>no hp <span>:</span></label>
							</div>
							<div class="input__box"><?php echo $nohp; ?>
							</div>
							<div class="input__box">
								<label>provinsi <span>:</span></label>
							</div>
							<div class="input__box"><?php
														$prov = mysqli_query($conn, "SELECT * FROM prov WHERE id_prov = '$provinsi'");
														$provi = mysqli_fetch_array($prov);
														echo $provi['nama_prov'];
														?>
							</div>
							<div class="input__box">
								<label>kabupaten <span>:</span></label>
							</div>
							<div class="input__box"><?php
														$kab = mysqli_query($conn, "SELECT * FROM kabkot WHERE id_kabkot = '$kabupaten'");
														$kot = mysqli_fetch_array($kab);
														echo $kot['nama_kabkot'];
														?>
							</div>
							<div class="input__box">
								<label>kecamatan <span>:</span></label> 
							</div>
							<div class="input__box"><?php
														$kec = mysqli_query($conn, "SELECT * FROM kec WHERE id_kec = '$kecamatan'");
														$kecam = mysqli_fetch_array($kec);
														echo $kecam['nama_kec'];
														?>
							</div>
							<div class="input__box">
								<label>alamat <span>:</span></label>
							</div>
							<div class="input__box"><?= $alamat ?>
							</div>
							<div class="input__box">
								<label>kode pos <span>:</span></label>
							</div>
							<div class="input__box"><?= $kodepos ?>
							</div>
							<div class="form__btn">
								<a href="ubahprofil.php?id=<?= $id_user ?>"><button>edit profil</button></a>
							</div>
					</div>
					</form>
				</div>
			</div>
		<?php }  ?>
		</div>
	</div>

	<?php
	include 'include/_footer.php';
	?>