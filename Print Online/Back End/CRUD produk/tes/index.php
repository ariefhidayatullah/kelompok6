<?php 

	$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');

	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$email = $_POST['email'];
		$jurusan = $_POST['jurusan'];
		$gambar = $_POST['gambar'];
	
	$query = "INSERT INTO `mahasiswa` VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar');";
	mysqli_query($conn, $query);
	$kel = mysqli_affected_rows($conn);

	if ($kel > 0) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

	}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data</title>
</head>
<body>
		<h1>Tambah Data</h1>
		<table  border="1" cellpadding="10" cellspacing="0">
		<form action="" method="POST">
			<ul>
				<tr>
					<td><li><label for="nama">nama</label></li></td>
					<td><li><input type="text" name="nama" id="nama"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="nim">nim</label></li></td>
					<td><li><input type="text" name="nim" id="nim"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="email">email</label></li></td>
					<td><li><input type="text" name="email" id="email"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="jurusan">jurusan</label></li></td>
					<td><li><input type="text" name="jurusan" id="jurusan"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="gambar">gambar</label></li></td>
					<td><li><input type="text" name="gambar" id="gambar"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td colspan="2"><center><li><button type="submit" name="submit">KIRIM</button></center></td>
				</tr>
			</ul>
		</form>
</table>
</body>
</html>