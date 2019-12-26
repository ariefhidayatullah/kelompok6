<?php
session_start();
require 'function.php';
include 'include/_header.php';
$bahan = query('SELECT * FROM produk order by rand()');

?>


<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
	<!-- Header -->
	<?php include 'include/navbar.php'; ?>
	<!-- Start Slider area -->
	<div class="slider-area slider--15 slide__activation slide__arrow01 owl-carousel">

		<!-- Start Single Slide -->
		<div class="slide animation__style09 bg-image--1 fullscreen align__center--left">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="slider__content">
							<div class="contentbox">
								<h2>Percayakan <span>Kebutuhan </span></h2>
								<h2>Cetak <span>Dokumen </span></h2>
								<h2>Anda <span>Kepada </span></h2>
								<h2><span>Ahlinya </span></h2>
								<a class="shopbtn" href="daftarproduk.php">shop now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Slide -->
		<!-- Start Single Slide -->
		<div class="slide animation__style10 bg-image--5 fullscreen align__center--left">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="slider__content">
							<div class="contentbox">
								<h2>The <span>King </span></h2>
								<h2>Adver<span>tising </span></h2>
								<h2>Digital <span>Printing </span></h2>
								<a class="shopbtn" href="#">shop now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Slide -->
	</div>
	<!-- End Slider area -->
	<!-- Start BEst Seller Area -->
	<section class="wn__product__area brown--color pt--80  pb--30">
		<div class="row pt--80  pb--30">
			<div class="col-lg-12">
				<div class="section__title text-center">
					<h2 class="title__be--2"><span class="color--theme">produk</span></h2>
					<hr>
				</div>
			</div>
		</div>
		<div class="container">
			<!-- Start Single Tab Content -->
			<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50 ">
				<!-- Start Single Product -->
				<?php foreach ($bahan as $row) : ?>
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img"><img src="img/<?= $row['gambar']; ?>" width="100" alt=""></a>
								<a class="second__img animation1"><img src="img/<?= $row['gambar']; ?>" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">BEST SELLER</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="single-product.html"><?= $row['jenis_produk']; ?></a></h4>
								<div class="action">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><a href="produk.php?id=<?= base64_encode($row['id_produk']); ?>"><i class=" bi bi-search"></i></a></li>
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
	<!-- Start BEst Seller Area -->
	<!-- Start NEwsletter Area -->
	<div class="mb-2">
		<img src="slide/cepatt.png" alt="">
	</div>


	<section class="wn__newsletter__area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 ptb--70">
					<div class="section__title text-center">
						<h2>tetap bersama kami</h2>
					</div>
					<div class="newsletter__block text-center">
						<p>.</p>
					</div>
				</div>
				<div class="col-lg-4 ptb--70">
					<div class="section__title text-center">
						<h2>tetap bersama kami</h2>
					</div>
					<div class="newsletter__block text-center">
						<p>.</p>
					</div>
				</div>
				<div class="col-lg-4 ptb--70">
					<div class="section__title text-center">
						<h2>tetap bersama kami</h2>
					</div>
					<div class="newsletter__block text-center">
						<p>.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php
include 'include/_footer.php';
?>