<?php
require 'function.php';
$bahan = query('SELECT * FROM produk');
include '../_header.php';
?>

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
          </thead>
          <tbody>
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
          </tbody>
        </table>
        <a href="tambah.php" class="btn btn-primary" role="button"> Tambah data </a>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include '../_footer.php';
?>