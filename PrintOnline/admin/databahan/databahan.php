<?php
require 'function.php';
$bahan = query('SELECT * FROM bahan');
$produk = query('SELECT * FROM produk where id_produk');

include '../_header.php';

if (isset($_POST["submit"])) {

  //cek data berhasil ditambah atau tidak
  if (tambah($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil ditambah');
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

$carikode = mysqli_query($conn, "SELECT id_bahan FROM bahan ") or die(mysqli_error($id_bahan));
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
// jika $datakode
if ($datakode) {
  // membuat variabel baru untuk mengambil kode barang mulai dari 1
  $nilaikode = substr($jumlah_data[0], 1);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $jumlah_data + 1;
  // hasil untuk menambahkan kode
  // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
  // atau angka sebelum $kode
  $kode_otomatis = "B" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $kode_otomatis = "B001";
}
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Bahan</button>
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
                  <button hidden data-toggle="modal" data-id="<?= $id_bahan; ?>" data-target="#myModal" class="btn btn-warning btn-sm">Edit</button></a>
                  <a href="ubah.php?id=<?= $data['id_bahan']; ?>" ><button class="btn btn-warning btn-sm">Ubah</button></a>
                  <a>||</a>
                  <a href="hapus.php?id=<?= $data['id_bahan']; ?>" onclick="return confirm('apakah anda yakin ? ');"><button class="btn btn-danger btn-sm">Hapus</button></a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title">Tambahkan data bahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form class="user" method="post" action="">
    <div class="form-group row">
      <div class="col mb-3 mb-sm-0">
        <input type="hidden" class="form-control form-control-static text-center" id="id_bahan" name="id_bahan" required value="<?= $kode_otomatis; ?>" readonly>
      </div>
    </div>
        <label for="nama_bahan">Nama Bahan :</label>
        <input type="text" class="form-control form-control-static text-center" id="nama_bahan" name="nama_bahan" required placeholder="Masukkan Nama Bahan">
      <div class="form-row">
      <div class="col">
        <label for="id_produk">nama Produk : </label>
        <select class="form-control" name="id_produk" id="id_produk">
          <option disabled selected="">Pilih Produk : </option>
          <?php
          $q = mysqli_query($conn, "SELECT * FROM produk");
          while ($row = mysqli_fetch_array($q)) {
            echo "<option value=$row[id_produk]>$row[jenis_produk]</option>";
          } ?>
        </select>
      </div>
      <div class="col">
        <label for="harga_satuan">Harga Satuan :</label>
        <input type="text" class="form-control form-control-static text-center" id="harga_satuan" name="harga_satuan" required placeholder="Masukkan Jumlah Harga">
      </div>
    </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary" name="submit" type="submit" value="Simpan"></input>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include '../_footer.php';
?>