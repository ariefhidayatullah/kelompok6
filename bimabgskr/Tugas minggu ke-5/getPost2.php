 <?php
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
echo " nama anda :". $nama;
echo "<br>";
echo "alamat:". $alamat;
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<br><br><br>
<table border ="1" cellpedding = "10" cellspacing= "0"> 
    <form action="getpost3.php" method="POST">
            <tr>
                <td>
                    <label for="jeniskelamin">jeniskelamin:</label>
                </td>
                <td>
                    <input type="radio" name ="jeniskelamin" id= "pria" autofocus required value="pria"><label for="pria">pria</label>
                    <input type="radio" name ="jeniskelamin" id= "wanita"  autofocus required value="wanita"><label for="wanita">wanita</label>
                </td>
            </tr>
           <tr>
                <td>
                    <label for="motivasi">motivasi:</label>
                </td>
                <td>
                  <textarea name="motivasi" id="motivasi" cols="30" rows="5" autofocus required></textarea>
                </td>
            </tr>
            <tr>
                <td colspan ="2"><center>
                    <button type ="submit" name ="submit">kirim!</button>
                </center>

                </td>
            </tr>
    </form>
    </table>

</body>
</html>