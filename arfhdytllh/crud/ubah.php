<?php 
require 'function.php';

$id = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST["submit"])) {
	//cek data berhasil diubaahtau tidak
	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah');
					document.location.href = 'index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal berhasil diubah'); 
			</script>
		";
	}
}



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data</title>
</head>
<body>
		<h1>Ubah Data</h1>
		<?php foreach ($mhs as $row):?>
		<table  border="1" cellpadding="10" cellspacing="0">
		<form action="" method="POST">
			<ul>
				<input type="hidden" name="id" value="<?= $row['id']; ?>">
				<tr>
					<td><li><label for="nama">nama</label></li></td>
					<td><li><input type="text" name="nama" id="nama" required value="<?= $row['nama']; ?>"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="nim">nim</label></li></td>
					<td><li><input type="text" name="nim" id="nim" required value="<?= $row['nim']; ?>"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="email">email</label></li></td>
					<td><li><input type="text" name="email" id="email" required value="<?= $row['email']; ?>"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="jurusan">jurusan</label></li></td>
					<td><li><input type="text" name="jurusan" id="jurusan" required value="<?= $row['jurusan']; ?>"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td><li><label for="gambar">gambar</label></li></td>
					<td><li><input type="text" name="gambar" id="gambar" required value="<?= $row['gambar']; ?>"></li></td>
				</tr>
			</ul>
			<ul>
				<tr>
					<td colspan="2"><center><li><button type="submit" name="submit">KIRIM</button></center></td>
				</tr>
			</ul>
		</form>
</table>
		<?php endforeach; ?>
</body>
</html>