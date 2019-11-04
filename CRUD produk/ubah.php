<?php
require 'function.php';

$id_produk = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

if (isset($_POST["submit"])) {
	//cek data berhasil diubaahtau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah');
					document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah'); 
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
	<?php foreach ($mhs as $row) : ?>
		<table border="1" cellpadding="10" cellspacing="0">
			<form action="" method="POST" enctype="multipart/form-data">
				<ul>
					<input type="hidden" name="id" value="<?= $row['id']; ?>">
					<input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">
					<tr>
						<td>
							<li><label for="id_produk">id produk</label></li>
						</td>
						<td>
							<li><input type="text" name="id_produk" id="id_produk" required value="<?= $row['id_produk']; ?>" readonly></li>
						</td>
					</tr>
				</ul>
				<ul>
					<tr>
						<td>
							<li><label for="jenis_produk">jenis produk</label></li>
						</td>
						<td>
							<li><input type="text" name="jenis_produk" id="jenis_produk" required value="<?= $row['jenis_produk']; ?>"></li>
						</td>
					</tr>
				</ul>
				<ul>
					<tr>
						<td>
							<li><label for="harga_satuan">harga satuan</label></li>
						</td>
						<td>
							<li><input type="text" name="harga_satuan" id="harga_satuan" required value="<?= $row['harga_satuan']; ?>"></li>
						</td>
					</tr>
				</ul>
				<ul>
					<tr>
						<td>
							<li><label for="gambar">gambar</label></li>
						</td>

						<td>
							<li><img src="img/<?= $row['gambar']; ?>" width="40"><input type="file" name="gambar" id="gambar"></li>
						</td>
					</tr>
				</ul>
				<ul>
					<tr>
						<td colspan="2">
							<center>
								<li><button type="submit" name="submit">KIRIM</button>
							</center>
						</td>
					</tr>
				</ul>
			</form>
		</table>
	<?php endforeach; ?>
</body>

</html>