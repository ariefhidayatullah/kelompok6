<!DOCTYPE html>
<html>
<head>
	<title>Bismillah</title>
</head>
<body>

<h1 style="color:red">Selamat Belajar HTML</h1>
<h2 style="color:blue">Nama saya : Taufik Hariyanto</h2>
<h3>Politeknik negeri jember</h3>

<?php
    echo "Hallowww Kelas </br></br>";
    $tempat = "di Polije";
	$Tempat = "di Polije Dua";
	$TempaT = "di Polije Tiga";

	echo "<h1 style='color:red'>Selamat Belajar HTML ".$tempat."</h1>";
	ECHO "<h2 style='color:blue'>Selamat Belajar HTML</h2>";
	EcHo "<h3>Selamat Belajar HTML ".$Tempat."</h3>";
	echo $TempaT."</br></br>";
	echo date("Y/m/d")."</br></br>";

	//Penjumlahan
	$a = 178; $b = $c = 20; $d = 2;
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
	define("Taufik", "Selamat datang di Polije!");
	echo "</br></br>".Taufik;

	//Fungsi
	function Taufik(){
		echo "</br></br>".Taufik." Dua";
	}

	Taufik();

?>



</body>
</html>