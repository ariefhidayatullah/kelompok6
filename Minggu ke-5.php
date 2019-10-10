 //Untuk Koneksi
 <?php
  //Koneksi DB
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "printonline";

    $koneksi = mysqli_connect($host, $user, $password, $database);

 	// Check connection
	if ($koneksi->connect_error) {
    	die("Koneksi Gagal: " . $koneksi->connect_error);
	}
	echo "Koneksi Berhasil";
 ?>


 //Untuk Pemrosesan Form Login
 <form action="" method="POST">
  Username:<br>
  <input type="text" name="x" placeholder="Username" class="form">
  <br>
  Password:<br>
  <input type="text" name="y" placeholder="Password">
  <br><br>
  <input type="submit" name="lo" value="Masuk" class="btn btn-primary">
 </form> 

  <?php
    if(isset($_POST['lo'])){
      $username = filter_input(INPUT_POST, 'x', FILTER_SANITIZE_STRING);
      $password = filter_input(INPUT_POST, 'y', FILTER_SANITIZE_STRING);
    
      if ($username=="admin" && $password=="root"){
        session_start();
        $_SESSION["user"] = $username;
        header("Location:html2.php");
        echo "</br></br>Berhasil Login";
      } else {
        echo "</br></br>Gagal Login";
      }
    }
  ?>
