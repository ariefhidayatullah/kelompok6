<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center">
    <h1>penanganan form</h1>
    <table border ="1" cellpedding = "10" cellspacing= "0"  style="text-align: center"> 
    <form action="getPost2.php" method="GET">
            <tr>
                <td>
                    <label for="nama">nama:</label>
                </td>
                <td>
                    <input type="text" name ="nama" id= "nama" placeholder= "masukkan nama" autofocus required >
                </td>
            </tr>
           <tr>
                <td>
                    <label for="alamat">alamat:</label>
                </td>
                <td>
                    <input type="text" name ="alamat" id= "alamat" placeholder= "masukkan alamat anda" autofocus  >
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
    </div>
 
</body>
</html>