<?php 

$host = "localhost";
$user = "root" ;
$password = "";
$database = "shoppingcart";

$koneksi = mysqli_connect("$host","$user","$password","$database");

// Check connection
if ($koneksi -> connect_error) {
	die("koneksi gagal : " . $koneksi -> connect_error);
}
echo"Mantap koneksi berhasil Sobat ERMAN";
?>