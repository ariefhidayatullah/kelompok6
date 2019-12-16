<?php
session_start();
require 'function.php';
include 'include/_header.php';


$id_produk = base64_decode($_GET['id']);

$produk = query('SELECT * FROM produk order by rand()');
$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

if (isset($_SESSION["LOGIN"])) {
	$email = $_SESSION["LOGIN"];
	$user = query("SELECT * FROM user WHERE email = '$email'");
}

if (isset($_POST["cart"])) {
	if (tambahcart($_POST)>0) {
		echo "<script>alert('produk berhasil masuk keranjang');</script>";
		echo "<script>window.location ='uploaddesain.php';</script>";
	}
	else{
		echo "<script>alert('maaf gagal');</script>";
	}
}

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
						<h2 class="bradcaump-title">Shop Single</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="dashboard.php">Home</a>
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
										<h1><?= $row['jenis_produk']; ?></h1> </a>
										<div class="product__overview">
											<span>
												<?php
												$sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
												$ba = mysqli_query($conn, $sql);
												$ro = mysqli_fetch_array($ba);

												$jenis_produk = $ro['jenis_produk'];
												$deskripsi = $ro['deskripsi'];
												$ukuran = $ro['ukuran'];
												$gambar = $ro['gambar'];
												echo "Kenapa harus mencetak " . $ro['jenis_produk'] . "?";
												?>
											</span>
											<br>
											<?php
												echo $ro['deskripsi'];
												?>
										</div>

										<span>Ukuran Percetakan : <?php
														echo $ro['ukuran'];
														?>
										</span>
										<?php
											$bahan1 = mysqli_query($conn, "SELECT * FROM bahan where id_produk = '$id_produk'");
											$row = mysqli_fetch_array($bahan1);
											$nama_bahan = $row['nama_bahan'];
											?>
										<?php
											$bahan = mysqli_query($conn, "SELECT * FROM bahan WHERE id_produk ='$id_produk' ORDER BY nama_bahan ASC");
											$jsArray = "var prdName = new Array();\n";
											?>
										<div class="box-tocart d-flex">
											<div class="addtocart__actions">
												<form action="" method="POST">
													<select id="nim" name="nama_bahan" onchange="changeValue(this.value)" class="form-control col-md-6">
											<option disabled="" selected="">Pilih Bahan</option>
											<?php
												while ($row = mysqli_fetch_array($bahan)) {
													echo '<option value="' . $row['nama_bahan'] . '">' . $row['nama_bahan'] . '</option> ';
													$jsArray .= "prdName['" . $row['nama_bahan'] . "'] = {harga:'" . addslashes($row['harga_satuan']) . "'};\n";}
												?></select>
													<span>Harga Satuan</span><br>
													<input class="form-control" type="number" name="harga" id="harga" disabled><br>
													<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
													<input class="form-control" type="number" value="1" name="qty" id="qty" hidden>
														<button type="submit" class="tocart" name="cart" id="cart">Masukkan Keranjang</button>
														<button class="tocart">Checkout Sekarang</button>
												</form>
											</div>
											<form action="checkout.php" method="get">
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<div class="addtocart__actions"><br><br>
													<br>
												</div>

										</div>
										</form>
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

<section class="wn__product__area brown--color pt--80  pb--30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section__title text-center">
					<h2 class="title__be--2"><span class="color--theme">produk lainnya</span></h2>
					<hr>
				</div>
			</div>
		</div>
		<!-- Start Single Tab Content -->
		<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50 ">
			<!-- Start Single Product -->
			<?php foreach ($produk as $row) : ?>
				<div class="product product__style--3">
					<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<div class="product__thumb">
							<a class="first__img" href="produk.php?id=<?= $row['id_produk']; ?>"><img src="img/<?= $row['gambar']; ?>" width="100" alt=""></a>
							<a class="second__img animation1" href="produk.php?id=<?= $row['id_produk']; ?>"><img src="img/<?= $row['gambar']; ?>" alt="product image"></a>
							<div class="hot__box">
								<span class="hot-label">BEST SELLER</span>
							</div>
						</div>
						<div class="product__content content--center">
							<h4><a href="single-product.html"><?= $row['jenis_produk']; ?></a></h4>
							<div class="action">
								<div class="actions_inner">
									<ul class="add_to_links">
										<li><a href="produk.php?id=<?= $row['id_produk']; ?>"><i class=" bi bi-search"></i></a></li>
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
</div>
<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(x) {
		document.getElementById('harga').value = prdName[x].harga;
	};
</script>



<?php
include 'include/_footer.php';
?>