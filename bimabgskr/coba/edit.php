<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

	<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA BAHAN</h3>

	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from bahan where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama bahan</td>
					<td>
						<input type="hidden" name="id_bahan" value="<?php echo $d['id_bahan']; ?>">
						<input type="text" name="nama_bahan" value="<?php echo $d['nama_bahan']; ?>">
					</td>
				</tr>
				<tr>
					<td>STOK</td>
					<td><input type="number" name="stok" value="<?php echo $d['stok']; ?>"></td>
				</tr>
				<tr>
					<td>ID produk</td>
                    <input type="hidden" name="id_produk" value="<?php echo $d['id_bahan']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>

</body>
</html>