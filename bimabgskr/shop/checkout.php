<?php
	session_start();
	//user needs to login to checkout
	$_SESSION['message'] = 'Kamu harus Login unuk melanjutkan Checkout';
	header('location: view_cart.php');
?>