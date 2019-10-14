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

	//upload Gambar

	$gambar = upload();
	if ($gambar == false) {
		return false;
	}

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
	$gambarLama = $data['gambarLama'];

	//cek

	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}


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

function cari($key){
	$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$key%'";
	return query($query);
}	

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//jika gambar tidak di upload

	if($error === 4){
		echo "<script>alert('Masukkan Gambar!!');</script>";
		return false;
	}

	//jika yg di upload bukan gambar

	$valid = ['jpg', 'jpeg', 'png'];

	//explode untuk mengubah string menjadi array(memecah)
	// '.' yang mau di pecah selanjutnya
	$ekstensiGambar = explode('.', $namaFile);
	//mengambil array yang paling akhir (end)
	//menjadikan huruf kecil semua (strtolower())
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if(!in_array($ekstensiGambar, $valid)){
		echo "<script>alert('yang anda Upload bukan Gambar!');</script>";
		return false;
	}

	//cek ukurannya terlalu besar

	if ($ukuranFile > 1000000) {
		echo "<script>
					alert('Gambar terlalu besar!');
			</script>";
		return false;
	}

	//membuat nama file baru

	$namaFileBaru = uniqid().'.'.$ekstensiGambar;

	//jika lolos dari seleksi

	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

	return $namaFileBaru;


}
