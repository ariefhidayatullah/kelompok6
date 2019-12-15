<?php
session_start();
include 'include/_header.php';
require 'function.php';

$email = $_SESSION["LOGIN"];
$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE email = '$email'");
if (mysqli_num_rows($query)==0) {
	echo "<script>alert('keranjang kosong, silakan berbelanja terlebih dahulu');</script>";
	echo "<script>window.location ='daftarproduk.php';</script>";
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
											<th>pilihan</th>
										</tr>
									</thead>
									<tbody>
										<?php $nomor = 1; $total = 0; ?>
										<?php 
										while ($data = mysqli_fetch_array($query)) {
										$id_cart = $data['id_cart'];
										$id_produk = $data['id_produk'];
										$nama_bahan = $data['nama_bahan'];
										$harga_satuan = $data['harga_satuan'];
										$qty =$data['qty'];

										$quer = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
										$b = mysqli_fetch_array($quer);
										?>
											<tr>
												<td><?= $nomor; ?></td>
												<td><?= $b['jenis_produk']; ?></td>
												<td><?= $nama_bahan; ?></td>
												<td><?= $harga_satuan ?></td>
												<td>
												<form action="updatecart.php" method="get">
													<input type="text" name="id_cart" value="<?= $id_cart; ?>" hidden>
													<input type="number" min="1" max="100" name="qty" placeholder="<?= $qty; ?>">
													<button class="btn btn-warning btn-sm" type="submit" name="sub" value="sub" >OK</button>
												</form>
												</td>
												<td><?php $subtotal = $harga_satuan*$qty; ?>
												<?= $subtotal; ?></td>
												<td><a class="btn btn-danger btn-sm" href="hapuskeranjang.php?id_cart=<?= $id_cart; ?>">Hapus</a></td>
											</tr>
											<?php $nomor++; ?>	
											<?php 
											$total = $total + $subtotal;
											?>
											<?php } ?>
										 <tr>
										 	<th colspan="5" style="text-align:right">jumlah total</th>
										 	<th><?= $total; ?></th>
										 	<th><input type="button" onclick="window.print()" value="cetak"></th>
										 </tr>
									</tbody>
								</table>
								<input type="hidden" name="update">
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