<?php 
require 'function.php';

if ( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM login_user WHERE username = '$username'");

    // Untuk Mengecek username 
    if (mysqli_num_rows($result) == 1 ) {
       
        // Untuk Mengecek password
        $row = mysqli_fetch_assoc($result);
       if (password_verify($password, $row["password"]) ) {
           header ("Location : html1.php");
           exit;
       } 
    }

} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    
<h1>Halaman login</h1>

<form action="" method="post">

<ul>
    <li>
        <label for="username">username :</label>
        <input type="text" name="username" id="username">
    </li>
    <li>
        <label for="password">password :</label>
        <input type="password" name="password" id="password">
    </li>
    <li>
        <button type="submit" name="login">login</button>
    </li>
</ul>


</form>

</body>
</html>