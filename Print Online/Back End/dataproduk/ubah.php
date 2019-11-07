<?php
require 'function.php';

$id_produk = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

if (isset($_POST["submit"])) {
    //cek data berhasil diubaahtau tidak
    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah');
					document.location.href = 'dataproduk.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah'); 
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

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="../jquery-3.3.1.slim.min.js"></script>
    <script src="../popper.min.js"></script>
    <script src="../ajax.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="../auth/login.php">Login</a>
                        <a class="collapse-item" href="../auth/register.php">Register</a>
                        <a class="collapse-item" href="../auth/forgot-password.php">Forgot Password</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Produk</span></a>
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="cari disini..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid text-center">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">tambahkan akun!</h1>
                                        </div>
                                        <form class="user" action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">
                                            <div class="form-group row">
                                                <div class="col mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" name="id_produk" id="id_produk" required value="<?= $row['id_produk']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" name="jenis_produk" id="jenis_produk" required value="<?= $row['jenis_produk']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" name="harga_satuan" id="harga_satuan" required value="<?= $row['harga_satuan']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col mb-3 mb-sm-0">
                                                    <img src="img/<?= $row['gambar']; ?>" width="40"><input type="file" name="gambar" id="gambar">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="register" type="submit">
                                                register
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; The King 2019</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript-->
            <script src="../assets/vendor/jquery/jquery.min.js"></script>
            <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../assets/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
            <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../assets/js/demo/datatables-demo.js"></script>

</body>

</html>