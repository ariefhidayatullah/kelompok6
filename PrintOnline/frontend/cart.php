﻿<?php
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
			<!-- cart-main-area end -->
			<!-- Footer Area -->
			<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
				<div class="footer-static-top">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>no</th>
											<th>produk</th>
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
												$kab = mysqli_query($conn, "SELECT * FROM bahan WHERE id_produk = '$id_produk'");
												$kot = $kab->fetch_assoc();
												$subharga = $kot["harga_satuan"] * $jumlah;
												?>
											<tr>
												<td><?= $nomor; ?></td>
												<td><?= $pecah["jenis_produk"]; ?></td>
												<td>Rp. <?= number_format($kot["harga_satuan"]); ?></td>
												<td><?= $jumlah; ?></td>
												<td><?= number_format($subharga); ?></td>
												<td>
													<a href="hapuskeranjang.php?id=<?= $id_produk ?> "class="btn btn-primary" onclick="return confirm('yakin menghapus produk dari keranjang ? ');">hapus</a>
												</td>
											</tr>
											<?php $nomor++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
								<a href="daftarproduk.php" class="btn btn-primary">Lanjutkan belanja</a>
								<a href="chekout.php" class="btn btn-secondary">chekout</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</div>

<?php
include 'include/_footer.php';
?>