<?php 
require 'function.php';

if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if(tambah_bahan($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal ditambah'); 
				document.location.href = 'index.php';
			</script>
		";
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
</head>
<body>

	<h2>CRUD DATA BAHAN</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH BAHAN</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<tr>			
				<td>ID BAHAN</td>
				<td><input type="text" name="id_bahan"></td>
			</tr>
			<tr>
				<td>NAMA BAHAN</td>
				<td><input type="text" name="nama_bahan"></td>
			</tr>
			<tr>
				<td>ID PRODUK</td>
				<td><input type="text" name="id_produk"></td>
			</tr>
			<tr>
				<td>STOK</td>
				<td><input type="text" name="stok"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>