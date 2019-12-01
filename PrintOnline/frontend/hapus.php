<?php
require 'function.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart = '$id'");
 
header("location:cart.php");

?>