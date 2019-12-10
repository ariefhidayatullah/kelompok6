<?php
session_start();
require 'function.php';
include 'include/_header.php';

$produk = query('SELECT * FROM produk order by rand()');

?>
<!DOCTYPE html>
<html>
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
                        <h2 class="bradcaump-title">Upload Design</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Upload Design</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <head>
        <title>The King | Upload Design</title>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <form>

        <body>
            <div class="container col-md-5 mb-3">
                <div class="head">
                    <br><br>
                </div>
                <div class="kata col-md-4 mb-3">
                    <p>Desain Anda</p>
                </div>
                <div class="image col-md-4 mb-3">
                    <img src="no-image.png" id="gambar">
                </div>
                <p>Klik tombol pilih file untuk memilih file dari komputer anda.</p>
                <div class="tombol">
                    <input type="file" name="files" id="file" style="display: none;">
                    <button id="pilih" class="btn-primary btn-lg">Pilih File</button>
                    <button class="btn-success btn-lg">Upload Desain</button>
                </div>
            </div>
    </form>
    <script type="text/javascript">
        var tm_pilih = document.getElementById('pilih');
        var file = document.getElementById('file');
        tm_pilih.addEventListener('click', function() {
            file.click();
        })
        file.addEventListener('change', function() {
            gambar(this);
        })

        function gambar(a) {
            if (a.files && a.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('gambar').src = e.target.result;
                }
                reader.readAsDataURL(a.files[0]);
            }

        }
    </script>
    </body>

</html>

<?php
include 'include/_footer.php';
?>