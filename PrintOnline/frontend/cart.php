<?php
session_start();
include 'include/_header.php';
require 'function.php';
$bahan = query('SELECT * FROM keranjang');

if (isset($_SESSION["LOGIN"])) {

	$username = $_SESSION["LOGIN"];
	$user = query("SELECT * FROM user where email = '$username'");

	if (isset($_GET["cart"])) {

		//cek data berhasil ditambah atau tidak
		if (tambahcart($_GET) > 0) {
			echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'cart.php';
			</script>
		";
		} else {
			echo "
			<script>
				alert('data gagal ditambah'); 
				
			</script>
		";
		}
	}
} else {
	echo "<script> alert('silahkan login terlebih dahulu!');</script>";
	echo "<script>Location ='login.php'; </script>";
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
							<div class="col">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<tr>
										<th>Jenis Produk</th>
										<th>Nama Bahan</th>
										<th>Harga Satuan</th>
										<th>Pilihan</th>
									</tr>
									<?php
									$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE username = '$username'");
									while ($data = mysqli_fetch_array($query)) {
										$id_produk     = $data['id_produk'];
										$nama_bahan       = $data['nama_bahan'];
										$id_cart = $data['id_cart'];
										?>
										<tr>
											<td><?php
													$ba = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
													$ro = mysqli_fetch_array($ba);
													echo $ro['jenis_produk'];
													?></td>
											<td><?php echo $nama_bahan ?></td>
											<td><?php
													$ba1 = mysqli_query($conn, "SELECT * FROM bahan WHERE nama_bahan = '$nama_bahan'");
													$ro1 = mysqli_fetch_array($ba1);
													echo $ro1['harga_satuan'];
													?></td>
											<td>
												<a class="btn btn-success btn-sm" href="checkout.php?id_produk=<?php echo $id_produk; ?>&id_bahan=<?php echo $nama_bahan; ?>">Checkout</a>
												<a onclick="return confirm('apakah anda yakin ? ');"
													class="btn btn-danger btn-sm" href="hapus.php?id=<?php echo $id_cart; ?>">Hapus</a>
											</td>
										</tr>
									<?php } ?>
								</table>
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