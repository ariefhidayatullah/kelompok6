<?php
require 'function.php';

if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'databahan.php';
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

include '../_header.php';

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
<div class="container text-center">
<div class="card w-75 border-primary" style="max-width: 75rem;">
  <div class="card-body">
  	<div class="card-header">
  		<h5 class="card-title">Tambahkan data bahan</h5>
  	</div>
   	<form class="user" method="post" action="">
		<div class="form-group row">
			<div class="col mb-3 mb-sm-0">
				<input type="hidden" class="form-control form-control-static text-center" id="id_bahan" name="id_bahan" required value="<?= $kode_otomatis; ?>" readonly>
			</div>
		</div>
		<div class="form-row">
			<div class="col">
				<label for="nama_bahan">Nama Bahan :</label>
				<input type="text" class="form-control form-control-static text-center" id="nama_bahan" name="nama_bahan" required placeholder="Masukkan Nama Bahan">
			</div>
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
		</div>
		<div class="form-group form-row">
			<div class="col">
				<label for="harga_satuan">Harga Satuan :</label>
				<input type="text" class="form-control form-control-static text-center" id="harga_satuan" name="harga_satuan" required placeholder="Masukkan Jumlah Harga">
			</div>
		</div>
		<div class="pull-right text-center">
			<a href="databahan.php" class="btn btn-warning">Kembali</a>
			<input class="btn btn-primary" name="submit" type="submit" value="Tambahkan!"></input>
		</div>
		</div>
</div>
	</form>
</div>
<?php
include '../_footer.php';
?>