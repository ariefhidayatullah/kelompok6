<?php
require 'function.php';
include '../_header.php';
if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'dataproduk.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				document.location.href = 'dataproduk.php';
			</script>
		";
	}
}

'../_header.php';

?>

<div class="container text-center">
	<div class="text-center">
		<h1 class="h4 text-gray-900 mb-4">Tambahkan Data!</h1>
	</div>
	<form class="user" method="post" action="" enctype="multipart/form-data">
		<div class="form-group row">
			<div class="col mb-3 mb-sm-0">
				<input type="hidden" class="form-control form-control-static text-center" id="id_produk" name="id_produk" value="" readonly>
			</div>
		</div>
		<div class="form-group row">
			<div class="col mb-3 mb-sm-0">
				<label for="jenis_produk">Masukkan Jenis Produk : </label>
				<input type="text" class="form-control form-control-static text-center" id="jenis_produk" name="jenis_produk" required placeholder="Masukkan jenis produk">
			</div>


			<div class="col mb-3 mb-sm-0">
				<label for="deskripsi">Tambahkan Deskripsi : </label>
				<input type="text" class="form-control form-control-static text-center" id="deskripsi" name="deskripsi" required placeholder="Tambahkan Deskripsi">
			</div>

			<div class="col mb-3 mb-sm-0">
				<input type="file" id="gambar" name="gambar">



			</div>
		</div>
		<div class="pull-right text-center">
			<a href="dataproduk.php" class="btn btn-warning btn-xs">Kembali</a>
			<input class="btn btn-primary ml-5" name="submit" type="submit" value="Tambahkan"></input>
		</div>
	</form>
</div>
<? include '../_footer.php'; ?>