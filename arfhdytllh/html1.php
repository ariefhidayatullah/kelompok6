<!DOCTYPE html>
<html>
<head>
	<title>page tittle</title>
</head>
<body>

	<div style="text-align: center">
<h1 style="color:green;">nama saya : mohammad arief hidayatullah</h1>
<h3>Politeknik negeri jember</h3>
	
<?php
    echo "Hallowww Kelas </br></br>";
    $tempat = "di Polije";
	$Tempat = "di Polije Dua";
	$TempaT = "di Polije Tiga";

	echo "<h1 style='color:red'>Selamat Belajar HTML ".$tempat."</h1>";
	echo "<h2 style='color:blue'>Selamat Belajar HTML</h2>";
	echo "<h3>Selamat Belajar HTML ".$Tempat."</h3>";
	echo $TempaT."</br></br>";
	echo date("Y/m/d")."</br></br>";

	//Penjumlahan
	$a = 10; $b = $c = 20; $d = 2;
	$jumlah = ($a + $b)/$d;

	echo $jumlah."</br></br>";

	for ($x = 0; $x <= 10; $x++) {
    	echo "Tempat Ke - ".$x."<br>";
		}

	$t = date("H");

	if ($t < "20") {
    	echo "Selamat Pagi!";
	}

	//Konstanta
	define("arfhdytllh", "Selamat datang di Polije!");
	echo "</br></br>".arfhdytllh;

	//Fungsi
	function khafid(){
		echo "</br></br>".arfhdytllh." Dua";
	}

	khafid();

?>
	</div>
<h4 align="center">kembali kehalaman sebelumnya <a href="html2.html" align="center">klik disini</a></h4>

</body>
</html>