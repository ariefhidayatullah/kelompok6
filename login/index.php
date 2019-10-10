<?php 

	if(isset($_POST['submit'])){
		if ($_POST['password'] == '123' && $_POST['username']
			== 'admin') {
			header("Location:admin.php");
		exit;
		}
	}else{
		$error = true;
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Login Admin</h1>
	<?php  if( isset($error)) :?>
	<p>Username atau Password salah!!!</p>
	<?php endif; ?>
<ul>
	<form action="" method="post">
		
		 <li>
		 	<label for="username"> username : </label>
			<input type="text" name="username" id="username">
		 </li>
		 <li>
		 	<label for="password"> password : </label>
		 	<input type="password" name="password" id="password">
		 </li>
		 <li>
		 	<button type="submit" name="submit">Kirim!</button>
		 </li>
	</form>
</ul>
</body>
</html>