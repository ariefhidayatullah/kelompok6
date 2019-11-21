<?php 

$host = "localhost";
$user = "root" ;
$password = "";
$database = "printonline";

$koneksi = mysqli_connect("$host","$user","$password","$database");

// Check connection
if ($koneksi -> connect_error) {
	die("koneksi gagal : " . $koneksi -> connect_error);
}
echo"koneksi berhasil";
?>