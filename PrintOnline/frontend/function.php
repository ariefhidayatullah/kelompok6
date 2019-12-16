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

function tambah($data)
{
	global $conn;
	//ambil data dari tiap elemen dalam form
	$id_produk = $data['id_produk'];
	$jenis_produk = $data['jenis_produk'];

	//upload Gambar

	$gambar = upload();
	if ($gambar == false) {
		return false;
	}

	//query insert data
	$query = "INSERT INTO produk VALUES ('$id_produk', '$jenis_produk', '$gambar')";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}


function ubah($data)
{
	// global $conn;

	// $id_produk = $data['id_produk'];
	// $jenis_produk = $data['jenis_produk'];
	// $nama_bahan = $data['nama_bahan'];
	// $ukuran = $data['ukuran'];
	// $deskripsi = $data['deskripsi'];
	// $gambar = $data['gambar'];
	// $harga = $data['harga'];

	// $sql = "SELECT * FROM bahan WHERE nama_bahan = '$harga'";
	// $ba = mysqli_query($conn, $sql);
	// $ro = mysqli_fetch_array($ba);
	// $harga_bahan = $ro['harga_satuan'];

	// //query insert data
	// $query = "UPDATE produk SET 
	// 		jenis_produk = '$jenis_produk',
	// 		jenis_bahan = '$nama_bahan',
	// 		deskripsi = '$deskripsi',
	// 		harga = '$harga',
	// 		ukuran = '$ukuran',
	// 		gambar = '$gambar'
	// 		WHERE id_produk = '$id_produk'
	// 		";
	// mysqli_query($conn, $query);
	// return  mysqli_affected_rows($conn);
}

function cari($key)
{
	$query = "SELECT * FROM produk WHERE nama LIKE '%$key%'";
	return query($query);
}

function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//jika gambar tidak di upload

	if ($error === 4) {
		echo "<script>alert('Masukkan Gambar!!');</script>";
		return false;
	}

	//jika yg di upload bukan gambar

	$valid = ['jpg', 'jpeg', 'png', 'jfif'];

	//explode untuk mengubah string menjadi array(memecah)
	// '.' yang mau di pecah selanjutnya
	$ekstensiGambar = explode('.', $namaFile);
	//mengambil array yang paling akhir (end)
	//menjadikan huruf kecil semua (strtolower())
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $valid)) {
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

	$namaFileBaru = uniqid() . '.' . $ekstensiGambar;

	//jika lolos dari seleksi

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}


function registrasi($data)
{
	global $conn;

	$nama_user = strtolower(stripcslashes($data["nama_user"]));
	$email = strtolower(stripcslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nohp_user = strtolower(stripcslashes($data["nohp_user"]));

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
	if (mysqli_fetch_assoc($result)) {
		echo "
            <script>
            alert ('mohon maaf email sudah terdaftar!');
            </script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
    alert('konfirmasi password tidak sesuai!');
	</script>";
		return false;
	}

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);

	if (!$uppercase || !$lowercase || !$number || strlen($password) <= 6) {
		echo "<script>
		alert('password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka');
		</script>";
		return false;
	}

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES ('', '', '$nama_user', '$email', '', '$password', '', '$nohp_user', '', '', '', '', '')");
	echo "<script>
    alert('selamat datang anda sudah terdaftar, silakan lengkapi data anda!');
	</script>";
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
	$roww = mysqli_fetch_array($result);
	$id_user = $roww['id_user'];
	$_SESSION["LOGIN"] = $roww['email'];
?>
	<meta http-equiv="refresh" content="0; URL=login.php?id=<?= $id_user ?>">
<?php
															}

															function tambahcart($data)
															{
																global $conn;
																//ambil data dari tiap elemen dalam form
																$id_produk = $data['id_produk'];
																$nama_bahan = $data['nama_bahan'];
																$bhn = mysqli_query($conn, "SELECT * FROM bahan WHERE nama_bahan = '$nama_bahan'");
																$req = mysqli_fetch_array($bhn);
																$harga = $req['harga_satuan'];
																$qty = $data['qty'];
																$email = $_SESSION["LOGIN"];

																$cek_barang = "SELECT * FROM keranjang WHERE id_produk = '$id_produk'";
																$hasil_barang = mysqli_query($conn, $cek_barang);
																$hasil = mysqli_fetch_array($hasil_barang);

																if (mysqli_num_rows($hasil_barang) > 0) {
																	$totalstok = $qty + $hasil['qty'];
																	$update = "UPDATE keranjang SET qty = '$totalstok' WHERE id_produk = '$id_produk' AND nama_bahan = '$nama_bahan'";
																	mysqli_query($conn, $update);
																	mysqli_affected_rows($conn);
																	echo 'gagal';
																} else {
																	mysqli_query($conn, "INSERT INTO keranjang (id_cart, email, id_produk, nama_bahan, harga_satuan, qty)
					VALUES ('', '$email', '$id_produk', '$nama_bahan', '$harga', '$qty')");
																	return  mysqli_affected_rows($conn);
																	echo 'gagal';
																}
															}

															function ubahprofil($data)
															{
																global $conn;
																// ambil data dari tiap elemen
																$id_user = $data['id_user'];
																// $gambar = upload();
																$nama_user = $data['nama_user'];
																$email = $data['email'];
																$username = $data['username'];
																$password = $data['password'];
																$jenis_kelamin = $data['jenis_kelamin'];
																$nohp_user = $data['nohp_user'];
																$provinsi = $data['provinsi'];
																$kabupaten = $data['kabupaten'];
																$kecamatan = $data['kecamatan'];
																$alamat = $data['alamat'];
																$kodepos = $data['kodepos'];

																//cek

																// if ($gambar == false) {
																// 	return false;
																// }

																//query insert data
																$query = "UPDATE user SET
			nama_user = '$nama_user' ,
			email = '$email',
			username = '$username',
			password = '$password',
			jenis_kelamin = '$jenis_kelamin',
			nohp_user = '$nohp_user',
			provinsi = '$provinsi',
			kabupaten = '$kabupaten',
			kecamatan = '$kecamatan',
			alamat = '$alamat',
			kodepos = '$kodepos'
			WHERE id_user = '$id_user'
			";
																mysqli_query($conn, $query);
																return  mysqli_affected_rows($conn);
															}
