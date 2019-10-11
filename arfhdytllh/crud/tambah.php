<?php 
require 'function.php';

if (isset($_POST["submit"])) {
	//cek data berhasil ditambah atau tidak
	if(tambah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal berhasil ditambah'); 
			</script>
		";
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
					<td><li><input type="text" name="nama" id="nama" required></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="nim">nim</label></li></td>
					<td><li><input type="text" name="nim" id="nim" required></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="email">email</label></li></td>
					<td><li><input type="text" name="email" id="email" required></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="jurusan">jurusan</label></li></td>
					<td><li><input type="text" name="jurusan" id="jurusan" required></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="gambar">gambar</label></li></td>
					<td><li><input type="text" name="gambar" id="gambar" required></li></td>
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