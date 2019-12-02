<?php
session_start();
include 'include/_header.php';
require 'function.php';


if (isset($_SESSION["LOGIN"])) {

    $username = $_SESSION["LOGIN"];
    $user = query("SELECT * FROM user where email = '$username'");

    if (isset($_GET["cart"])) {

        //cek data berhasil ditambah atau tidak
        if (tambahcart($_GET) > 0) {
            echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'cart.php';
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
} else {
    echo "<script> alert('silahkan login terlebih dahulu!');</script>";
    echo "<script>Location ='login.php'; </script>";
}

if (isset($_POST["submit"])) {
    //cek data berhasil diubah atau tidak
    if (uploaddesain($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah');
			</script>
		";
        header("Location:index.php");
    } else {
        echo "
			<script>
				alert('data gagal diubah'); 
			</script>
		";
    }
}

?>

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

    <!-- Header -->
    <?php include 'include/navbar.php'; ?>
    <!-- //Header -->
    <!-- Start Search Popup -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">upload desain</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">upload desain</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col mb-3 mb-sm-0">
            <label for="id_cart">nama Produk : </label>
            <select class="form-control" name="id_cart" id="id_cart">
                <option>Pilih Produk : </option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM keranjang WHERE username = '$username'");
                while ($row = mysqli_fetch_array($q)) {
                    $id_produk     = $row['id_produk'];
                    $ba = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                    $ro = mysqli_fetch_array($ba);
                    echo "<option value=$row[id_produk]>$ro[jenis_produk]</option>";
                } ?>
            </select>
        </div>
    </div>

</div>

<?php
include 'include/_footer.php';
?>