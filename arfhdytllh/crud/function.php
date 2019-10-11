<?php 
//untuk koneksi
$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');

//membuat function agar jadi satu, supaya jadi efektif dan efisien
function query($query){
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

function tambah($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$nama = $data['nama'];
	$nim = $data['nim'];
	$email = $data['email'];
	$jurusan = $data['jurusan'];
	$gambar = $data['gambar'];

	//query insert data
	$query = "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM `mahasiswa` WHERE id= $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = $data['id'];
	//ambil data dari tiap elemen dalam form
	$nama = $data['nama'];
	$nim = $data['nim'];
	$email = $data['email'];
	$jurusan = $data['jurusan'];
	$gambar = $data['gambar'];

	//query insert data
	$query = "UPDATE mahasiswa SET 
			nama = '$nama', 
			nim = '$nim',
			email = '$email', 
			jurusan = '$jurusan',
			gambar = '$gambar'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}
 ?>
