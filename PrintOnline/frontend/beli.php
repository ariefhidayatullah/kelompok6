<?php
session_start();
include 'include/_header.php';
require 'function.php';

$id_cart = $_GET['id_cart'];

mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart = '$id_cart'");
echo "<script>alert('produk telah dihapus dari keranjang');</script>".$id_cart;
echo "<script>window.location ='cart.php';</script>";

// jika sudah ada produk itu di keranjang, maka produk itu jumlahnya di tambah 1

if (isset($_POST["cart"])) {
 if (tambahcart($_POST) > 0) {
		echo "
			<script>
				alert('produk berhasil masuk keranjang');
					document.location.href = 'cart.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal masuk keranjang'); 
				document.location.href = 'cart.php';
			</script>
		";
}
echo "<script> alert ('produk telah masuk keranjang') ; </script>";
echo "<script>location='cart.php'; </script>";
}
?>