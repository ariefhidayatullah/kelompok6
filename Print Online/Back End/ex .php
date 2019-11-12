<?php 
require 'function.php';
$sql = 'SELECT jenis_produk FROM produk order by rand()';
		
$bahan = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($bahan);
echo $row['jenis_produk'];
?>
