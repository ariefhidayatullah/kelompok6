<?php
session_start();
	//initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

	//unset qunatity
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Shopping Cart using Session in PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
	.product_image{
		height:200px;
	}
	.product_name{
		height:80px; 
		padding-left:20px; 
		padding-right:20px;
	}
	.product_footer{
		padding-left:20px; 
		padding-right:20px;
	}
</style>
</head>
<body>
	<br/>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">The KING Cart</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- left nav here -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Product</button>
		<p/>
		<?php
		//info message
		if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
			<?php
			unset($_SESSION['message']);
		}


		//connection
		$conn = new mysqli('localhost', 'root', '', 'printonline');
		//cek data
		$id_produk = $_GET['id'];
		$cek_cart = "SELECT * from produk where id_produk ='$id_produk'";
		$hasil_cek = $conn->query($cek_cart);
		$jenis_produk = $hasil_cek['jenis_produk'];
		$gambar		  = $hasil_cek['gambar'];
		
		//ss
		$sql = "SELECT * FROM produk.id_produk, produk.jenis_produk, produk.gambar,
		bahan.id_baha, bahan.nama_bahan, bahan.id_produk, bahan.stok, bahan.harga_satuan
		FROM produk
		LEFT JOIN bahan ON bahan.id_produk = produk.id_produk
		ORDER BY bahan.id_produk ";
		$query = $conn->query($sql);
		$inc = 4;
		while($row = $query->fetch_assoc()){
			$inc = ($inc == 4) ? 1 : $inc + 1; 
			if($inc == 1) echo "<div class='row text-center'>";  
			?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="<?php echo $row['gambar'] ?>" width="80%" height="auto">
						</div>
						<div class="row product_name">
							<h4><?php echo $row['jenis_produk']; ?></h4>
						</div>
						<div class="row product_footer">
							
							<p class="pull-left"><b><?php echo $row['harga_satuan']; ?></b></p>
							<span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id_bahan']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
		if($inc == 2) echo "<div></div><div></div></div>"; 
		if($inc == 3) echo "<div></div></div>";
		
		//end product row 
		?>

	</div>

			<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="save_query.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama Produk</label>
								<input class="form-control" type="text" name="name">
							</div>
							<div class="form-group">
								<label>Harga Produk</label>
								<input class="form-control" type="number" name="price">
							</div>
							<div class="form-group">
								<label>Foto Produk</label>
								<input class="form-control" type="file" name="photo">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>