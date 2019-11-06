<!DOCTYPE html>
<html>
<head>
	<title>CRUD BAHAN</title>
</head>
<body>

	<h2>CRUD</h2>
	<br/>
	<a href="edit.php">+ edi</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>ID BAHAN</th>
			<th>NAMA BAHAN</th>
			<th>ID PRODUK</th>
			<th>STOK</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from bahan");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_bahan']; ?></td>
				<td><?php echo $d['nama_bahan']; ?></td>
				<td><?php echo $d['id_produk']; ?></td>
				<td><?php echo $d['stok']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id_bahan']; ?>">EDIT</a>
					<a href="hapus_bahan.php?id=<?php echo $d['id_bahan']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>