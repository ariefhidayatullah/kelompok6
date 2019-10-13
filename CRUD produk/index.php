<!DOCTYPE html>
<html>
<head>
	<title>THE KING ADVERTISING</title>
</head>
<body>

	<h2>TABEL PRODUK</h2>
	<br/>
	<a href="tambah_produk.php">+ TAMBAH PRODUK</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>ID PRODUK</th>
			<th>JENIS PRODUK</th>
			<th>HARGA SATUAN</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from produk");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_produk']; ?></td>
				<td><?php echo $d['jenis_produk']; ?></td>
				<td><?php echo $d['harga_satuan']; ?></td>
				<td>
					<a href="edit_produk.php?id=<?php echo $d['id_produk']; ?>">EDIT</a>
					<a href="hapus_produk.php?id=<?php echo $d['id_produk']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>