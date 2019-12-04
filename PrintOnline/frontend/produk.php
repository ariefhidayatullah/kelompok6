<?php
session_start();
require 'function.php';
include 'include/_header.php';


$id_produk = $_GET['id'];

$produk = query('SELECT * FROM produk order by rand()');
$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

if (isset($_SESSION["LOGIN"])) {
	$user = query("SELECT * FROM user");
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
										<h1><?= $row['jenis_produk']; ?></h1>
										<a href="">
											<?php
												if (isset($_POST['han'])) {
													$han = $_POST['han'];
													$bahan1 = mysqli_query($conn, "SELECT * FROM bahan where nama_bahan = '$han'");
													$row1 = mysqli_fetch_array($bahan1);
													echo "Harga Satuan : Rp. " . $row1['harga_satuan'];
												} else {
													echo "Silahkan Pilih Bahan";
												}
												?>
										</a>
										<div class="product__overview">
											<?php
												$sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
												$ba = mysqli_query($conn, $sql);
												$ro = mysqli_fetch_array($ba);
												echo "Kenapa harus mencetak " . $ro['jenis_produk'] . "?";
												?>
											<br>
											<?php
												echo $ro['deskripsi'];
												?>
											</p>
										</div>

										<?php
											$bahan1 = mysqli_query($conn, "SELECT * FROM bahan where id_produk = '$id_produk'");
											$row = mysqli_fetch_array($bahan1);
											?>
										<br>
										<form action="" method="post">
											<h4><select name="han" class="drop"><a href="">Bahan</a>
													<ul>
														<?php foreach ($bahan1 as $p) : ?>
															<li>
																<option><?= $p['nama_bahan']; ?></option>
															</li>
														<?php endforeach ?>
													</ul>
												</select>
												<button class="btn btn-danger" type="submit" value="han">Pilih Bahan</button><br>
										</form>
										</h4><br>
										<br>
										<div class="box-tocart d-flex">
											<form action="cart.php" method="POST">
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<div class="addtocart__actions">
													<button class="tocart" type="submit" name="cart" id="cart" title="Add to Cart"><a href="beli.php?id=<?= $row['id_produk']; ?>">Add to Cart</a></button>
												</div>
												<span>Qty</span>
												<input id="qty" class="input-text qty" name="qty" min="1" max="12" value="1" title="Qty" type="number">
											</form>

											<form action="checkout.php" method="get">
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<div class="addtocart__actions">
													<button type="submit" class="tocart ml-3" value="checkout">Checkout Sekarang
													</button>
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



<?php
include 'include/_footer.php';
?>