<?php
require 'function.php';
$bahan = query('SELECT * FROM bahan');
$produk = query('SELECT * FROM produk where id_produk');

include '../_header.php';
?>

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
              $harga_satuan = $data['harga_satuan'];
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

<?php
include '../_footer.php';
?>