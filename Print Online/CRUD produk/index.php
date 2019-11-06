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
	<meta charset="UTF-8">
	<title>Latian CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="jquery-3.3.1.slim.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container text-center">
		<h1 style="text-center">Daftar Mahasiswa</h1>
		<a href="tambah.php" class="btn btn-primary" role="button"> Tambah data </a>
		<table border="1" cellpadding="10" cellspacing="0" class="table table-hover table-dark">
			<tr>
				<th>No.</th>
				<th>aksi</th>
				<th>gambar</th>
				<th>id produk</th>
				<th>jenis produk</th>
				<th>harga satuan</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach ($bahan as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td>
						<a href="ubah.php?id=<?= $row['id_produk']; ?>">ubah</a>
						<a href="hapus.php?id=<?= $row['id_produk']; ?>" onclick="return confirm('apakah anda yakin ? ');">hapus</a>
					</td>
					<td><img src="img/<?= $row['gambar']; ?>" width="100">
					</td>
					<td><?= $row['id_produk']; ?></td>
					<td><?= $row['jenis_produk']; ?></td>
					<td><?= $row['harga_satuan']; ?></td>
				</tr>
				<?php $i++ ?>
			<?php endforeach; ?>
	</div>
</body>

</html>