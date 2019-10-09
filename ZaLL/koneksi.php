<?php 

$host = "localhost";
$user = "root" ;
$password = "";
$database = "printonline";

$koneksi = mysqli_connect("$host","$user","$password","$database");

// Check connection
if ($koneksi -> connect_error) {
	die("maaf koneksi gagal : " . $koneksi -> connect_error);
}
echo"good koneksi berhasil";
?>