<?php
require 'function.php';

if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'dataproduk.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				document.location.href = 'dataproduk.php';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>the king - tambah data</title>

	<!-- Custom fonts for this template-->
	<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">The King <sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="../dashboard/index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Daftar Akun</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">login Admin / User</h6>
						<a class="collapse-item active" href="../auth/register.php">tambah akun admin</a>
						<a class="collapse-item" href="../auth/register.php">list user / pengguna</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item active">
				<a class="nav-link" href="../dataproduk/dataproduk.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Data Produk</span></a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="../databahan/databahan.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Data Bahan</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../auth/logout.php">
					<i class="fas fa-fw fa-power-off"></i>
					<span>Logout</span></a>
			</li>


			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

				</nav>
				<!-- End of Topbar -->

				<div class="container text-center">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Tambahkan Data!</h1>
					</div>
					<form class="user" method="post" action="" enctype="multipart/form-data">
						<div class="form-group row">
							<div class="col mb-3 mb-sm-0">
								<input type="hidden" class="form-control form-control-static text-center" id="id_produk" name="id_produk" value="" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col mb-3 mb-sm-0">
								<label for="jenis_produk">masukkan jenis produk : </label>
								<input type="text" class="form-control form-control-static text-center" id="jenis_produk" name="jenis_produk" required placeholder="masukkan jenis produk....">
							</div>
						</div>
						<div class="form-group row">
							<div class="col mb-3 mb-sm-0">
								<input type="file" id="gambar" name="gambar">
							</div>
						</div>
						<div class="pull-right text-center">
							<a href="dataproduk.php" class="btn btn-warning btn-xs">Kembali</a>
							<input class="btn btn-primary ml-5" name="submit" type="submit" value="tambahkan!"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vassets/endor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>