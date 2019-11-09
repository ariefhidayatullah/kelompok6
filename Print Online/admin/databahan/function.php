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

function tambah_bahan($data)
{
	global $conn;
	//ambil data dari tiap elemen dalam form
	$id_bahan = $data['id_bahan'];
	$nama_bahan = $data['nama_bahan'];
	$id_produk = $data['id_produk'];
	$stok = $data['stok'];
	$harga_satuan = $data['harga_satuan'];

	$query = "INSERT INTO bahan VALUES ('$id_bahan', '$nama_bahan', '$id_produk', '$stok', '$harga_satuan')";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}


function hapus_bahan($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM `bahan` WHERE id_bahan= $id");
	return mysqli_affected_rows($conn);
}

function ubah_bahan($data)
{
	global $conn;

	$id_bahan = $data['id_bahan'];
	$nama_bahan = $data['nama_bahan'];
	$id_produk = $data['id_produk'];
	$stok = $data['stok'];
	$harga_satuan = $data['harga_satuan'];

	$query = "UPDATE mahasiswa SET 
			nama_bahan = '$nama_bahan', 
			id_produk = '$id_produk',
			stok = '$stok', 
			harga_satuan = '$harga_satuan',
			WHERE id_bahan = $id_bahan
			";
	mysqli_query($conn, $query);
	return  mysqli_affected_rows($conn);
}

function cari($key)
{
	$query = "SELECT * FROM bahan WHERE nama LIKE '%$key%'";
	return query($query);
}
