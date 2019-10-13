<!DOCTYPE html>
<html>
<head>
	<title>CRUD BAHAN</title>
</head>
<body>

	<h2>CRUD BAHAN</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH BAHAN</h3>
	<form method="post" action="tambah_bahan_aksi.php">
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