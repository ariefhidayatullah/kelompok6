<?php 
require 'function.php';

if (isset($_POST["submit"])) {
		$email = $_POST["emailreg"];
        $username = $_POST["usernamereg"];
        $password = $_POST["passwordreg"];
        $password = password_hash($password, PASSWORD_DEFAULT);
	
	$result = mysqli_query($conn, "INSERT INTO user(id,email,username,password) VALUES(NULL,'$email','$username','$password')");
	//cek data berhasil ditambsh atau tidak
	if (tambah($_POST) > 0) {
        
		echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'dashboard.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah'); 
				
			</script>
		";
	}
} 
?>