<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_bahan = $_POST['id_produk'];
$nama_bahan = $_POST['jenis_produk'];
$id_produk = $_POST['harga_satuan'];

// menginput data ke database
mysqli_query($koneksi,"insert into bahan values('$id_produk','$jenis_produk','$harga_satuan')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");