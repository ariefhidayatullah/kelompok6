<?php
require 'function.php';

$id_produk = $_GET['id'];

// var_dump($id);
//query data mahasiswa berdasarkan ID

$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

if (isset($_POST["submit"])) {
    //cek data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah');
					document.location.href = 'dataproduk.php';
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
<div class="container">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Ubah Data</h1>
        <?php foreach ($mhs as $row) : ?>
    </div>
    <form class="user" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">
        <div class="form-group row">
            <div class="col mb-3 mb-sm-0">
                <input class="form-control form-control-static" type="hidden" name="id_produk" id="id_produk" required value="<?= $row['id_produk']; ?>">
            </div>
        </div>

        <div class="col mb-3 mb-sm-0">
            <label for="jenis_produk">Jenis Produk : </label>
            <input class="form-control form-control-static" type="text" name="jenis_produk" id="jenis_produk" required value="<?= $row['jenis_produk']; ?>">
        </div>

        <div class="col mb-3 mb-sm-0">
            <label for="deskripsi">Deskripsi Produk : </label>
            <input class="form-control form-control-static" type="text" name="deskripsi" id="deskripsi" required value="<?= $row['deskripsi']; ?>">
        </div>

        <div class="col mb-3 mb-sm-0">
            <label for="gambar">Gambar : </label>
            <img src="img/<?= $row['gambar']; ?>" width="40"><input type="file" name="gambar" id="gambar">
        </div>
        <div class="text-center">
            <input class="btn btn-primary" name="submit" type="submit" value="Ubah">
            </input>
            <a href="dataproduk.php" class="btn btn-Warning" name="submit" type="submit">
                Kembali
            </a>
        </div>
    </form>
</div>
<?php endforeach; ?>

<?php include '../_footer.php'; ?>