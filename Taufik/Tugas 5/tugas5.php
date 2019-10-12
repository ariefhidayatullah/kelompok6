<?php 
echo "ARRAY";
echo "<br/> <br/>";
//membuat array yang berisi nama buah-buahan
$buah = array('semangka','jeruk','apel','anggur');
//count() untuk menghitung isi array.
for($x=0;$x<count($buah);$x++){
echo $buah[$x]."<br/>";
}

echo "<br/>";

//penamaan isi array
$buah['semangka'] = "isinya merah";
$buah['jeruk'] = "rasanya manis";
$buah['apel'] = "warnanya merah";
$buah['anggur'] = "harganya mahal";
// menampilkan isi array yang bernama jeruk
echo "buah ".$buah[1]." ".$buah['jeruk'];

echo "<br/>"; echo "<br/>";
echo "PERULANGAN WHILE PADA PHP</br> <br/>";
$x = 1;

while ($x <= 10) {
	echo "Astaghfirullah $x <br>";
	$x++;
}

echo "<br/>"; echo "<br/>";
echo "OPERATOR ARITMATIKA DI PHP</br> <br/>";

$a = 50;
$b = 10;
// Penjumlahan variabel a dengan variabel b
echo $a + $b; echo " (Operator Penjumlahan di PHP) <br/>";
// Pengurangan variabel a dengan variabel b
echo $a - $b; echo " (Operator Pengurangan di PHP) <br/>";
// Perkalian variabel a dengan variabel b
echo $a * $b; echo " (Operator Perkalian di PHP) <br/>";
// Pembagian variabel a dengan variabel b
echo $a / $b; echo " (Operator Pembagian di PHP) <br/>";


?>