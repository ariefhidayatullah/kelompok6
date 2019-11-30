<?php
require 'function.php';
$bahan = query('SELECT * FROM produk');
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

  <title>data produk - Tables</title>

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
  <script src="../assets/popper.min.js"></script>
  <link rel="stylesheet" href="../_assets/libs/DataTables/datatables.min.css">
  <script src="../_assets/libs/DataTables/datatables.min.js"></script>

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include '_header.php';
    ?>

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
              <input type="text" class="form-control bg-light border-0 small" placeholder="cari disini..." aria-label="Search" aria-describedby="basic-addon2" id="keyword">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="tombol-cari">
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
          <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="dokter">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Id Produk</th>
                      <th>Jenis Produk</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($bahan as $row) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['id_produk']; ?></td>
                        <td><?= $row['jenis_produk']; ?></td>
                        <td><?= $row['deskripsi']; ?></td>
                        <td><img src="../../frontend/img/<?= $row['gambar']; ?>" width="100"></td>
                        
                        <td>
                          <a href="ubah.php?id=<?= $row['id_produk']; ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                          <a>||</a>
                          <a href="hapus.php?id=<?= $row['id_produk']; ?>" onclick="return confirm('apakah anda yakin ? ');"><button class="btn btn-danger btn-sm">Hapus</button></a>
                        </td>
                      </tr>
                      <?php $i++ ?>
                    <?php endforeach; ?>
                  </thead>
                </table>
                <a href="tambah.php" class="btn btn-primary" role="button"> Tambah data </a>
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
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>

</body>

</html>