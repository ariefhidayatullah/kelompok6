<?php 
require 'function.php';
$mahasiswa = query('SELECT * FROM mahasiswa');
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
	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php" class="btn btn-primary" role="button"> Tambah data </a>

<div class="container text-center">
	<table border="1" cellpadding="10" cellspacing="0" class="table table-hover table-dark">
		<tr>
			<th>No.</th>
			<th>aksi</th>
			<th>Gambar</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach($mahasiswa as $row):?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>
				<a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin ? ');">hapus</a>
			</td>
			<td><img src="img/<?= $row['gambar']; ?>"width="80">
			</td>
			<td><?= $row['nim']; ?></td>
			<td><?= $row['nama']; ?></td>
			<td><?= $row['email']; ?></td>
			<td><?= $row['jurusan']; ?></td>
		</tr>
		<?php $i++ ?>
		<?php endforeach; ?>
		</div>
</body>
</html>
