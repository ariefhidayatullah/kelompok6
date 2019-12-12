<?php
session_start();
include 'include/_header.php';
require 'function.php';
$email = $_SESSION["LOGIN"];

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
							<form action="" method="POSt">
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
										<?php $nomor = 1; 
										?>
										<?php 
										$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE email = '$email'");
										while ($data = mysqli_fetch_array($query)) {
										$id_cart = $data['id_cart'];
										$id_produk = $data['id_produk'];
										$nama_bahan = $data['nama_bahan'];
										$quer = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
										$b = mysqli_fetch_array($quer);
										$queri = mysqli_query($conn, "SELECT * FROM bahan WHERE nama_bahan = '$nama_bahan'");
										$a = mysqli_fetch_array($queri);
										?>
											<tr>
												<td><?php echo $nomor; ?></td>
												<td><?= $b['jenis_produk']; ?></td>
												<td><?= $nama_bahan; ?></td>
												<td><?= $a['harga_satuan']; ?></td>
												<td><input type="number" name="qty" id="qty" min="1" max="100" placeholder="1" onchange="total()"></td>
												<td><input type="text" name="subtotal" id="subtotal" readonly></td>
												<td><a class="btn btn-danger btn-sm" href="beli.php?id_cart=<?= $id_cart; ?>">Hapus</a></td>
											</tr>
											<?php $nomor++; 
										}?>	
										 <tr>
										 	<th colspan="5" style="text-align:right">jumlah total</th>
										 	<th><input type="text" name="total_jumlah" id="subtotal" size="7" value="" readonly></th>
										 	<th><input type="button" onclick="window.print()" value="cetak"></th>
										 </tr>
									<script type="text/javascript">
										function total() {
											var subtotal = parseInt(<?php echo $a['harga_satuan']; ?>) * parseInt(document.getElementById('qty').value);
											document.getElementById('subtotal').value = subtotal;
											sum+=subtotal;
											document.getElementById('total_jumlah').value = sum;
										}
									</script>
									</tbody>
								</table>
								<input type="hidden" name="update">
							</form>
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