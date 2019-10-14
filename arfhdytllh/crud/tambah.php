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
				alert('data gagal ditambah'); 
				document.location.href = 'index.php';
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
					<label for="nama">nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
				</div>
				<div class="form-group">
					<label for="nim">nim</label>
					<input type="text" class="form-control" name="nim" id="nim" placeholder="Nim">
				</div>
				<div class="form-group">
					<label for="email">email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="jurusan">jurusan</label>
					<input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="jurusan">
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