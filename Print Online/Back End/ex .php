<?php 
require 'function.php';
$sql = 'SELECT jenis_produk FROM produk order by rand()';
		
$bahan = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($bahan);
echo $row['jenis_produk'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
</body>
</html>
