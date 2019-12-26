<?php
session_start();
require 'function.php';
include 'include/_header.php';

if (!isset($_SESSION["LOGIN"])) {
}

if (isset($_SESSION["LOGIN"])) {
	$username = $_SESSION["LOGIN"];
	$user = query("SELECT * FROM user where email = '$username'");
	$bahan = query('SELECT * FROM produk order by rand()');
	$username = $_SESSION["LOGIN"];
	$id_produk = $_GET["id_produk"];
	$id_bahan = $_GET["id_bahan"];
} else {
	echo "<script> alert('silahkan login terlebih dahulu!');</script>";
	echo "<script>Location ='login.php'; </script>";
	return false;
}



?>

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

	<?php include 'include/navbar.php'; ?>
	<!-- //Header -->
	<!-- Start Search Popup -->
	<div class="box-search-content search_active block-bg close__top">
		<form id="search_mini_form" class="minisearch" action="#">
			<div class="field__search">
				<input type="text" placeholder="Search entire store here...">
				<div class="action">
					<a href="#"><i class="zmdi zmdi-search"></i></a>
				</div>
			</div>
		</form>
		<div class="close__wrap">
			<span>close</span>
		</div>
	</div>
	<!-- End Search Popup -->
	<!-- Start Bradcaump area -->
	<div class="ht__bradcaump__area bg-image--4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bradcaump__inner text-center">
						<h2 class="bradcaump-title">Checkout</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="index.html">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Checkout</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Bradcaump area -->
	<!-- Start Checkout Area -->
	<section class="wn__checkout__area section-padding--lg bg__white">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="wn_checkout_wrap">
						<div class="checkout_info">
							<span>Returning customer ?</span>
							<a class="showlogin" href="#">Click here to login</a>
						</div>
						<div class="checkout_login">
							<form class="wn__checkout__form" action="#">
								<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>

								<div class="input__box">
									<label>Username or email <span>*</span></label>
									<input type="text">
								</div>

								<div class="input__box">
									<label>password <span>*</span></label>
									<input type="password">
								</div>
								<div class="form__btn">
									<button>Login</button>
									<label class="label-for-checkbox">
										<input id="rememberme" name="rememberme" value="forever" type="checkbox">
										<span>Remember me</span>
									</label>
									<a href="#">Lost your password?</a>
								</div>
							</form>
						</div>
						<div class="checkout_info">
							<span>Have a coupon? </span>
							<a class="showcoupon" href="#">Click here to enter your code</a>
						</div>
						<div class="checkout_coupon">
							<form action="#">
								<div class="form__coupon">
									<input type="text" placeholder="Coupon code">
									<button>Apply coupon</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="customer_details">
						<h3>Detail Pemesanan</h3>
						<div class="customar__field">
							<div class="input_box space_between">
								<label>Tanggal</label>
								<input type="text" name="nama" disabled value="<?php echo date('d-m-Y') ?>">
							</div>
							<div class="input_box">
								<label>Nama <span>*</span></label>
								<input type="text" name="nama" disabled value="<?php
																				$sql = " Select * FROM user where email = '$username'";
																				$hasil = mysqli_query($conn, $sql);
																				$row = mysqli_fetch_array($hasil);
																				echo $row['nama_user'];
																				?>">
							</div>
							<div class="input_box">
								<label>Email <span>*</span></label>
								<input type="text" name="nama" disabled value="<?php echo $username ?>">
							</div>
							<div class="input_box">
								<label>No HP <span>*</span></label>
								<input type="text" name="nama" disabled value="<?php echo $row['nohp_user']; ?>" required>
							</div>
							<div class="input_box">
								<label>Alamat pengiriman<span>*</span></label>
								<input type="text" name="alamat" maxlength="100" placeholder="masukkan alamat lengkap . . ." required>
								<div class="input_box">
									<label>Kode Pos<span>*</span></label>
									<input type="text" name="kodepos" maxlength="7" placeholder="masukkan kode pos . . ." required><br><br>
									<div class="col-12">
										<button class="btn btn-success"> Pesan Sekarang </button>
										<a class="btn btn-danger" href="produk.php?id=<?= $id_produk ?>"> Batalkan Pesanan </a>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-3 md-mt-40 sm-mt-40">
					<div class="wn__order__box">
						<h3 class="onder__title">Pesanan Anda</h3>
						<ul class="order__total">
							<li>Produk</li>
							<li>Rincian</li>
						</ul>
						<ul class="order_product">
							<?php
							$sql0 = "Select * from produk where id_produk = '$id_produk'";
							$hasil0 = mysqli_query($conn, $sql0);
							$row0 = mysqli_fetch_array($hasil0);

							$sql1 = "Select * from bahan where nama_bahan = '$id_bahan'";
							$hasil1 = mysqli_query($conn, $sql1);
							$row1 = mysqli_fetch_array($hasil1);

							?>
							<li>Jenis Produk<span><?php echo $row0['jenis_produk']; ?></span></li>
							<li>Nama Bahan<span><?php echo $id_bahan ?></span></li>
							<li>Harga Satuan<span><?php echo $row1['harga_satuan']; ?></span></li>
							<li>Jumlah Pesanan<span><input type="number" min="1" max="1000" name="qty"></span></li>
							<li>Desain<button class="btn btn-warning btn-sm pull-right" type="submit">Lihat desain</button><input type="file" class="  pull-right"></li>
						</ul>
						<ul class="shipping__method">
							<li>Harga Total <span>Rp 17500</span></li>
							<li>Pengiriman
								<ul>
									<li>
										<input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" checked="checked" type="radio">
										<label>JNE : Rp 2500</label>
									</li>
									<li>
										<input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" type="radio">
										<label>J&T : Rp 2000</label>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="total__amount">
							<li>Order Total <span>Rp. 20000</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- End Checkout Area -->
<?php
include 'include/_footer.php';
?>