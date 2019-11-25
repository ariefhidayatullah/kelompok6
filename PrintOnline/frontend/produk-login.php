<?php
require 'function.php';
include 'include/_header.php';

$id_produk = $_GET['id'];

$bahan = query('SELECT * FROM produk order by rand()');
// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
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
										<!-- div class="product-reviews-summary d-flex">
												<ul class="rating-summary d-flex"> -->
										<!-- <li><i class="zmdi zmdi-star-outline"></i></li>
													<li><i class="zmdi zmdi-star-outline"></i></li>
													<li><i class="zmdi zmdi-star-outline"></i></li>
													<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
													<li class="off"><i class="zmdi zmdi-star-outline"></i></li> -->
										<!-- </ul>
												</div>
												<span></span> -->
										<a href="">Harga Satuan : Rp. </a><a href="">
											<?php
												$han = $_POST['han'];
												?>
											<?php
												if (isset($_POST['han'])) {
													$bahan1 = mysqli_query($conn, "SELECT * FROM bahan where nama_bahan = '$han'");
													$row1 = mysqli_fetch_array($bahan1);
													echo $row1['harga_satuan'];
												}
												?></a>
										<div class="product__overview">
											<p>
												<?php
													$sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
													$ba = mysqli_query($conn, $sql);
													$ro = mysqli_fetch_array($ba);
													echo "Kenapa harus mencetak " . $ro['jenis_produk'] . " ?";
													?>
												<br>
												<?php
													echo $ro['deskripsi'];
													?>
											</p>
										</div>
										<?php
											$bahan = mysqli_query($conn, "SELECT * FROM bahan where id_produk = '$id_produk'");
											$row = mysqli_fetch_array($bahan);
											?>
										<br>
										<form action="" method="post">
											<h4><select name="han" class="drop"><a href="">Bahan</a>
													<ul>
														<?php foreach ($bahan as $p) : ?>
															<li>
																<option><a href=""><?= $p['nama_bahan']; ?></a></option>
															</li>
														<?php endforeach ?>
													</ul>
												</select>
												<button type="submit" value="han">Cari Harga</button><br>
										</form>
										</h4><br>
										<div>
											<div>
											<form action="checkout.php" method="get">
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<button type="submit" class="btn btn-success" value="checkout">Checkout Sekarang
												</button>
											</form>
											</div>
											<div>
												<form action="cart.php" method="get">
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<button type="submit" class="btn btn-info" value="cart">Add to
												Cart
												</button>
											</form>
											</div>
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
</div>

<?php
include 'include/_footer.php';
?>