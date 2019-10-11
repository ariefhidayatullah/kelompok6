<?php 
echo "ARRAY";
echo "<br/>";
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
echo $buah['jeruk'];

echo "<br/>"; echo "<br/>";
echo "OPERASI ARITMATIKA</br>";
$a = 20;
$b = 10;
//menjumlahkan variabel a dengan variabel b
echo $a + $b; echo "<br/>";
//mengrangi variabel a dengan variabel b
echo $a - $b; echo "<br/>";
//menjumlahkan variabel a dengan variabel b
echo $a * $b; echo "<br/>";
//menjumlahkan variabel a dengan variabel b
echo $a / $b; echo "<br/>";

$x = 1;
while($x <= 10) {
echo "Angka $x <br>";
$x++;
}
echo "<br/>";
echo "Penanganan form, koneksi, dan CRUD ada pada folder bahan";

 ?>