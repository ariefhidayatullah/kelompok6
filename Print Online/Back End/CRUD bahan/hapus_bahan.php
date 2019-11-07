<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_bahan = $_GET['id_bahan'];


// menghapus data dari database
mysqli_query($koneksi,"delete from bahan where id_bahan='$id_bahan'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>