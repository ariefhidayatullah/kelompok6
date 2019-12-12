<?php
session_start();
include 'include/_header.php';
require 'function.php';

$id_produk = $_GET['id'];


// jika sudah ada produk itu di keranjang, maka produk itu jumlahnya di tambah 1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
$_SESSION['gambar'] = $gambar = upload();
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}



echo "<script> alert ('produk telah masuk keranjang') ; </script>";
echo "<script>location='cart.php'; </script>";
