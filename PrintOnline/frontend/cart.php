<?php
session_start();
include 'include/_header.php';
require 'function.php';

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
	echo "<script> alert ('keranjang kosong, silahkan belanja dahulu') ; </script>";
	echo "<script>location='daftarproduk.php'; </script>";
}

?>
<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

	<!-- Header -->
	<?php include 'include/navbar.php'; ?>
	<!-- //Header -->
	<!-- Start Search Popup -->
	<div class="ht__bradcaump__area bg-image--4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bradcaump__inner text-center">
						<h2 class="bradcaump-title">Keranjang Belanja</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="dashboard.php">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Keranjang Belanja</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="cart-main-area section-padding--lg bg--white">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 ol-lg-12">
					<form action="#">
						<div class="table-content wnro__table table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>no</th>
										<th>produk</th>
										<th>bahan</th>
										<th>Harga</th>
										<th>jumlah</th>
										<th>subharga</th>
										<th>Pilihan</th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; ?>
									<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
										<?php
											$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
											$pecah = $ambil->fetch_assoc();
											?>
										<?php
											$subharga = $pecah["harga"] * $jumlah;
											?>
										<tr>
											<td><?= $nomor; ?></td>
											<td><?= $pecah["jenis_produk"]; ?></td>
											<td><?= $pecah["jenis_bahan"]; ?></td>
											<td>Rp. <?= number_format($pecah["harga"]); ?></td>
											<td><?= $jumlah; ?></td>
											<td><?= number_format($subharga); ?></td>
											<td class="product-remove">
												<a href="hapuskeranjang.php?id=<?= $id_produk ?> " onclick="return confirm('yakin menghapus produk dari keranjang ? ');">X</a>
											</td>
										</tr>
										<?php $nomor++; ?>
									<?php endforeach ?>
								</tbody>
							</table>
							<div class="cartbox__btn">
								<ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
									<li><a href="daftarproduk.php">Lanjutkan belanja</a></li>
									<li><a href="#">Update Cart</a></li>
									<li><a href="chekout.php">chekout</a></li>
								</ul>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'include/_footer.php';
?>