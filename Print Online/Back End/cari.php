<?php 
include 'function.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="cari.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
</body>
</html>

<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";

}
?>

<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$data = mysqli_query($conn, "select * from produk where jenis_produk like '%".$cari."%'");				
}else{
	$data = mysqli_query($conn, "select * from produk");		
}

$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['jenis_produk']; ?></td><br>
	</tr>
	<?php }
?>