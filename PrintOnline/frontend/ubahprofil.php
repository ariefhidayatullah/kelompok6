<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_GET['id'];
$bahan = query("SELECT * FROM user WHERE id_user = '$id_user'");

if (isset($_POST["submit"])) {
    //cek data berhasil diubah atau tidak
    if (ubahprofil($_POST) > 0) {
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

?>


<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
    <?php include 'include/navbar.php'; ?>
    <!-- //Header -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">ubah Profil</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">ubah Profil</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="wn_contact_area bg--white pt--80 pb--80">
        <div class="container">
            <div class="row">
                <?php foreach ($bahan as $row) : ?>
                    <div class="col-lg-10 col-12 offset-1">
                        <div class="account__form">
                            <form class="user" action="" method="POST">
                                <div class="contact-form-wrap">
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']; ?>">
                                    <div class="single-contact-form space-between">
                                        <label>nama <span>:</span> <input class="input__box" name="nama_user" id="nama_user" required value="<?= $row['nama_user']; ?>"></label>
                                        <label>email <span>:</span><input class="input__box" name="email" id="email" required value="<?= $row['email']; ?>"></label>
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label>username <span>:</span><input class="input__box" name="username" id="username" required value="<?= $row['username']; ?>"></label>
                                        <label>password <span>:</span><input class="input__box" name="password" id="password" required></label>
                                    </div>
                                    <div class=" single-contact-form space-between">
                                        <label>jenis kelamin <span>:</span><input class="input__box" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $row['jenis_kelamin']; ?>"></label>
                                        <label>no hp <span>:</span><input class="input__box" name="nohp_user" id="nohp_user" required value="<?= $row['nohp_user']; ?>"></label>
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label for="Provinsi">Provinsi <select class="form-control" id="provinsi" name="provinsi" required></select></label>
                                        <label for="Kabupaten">Kabupaten <select class="form-control" id="kabupaten" name="kabupaten" required></select></label>
                                        <label for="Kecamatan">Kecamatan<select class="form-control" id="kecamatan" name="kecamatan" required></select></label>

                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label>alamat <span>:</span><input class="input__box" name="alamat" id="alamat" required value="<?= $row['alamat']; ?>"></label>
                                        <label>kode pos <span>:</span><input class="input__box" name="kodepos" id="kodepos" required value="<?= $row['kodepos']; ?>"></label>
                                    </div>
                                    <div class="space-between">
                                        <input type="file" id="gambar" name="gambar">
                                    </div>
                                    <div class="form__btn">
                                        <button name="submit" type="submit">edit profil</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </section>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#provinsi").append('<option value="">Pilih</option>');
        $("#kabupaten").html('');
        $("#kecamatan").html('');
        $("#kabupaten").append('<option value="">Pilih</option>');
        $("#kecamatan").append('<option value="">Pilih</option>');
        url = 'include/get_provinsi.php';
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[
                        i].nama_prov + '</option>');
            }
        });
    });
    $("#provinsi").change(function() {
        var id_prov = $("#provinsi").val();
        var url = 'include/get_kabupaten.php?id_prov=' + id_prov;
        $("#kabupaten").html('');
        $("#kecamatan").html('');
        $("#kabupaten").append('<option value="">Pilih</option>');
        $("#kecamatan").append('<option value="">Pilih</option>');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#kabupaten").append('<option value="' + result[i].id_kabkot + '">' + result[
                        i].nama_kabkot + '</option>');
            }
        });
    });
    $("#kabupaten").change(function() {
        var id_kabkot = $("#kabupaten").val();
        var url = 'include/get_kecamatan.php?id_kabkot=' + id_kabkot;
        $("#kecamatan").html('');
        $("#kecamatan").append('<option value="">Pilih</option>');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#kecamatan").append('<option value="' + result[i].id_kec + '">' + result[
                        i].nama_kec + '</option>');
            }
        });
    });
</script>

<?php
include 'include/_footer.php';
?>