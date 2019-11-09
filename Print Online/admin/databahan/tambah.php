<?php
require 'function.php';

if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				document.location.href = 'index.php';
			</script>
		";
	}
}

$carikode = mysqli_query($conn, "SELECT id_produk from produk") or die(mysqli_error($id_produk));
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
	$kode_otomatis = "P" . str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
	$kode_otomatis = "P0001";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="jquery-3.3.1.slim.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body class="mt-5">
	<div class="container">
		<h1 class="text-center mb-4">Tambah Data</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="id_produk">id produk</label>
				<input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="id produk" value="<?= $kode_otomatis; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="jenis_produk">jenis produk</label>
				<input type="text" class="form-control" name="jenis_produk" id="jenis_produk" placeholder="jenis produk">
			</div>
			<div class="form-group">
				<label for="gambar">gambar</label>
				<input type="file" name="gambar" id="gambar">
			</div>
			<button type="submit" class="btn btn-primary" name="submit">kirim</button>
		</form>
	</div>
</body>

</html>