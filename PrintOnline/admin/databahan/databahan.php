<?php
require 'function.php';
$bahan = query('SELECT * FROM bahan');
$produk = query('SELECT * FROM produk where id_produk');
// foreach ($mahasiswa as $kel) {
// 	echo $kel['id'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The king 2 - bahan</title>

  <!-- Custom fonts for this template -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="../assets/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this page -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="../assets/jquery-3.3.1.slim.min.js"></script>
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

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Akun</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Admin / User</h6>
            <a class="collapse-item" href="../auth/register.php">Tambah Akun Admin</a>
            <a class="collapse-item" href="../auth/datakaryawan/datakaryawan.php">Data Karyawan</a>
            <a class="collapse-item" href="../pengguna/datauser.php">List User / Pengguna</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="../dataproduk/dataproduk.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Produk</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="../databahan/databahan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Bahan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>transaksi</span>
        </a>
        <div id="collapsePagess" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">detail pemesanan</h6>
            <a class="collapse-item" href="../transaksi/pembayaran/pembayaran.php">pembayaran</a>
            <a class="collapse-item" href="../transaksi/pemesanan/pemesanan.php">pemesanan</a>
          </div>
        </div>
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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Bahan</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Id Bahan</th>
                      <th>Nama Bahan</th>
                      <th>Id Produk</th>
                      <th>Nama Produk</th>
                      <th>Stok</th>
                      <th>Sarga Satuan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM bahan");
                    while ($data = mysqli_fetch_array($query)) {
                    $id_bahan    = $data['id_bahan'];
                    $nama_bahan  = $data['nama_bahan'];
                    $id_produk   = $data['id_produk'];
                    $stok        = $data['stok'];
                    $harga_satuan= $data['harga_satuan'];
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $id_bahan; ?></td>
                        <td><?php echo $nama_bahan; ?></td> 
                        <td><?php echo $id_produk; ?></td>
                        <td><?php 
                        $ba = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                        $ba1 = mysqli_fetch_array($ba);
                        echo $ba1['jenis_produk'];
                        ?></td> 
                        <td><?php echo $stok; ?></td>
                        <td><?php echo $harga_satuan; ?></td>
                        <td>
                          <a href="ubah.php?id=<?php echo $id_bahan; ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                          <a>||</a>
                          <a href="hapus.php?id=<?= $row['id_bahan']; ?>" onclick="return confirm('apakah anda yakin ? ');"><button class="btn btn-danger btn-sm">Hapus</button></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <a href="tambah.php" class="btn btn-primary text-right" role="button"> Tambah data </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>


  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>

</body>

</html>