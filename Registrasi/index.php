<?php 
//require 'function.php';

if (isset($_POST["submit"])) {

	//cek data berhasil ditambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambah');
					document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				document.location.href = 'index.php';
			</script>
		";
	}
}

//$carikode = mysqli_query($conn, "SELECT id_produk from produk") or die(mysqli_error($id_produk));
// menjadikannya array
//$datakode = mysqli_fetch_array($carikode);
/*$jumlah_data = mysqli_num_rows($carikode);
// jika $datakode
if ($datakode) {
	// membuat variabel baru untuk mengambil kode barang mulai dari 1
	$nilaikode = substr($jumlah_data[0], 1);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $jumlah_data + 1;
	// hasil untuk menambahkan kode 
	// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
	// atau angka sebelum $kode
	$kode_otomatis = "USR" . str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
	$kode_otomatis = "USR0001";
	}
	*/

 ?>
 <script type="text/javascript">
 	function Angkasaja(evt){
 		var charCode = (evt.which) ?
 		evt.which : event.keyCode
 		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
 			return false;
 			return true;
 		}
 	}
</script>
<script type="text/javascript">
function cekuser(a) {
valid = /^[A-Za-z]{1,}$/;
return valid.test(a);
}
function validasi(){
 var nama = document.getElementById("nama").value; 
 if(nama == ""){
 alert("nama harus diisi");
 }else if (!cekuser(nama)) {
 alert("Isi Dengan Huruf Saja");
 nama.focus();
 return false;
 }
}
</script>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <div class="container">
		<h1 class="text-center mb-4">REGISTER NOW</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<p class="form-group">
				<label for="id_user">ID USER<br></label>
				<input type="text" class="form-control" name="id_user" id="id_user" placeholder="ID User" required="">
			</p>
			<p class="form-group">
				<label for="nama_user">USERNAME<br></label>
				<input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="nama anda" required="" onkeypress="return validasi(event)">
			</p>
			<p class="form-group">
				<label for="email">EMAIL<br></label>
				<input type="email" class="form-control" name="email" id="email" placeholder="email anda" required="">
			</p>
			<p class="form-group">
				<label for="password">PASSWORD<br></label>
				<input type="password" class="form-control" name="password" id="password" placeholder="password" required="">
			</p>
			<div class="form-group">
				<label for="nohp_user">NOMOR HP<br></label>
			<input type="text" class="form-control" name="nohp_user" id="nohp_user" placeholder="nomor hp yang aktif" minlength="10" maxlength="12" required="" onkeypress="return Angkasaja(event)"/>
			</div>
			<div class="form-group">
				<label for="jk_user" ><br>JENIS KELAMIN<br></label>
				<input type="radio" class="form-control" name="jk_user" value="Laki-laki" id="jk_user" placeholder="jkuser">Laki-laki<br>
				<input type="radio" class="form-control" name="jk_user" value="Perempuan" id="jk_user" placeholder="jkuser">Perempuan<br>
			</div>
			<br><button type="submit" class="btn btn-primary" name="submit">DAFTAR</button>
		</form>
	</div>
 </body>
 </html>