<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_GET['id'];
$username = $_SESSION["LOGIN"];
$user = query("SELECT * FROM user where email = '$username'");
$user = query("SELECT * FROM user WHERE id_user = '$id_user'");

if (isset($_POST["submit"])) {
    //cek data berhasil diubah atau tidak
    if (ubahprofil($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah');
			</script>
		";
        header("Location:ubahprofil.php");
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
                <?php foreach ($user as $row) : ?>
                    <div class="col-lg-10 col-12 offset-1">
                        <div class="container">
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="contact-form-wrap">
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']; ?>">
                                    <div class="single-contact-form space-between">
                                        <label>nama <span>:</span> <input class="input__box" name="nama_user" id="nama_user" required value="<?= $row['nama_user']; ?>"><small class="nama_user" style="color: red;"></small></label>
                                        <label>email <span>:</span><input class="input__box" name="email" id="email" required value="<?= $row['email']; ?>"><small class="email" style="color: red;"></small></label>
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label>username <span>:</span><input class="input__box" name="username" id="username" required value="<?= $row['username']; ?>"></label>
                                        <label>password <span>:</span><input class="input__box" type="password" name="password" id="password" required value=""></label>
                                    </div>
                                    <div class=" single-contact-form space-between">
                                        <label>jenis kelamin <span>:</span><input class="input__box" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $row['jenis_kelamin']; ?>"><small class="jenis_kelamin" style="color: red;"></small></label>
                                        <label>no hp <span>:</span><input class="input__box" name="nohp_user" id="nohp_user" required value="<?= $row['nohp_user']; ?>"><small class="nohp_user" style="color: red;"></small></label>
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label for="Provinsi">Provinsi <select name="provinsi" id="provinsi" class="form-control" required>
                                                <?php
                                                    $sat            = "SELECT * FROM prov ";
                                                    $result         = mysqli_query($conn, $sat);
                                                    while ($datasat  = mysqli_fetch_array($result)) {
                                                        echo "<option value='$datasat[id_prov]'" . ($row['provinsi'] == $datasat['id_prov'] ? ' selected' : '') . ">$datasat[nama_prov]</option>";
                                                    }
                                                    ?>
                                            </select></label>
                                        <label for="Kabupaten">Kabupaten <select class="form-control" id="kabupaten" name="kabupaten" required>
                                                <?php
                                                    $id_prov = $row['provinsi'];
                                                    $sat1          = "SELECT * FROM kabkot WHERE id_prov = '$id_prov' ";
                                                    $result1         = mysqli_query($conn, $sat1);
                                                    while ($datasat1  = mysqli_fetch_array($result1)) {
                                                        echo "<option value='$datasat1[id_kabkot]'" . ($row['kabupaten'] == $datasat1['id_kabkot'] ? ' selected' : '') . ">$datasat1[nama_kabkot]</option>";
                                                    }
                                                    echo $datasat1['id_kabkot'];
                                                    ?>
                                            </select></label>
                                        <label for="Kecamatan">Kecamatan<select class="form-control" id="kecamatan" name="kecamatan" required value="<?= $row['kecamatan']; ?>"></select></label>

                                    </div>
                                    <div class="single-contact-form space-between">
                                        <label>alamat <span>:</span><input class="input__box" name="alamat" id="alamat" required value="<?= $row['alamat']; ?>"></label>
                                        <label>kode pos <span>:</span><input class="input__box" name="kodepos" id="kodepos" required value="<?= $row['kodepos']; ?>"><small class="kodepos" style="color: red;"></small></label>
                                    </div>
                                    <div class="space-between">
                                        <input type="file" id="gambar" name="gambar">
                                    </div>
                                </div>
                                <div class="form__btn">
                                    <button name="submit" type="submit" id="submit">edit profil</button>
                                    <button>kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        // Validasi Nama Lengkap
        $('#nama_user').on('keyup', function() {
            var regex = /^[a-z A-Z]+$/;
            if (regex.test(this.value) !== true) {
                this.value = this.value.replace(/[^a-zA-Z]+/, '');
            } else if ($(this).val().length < 5) {
                $('.nama_user').text('Anda Yakin Nama Anda Terdiri Dari ' + $(this).val().length + ' Huruf?');
            } else {
                $('.nama_user').text('');
            }
            if ($(this).val().length == 0) {
                $('.nama_user').text('Nama Harus Di isi!');
            }
        });


        // validasi email
        $('#email').on('keyup', function() {
            var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!this.value.match(valid)) {
                $('.email').text('Isi Email dengan Benar!');
            } else {
                $('.email').text('');
            }
        });


        // validasi nohp
        $('#nohp_user').on('keyup', function() {
            var regex = /^[0-9]+$/;
            if (regex.test(this.value) !== true) {
                this.value = this.value.replace(/[^0-9]+/, '');
            } else {
                $('.nohp_user').text('');
            }

            if ($(this).val().length < 12) {
                $('.nohp_user').text('maksimal 12 angka!');
            } else {
                $('.nohp_user').text('');
            }

        });


        // validasi kode pos
        $('#kodepos').on('keyup', function() {
            var regex = /^[0-9]+$/;
            if (regex.test(this.value) !== true) {
                this.value = this.value.replace(/[^0-9]+/, '');
            } else {
                $('.kodepos').text('');
            }

            if ($(this).val().length < 5) {
                $('.kodepos').text('minimal 5 angka!');
            } else {
                $('.kodepos').text('');
            }

        });


        // Validasi Nama Lengkap
        $('#jenis_kelamin').on('keyup', function() {
            var regex = /^[L  P l  p]+$/;
            if (regex.test(this.value) !== true) {
                this.value = this.value.replace(/[^L P]+/, '');
            } else {
                $('.jenis_kelamin').text('');
            }
            if ($(this).val().length == 0) {
                $('.jenis_kelamin').text('laki laki (L) atau perempuan (P)!');
            }
        });


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
