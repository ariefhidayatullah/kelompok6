<div style="overflow:auto; width:30%; height:320px; margin-left:35%;margin-right:35%;">
	<table class="art-article" border="0" cellspacing="0" cellpadding="0" style=" margin: 0; width: 100%;">
		<tbody>
		<?php 

$host = "localhost";
$user = "root" ;
$password = "";
$database = "printonline";

$koneksi = mysqli_connect("$host","$user","$password","$database");

// Check connection
if ($koneksi -> connect_error) {
	die("koneksi gagal : " . $koneksi -> connect_error);
}
echo"Mantap koneksi berhasil Sobat ERMAN";
?>
			$Tampil="SELECT * FROM chat ORDER BY waktu DESC LIMIT 99;";
			$query = mysql_query($Tampil);
			while (	$hasil = mysql_fetch_array ($query)) {
				$komen = stripslashes ($hasil['komen']);
				$waktu = stripslashes ($hasil['waktu']);
				$nama = stripslashes ($hasil['nama']);	
			?>	
			<style type="text/css">
				#atas {
					border-bottom-width: 1px;
					border-bottom-style: ridge;
					border-bottom-color: #CCC;
					margin-top: 1px;
					margin-right: 1px;
					margin-bottom: 2px;
					margin-left: 0px;
					padding-bottom: 1px;
					color: #FFA500;
				}
				#pesan {
					padding-right: 1px;
					padding-left: 0px;
					margin-bottom: 10px;
					color: #080808;
				}
				.waktu {
					float: right;
					color: #871214;
					font-family: Arial;
					font-size: 9px;
				}
			</style>
			<?php
			echo"
				<div id='atas'>$hasil[nama]<span class='waktu'>$hasil[waktu]</span></div>
				<div id='pesan'>$hasil[komen]</div>";
			}
			?>
		</tbody>
	</table>  
</div><br>
<div style="width:30%; height:320px; margin-left:35%;margin-right:35%;">
	<form method="POST" name="chat" action="#" enctype="application/x-www-form-urlencoded"><p>Post your chat:</p><br><p>Name</p><input type="text" placeholder=" Nama Anda" name="nama" maxlength="9" style="width: 95%;"></input><br><br><p>Email</p><input type="text" placeholder=" Alamat email Anda" name="email" maxlength="30" style="width: 95%;"></input><br><br><p>Chat</p><textarea placeholder=" Obrolan Anda" name="komen" rows="2" cols="40" maxlength="120" style="width: 95%;"></textarea><br><br><input type="checkbox" name="cek" value="cek" class="art-button"> Confirm you are NOT a spammer</input><br><br><input type="submit" name="submit" value="Send" class="art-button"></input>&nbsp;<input type="reset" name="reset" value="Clear" class="art-button"></input>
	<?php
		if (isset($_POST['submit'])) {
		$nama	= $_POST['nama'];
		$email	= $_POST['email'];
		$komen	= $_POST['komen'];
		$waktu	= date ("Y-m-d, H:i a");
		$cek	= $_POST['cek'];
		if ($_POST['nama']=='Admin') { //validasi kata admin
	?>
		<script language="JavaScript">
			alert('Anda bukan Admin !');
				document.location='index.php';
		</script>
	<?php
		mysql_close($Open);
	}
		if (empty($_POST['nama'])|| empty($_POST['email']) || empty($_POST['komen'])) { //validasi data
	?>
		<script language="JavaScript">
			alert('Data yang Anda masukan tidak lengkap !');
				document.location='index.php';
			</script>
	<?php
	}
		if (empty($_POST['cek'])) { //validasi data
	?>
		<script language="JavaScript">
			alert('Please Checklist - Confirm you are NOT a spammer !');
				document.location='index.php';
		</script>
	<?php
	}
	else {
		$input_chat = "INSERT INTO chat (nama, email, komen, waktu, cek) VALUES ('$nama', '$email', '$komen', '$waktu', '$cek')";
		$query_input =mysql_query($input_chat);
		if ($query_input) {
	?>
		<script language="JavaScript">
			document.location='index.php';
		</script>
	<?php
	}
	else{
		echo'Dbase E';
	}
	}
	}
	mysql_close($Open);
	?>
	</form>
</div>