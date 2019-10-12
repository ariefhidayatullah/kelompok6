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
	$nama = htmlspecialchars($data['nama']);
	$nim = htmlspecialchars($data['nim']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);
	
	// upload gambar
	$gambar=upload();
	if ( !$gambar ) {
		return false; 
	}

	//query insert data
	$query = "INSERT INTO mahasiswa VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}


function upload(){

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang di upload
	if ( $error == 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	// cek apakah yang di upload adalah gambar
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if ( !in_array($ekstensigambar, $ekstensigambarvalid)) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			</script>";
		return false;
	}

	// cek ukuran gambar terlalu besar
	$ekstensiFile = [' > 1500000 ' ];
	if( !in_array($ukuranfile , $ekstensiFile )) {
		echo "<script>
			alert('ukuran gambar terlalu besar !');
		</script>";
		return false;
}

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
