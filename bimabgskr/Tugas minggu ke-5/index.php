
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LATIHAN</title>
    <style>
    body{
        background-image: url(coba.jpg);
        background-size: cover;

    }

    </style>
</head>
<body>
<div style="text-align: center">

<br>
<h1>ARRAY</h1>
<?php

//Mendeklarasi array
$array = ['belajar','mendeklarasikan','aray'];
?>

<?=  $array[0]; ?>

<br>

 <?php
    var_dump($array);
?>

<h1> ARRAY ASSOSIATIF</h1>
<?php

//membuat array assosiatif
    $array2 = ['nama'=> 'BIMA BAGASKARA'];
    echo $array2['nama'];

?>

<h1>ARRAY FOR</h1>
<?php

//array menggunakan for
for ($i=0; $i < count($array); $i++){
    echo $array[$i].'<br>';
}

?>

<h1>Menampilkan array dengan foreach</h1>
<?php
foreach ($array as $nb){
    echo $nb.'<br>';
}

?>

<h2> PERULANGAN WHILE</h2>
<?php
$x =1;
while ($x <= 10){
    echo 'Hello SOBAT ERMAN: '.$x.'<br>';
    $x++;
}
?>

<h1>aritmatika</h1>
<?php
function perkalian ($angka, $angka1){
    return $angka * $angka1 ;
}
echo 'hasil perkalian:'. perkalian (10,10).'<br>';
function pembagian ($angka,$angka1){
    return $angka/$angka1;
}
echo 'hasil pembagian:'. pembagian (4.34,5);
?>
<h1>penanganan form</h1>
untuk penanganan form, klik
<a href="getPost.php">disini</a>
<br><br><br><br>
</div>
</body>
</html>