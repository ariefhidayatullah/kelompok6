<?php
	session_start();
	unset($_SESSION['cart']);
	$_SESSION['message'] = 'Cart Selesai dihapus';
	header('location: index.php');
?>