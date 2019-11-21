<?php 

require 'function.php';

if(isset($_POST["login"])) {

  $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

      if(mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
          header("Location : dashboard.php");
        exit;
        }
        
      }
    $error = true;
    }


if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // cek password
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = $username;
      header("Location:../dashboard/index.php");
      exit;
    }
  }
  $error  = true;
  ?>

<?php
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="" method="post">
    <li>
        <label for="username">USNM
        </label>
        <input type="text" name="username" id="password">
    </li>
    <li>
        <label for="password">PSSWD
        </label>
        <input type="password" name="password" id="password">
    </li>
    <button type="submit" name="login">LOGIN</button>
</form>
</body>
</html>