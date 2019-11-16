<?php 

//untuk koneksi
$conn = mysqli_connect('localhost', 'root', '', 'printonline');

//membuat function agar jadi satu, supaya jadi efektif dan efisien
function query($query)
{
	//untuk memasukkan variabel $conn karena kalau langsung tidak bisa, grgr scope
	global $conn;
	//membuat array kosong untuk menampung data
	$result = mysqli_query($conn, $query);
	//untuk mengambil data dari database
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

?> 