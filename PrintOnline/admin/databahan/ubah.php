<?php
require 'function.php';

$id_bahan = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM bahan WHERE id_bahan = '$id_bahan'");

if (isset($_POST["submit"])) {
    //cek data berhasil diubaahtau tidak
    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah');
					document.location.href = 'databahan.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah'); 
			</script>
		";
    }
}

include '../_header.php';

?>


<!-- Begin Page Content -->
<div class="container text-center">
    <h1 class="h4 text-gray-900 mb-4">ubah data</h1>
    <?php foreach ($mhs as $row) : ?>

        <form class="user" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col mb-3 mb-sm-0">
                    <input class="form-control form-control-static" type="hidden" name="id_bahan" id="id_bahan" required value="<?= $row['id_bahan']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="col mb-3 mb-sm-0">
                    <label for="nama_bahan">nama bahan : </label>
                    <input class="form-control form-control-static" type="text" name="nama_bahan" id="nama_bahan" required value="<?= $row['nama_bahan']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col mb-3 mb-sm-0">
                    <label for="stok">stok : </label>
                    <input class="form-control form-control-static" type="text" name="stok" id="stok" required value="<?= $row['stok']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col mb-3 mb-sm-0">
                    <label for="harga_satuan">harga satuan : </label>
                    <input class="form-control form-control-static" type="text" name="harga_satuan" id="harga_satuan" required value="<?= $row['harga_satuan']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col mb-3 mb-sm-0">
                    <label for="id_produk">id produk : </label>
                    <select class="form-control" name="id_produk" id="id_produk">
                        <option>pilih produk : </option>
                        <?php
                            $q = mysqli_query($conn, "SELECT * FROM produk");
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<option value=$row[id_produk]>$row[jenis_produk]</option>";
                            } ?>
                    </select>
                </div>
            </div>
            <a href="databahan.php" class="btn btn-warning">
                Kembali
            </a>
            <button class="btn btn-primary" name="submit" type="submit">
                Ubah
            </button>
        </form>
    <?php endforeach; ?>
</div>
<?php
include '../_footer.php';
?>