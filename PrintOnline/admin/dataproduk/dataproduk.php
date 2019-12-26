<?php
require 'function.php';
$bahan = query('SELECT * FROM produk');
include '../_header.php';

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

<!-- Begin Page Content -->
<div class="container-fluid text-center">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="dokter">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Bahan</button>
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
        <a href="tambah.php" class="btn btn-primary" role="button"> Tambah Data </a>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title">Tambahkan data produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form class="user" method="post" action="" enctype="multipart/form-data">
    <div class="form-group row">
      <div class="col mb-3 mb-sm-0">
        <input type="hidden" class="form-control form-control-static text-center" id="id_produk" name="id_produk" value="" readonly>
      </div>
    </div>
    <div class="form-group row">
      <div class="col mb-3 mb-sm-0">
        <label for="jenis_produk">Masukkan Jenis Produk : </label>
        <input type="text" class="form-control form-control-static text-center" id="jenis_produk" name="jenis_produk" required placeholder="Masukkan jenis produk">
      </div>


      <div class="col mb-3 mb-sm-0">
        <label for="deskripsi">Tambahkan Deskripsi : </label>
        <input type="text" class="form-control form-control-static text-center" id="deskripsi" name="deskripsi" required placeholder="Tambahkan Deskripsi">
      </div>
      <div class="col">
        <input type="file" id="gambar" name="gambar">
      </div>
    </div>
    <div class="pull-right text-center">
      </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary ml-5" name="submit" type="submit" value="Tambahkan"></input>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
include '../_footer.php';
?>