<!DOCTYPE html>
<html>
<head>
	<title>THE KING ADVERTISING</title>
</head>
<body>

	<h2>TABEL PRODUK</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH PRODUK</h3>
	<form method="post" action="tambah_produk_aksi.php">
		<table>
			<tr>			
				<td>ID PRODUK</td>
				<td><input type="text" name="id_produk"></td>
			</tr>
			<tr>
				<td>JENIS PRODUK</td>
				<td><input type="text" name="jenis_produk"></td>
			</tr>
			<tr>
				<td>HARGA SATUAN</td>
				<td><input type="number" name="harga_satuan"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>