<?php 
// (FOR) Kondisi dimana Bima diulang sampai 10
    // for ($i = 0; $i < 3; $i++ ) {   
    //     echo "Bima <br>" ;
    // }

// (WHILE) Hampir sama kaya For tapi lebih banyak(rumit)
// Cek kondisinya jika kondisi true cetak/jalankan Echonya jika false berhenti cetak/jalan
    // $i = 0;
    // while ( $i < 3) {
    //     echo "Bima <br>";
    // $i++;
    // }

// do...while
//Lakukan Hal ini selama kondisi bernilai True
//Ketika kondisinya bernilai false maka Echonya tetap dijalankan 1 kali karena untuk mengecek
    // $i = 0;
    // do {
    //     echo "Bima <br>";
    // $i++;
    // } while( $i < 3 );

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> -->
    <!-- pembuatan garis tabel -->
    <!-- <table border = "1" cellpadding = "10" cellspacing = "0">
    <tr>
        <td>1,1</td>
        <td>1,2</td>
        <td>1,3</td>
        <td>1,4</td>
        <td>1,5</td>
    </tr>
    <tr>
        <td>2,1</td>
        <td>2,2</td>
        <td>2,3</td>
        <td>2,4</td>
        <td>2,5</td>
    </tr>
    <tr>
        <td>3,1</td>
        <td>3,2</td>
        <td>3,3</td>
        <td>3,4</td>
        <td>3,5</td>
    </tr>
    <tr>
        <td>4,1</td>
        <td>4,2</td>
        <td>4,3</td>
        <td>4,4</td>
        <td>4,5</td>
    </tr>
    </table>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- pembuatan inisiasi tabel -->
<table border = "1" cellpadding = "10" cellspacing = "0"> 
    <?php   
        for ($i = 1; $i <= 4; $i++) { //dimana variabel i adalah baris (tr)
            echo "<tr>";
        for ($j =1; $j <= 5; $j++) {
            echo "<td>$i , $j </td>"; //dimana variabel j adalah kolom (td)
        }
            echo "</tr>";
    }
    ?>
</table>
</body>
</html>