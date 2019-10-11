<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_bahan = $_POST['id_bahan'];
$nama_bahan = $_POST['nama_bahan'];
$id_produk = $_POST['id_produk'];
$stok =$_POST['stok'];

// menginput data ke database
mysqli_query($koneksi,"insert into bahan values('$id_bahan','$nama_bahan','$id_produk','$stok')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");