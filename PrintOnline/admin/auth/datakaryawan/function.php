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

function registrasi($data)
{
    global $conn;
    $id_karyawan = ($data["id_krw"]);
    $nama_karyawan = htmlspecialchars($data["nama_krw"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp_krw"]);

    //query insert data
    $query = "INSERT INTO karyawan VALUES ('$id_karyawan', '$nama_karyawan', '$email', '$nohp')";
    mysqli_query($conn, $query);
    return  mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id_krw = $data['id_krw'];
    $nama_krw = $data['nama_krw'];
    $email = $data['email'];
    $nohp_krw = $data['nohp_krw'];


    //query insert data
    $query = "UPDATE karyawan SET 
			nama_krw = '$nama_krw',
			email = '$email',
			nohp_krw = '$nohp_krw'
			WHERE id_krw = '$id_krw'
			";
    mysqli_query($conn, $query);
    return  mysqli_affected_rows($conn);
}
