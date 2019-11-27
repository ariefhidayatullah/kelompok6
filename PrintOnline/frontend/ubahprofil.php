<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_GET['id'];
$bahan = query("SELECT * FROM user WHERE id_user = '$id_user'");
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

    <div class="container">
        <div class="row">
            <?php foreach ($bahan as $row) : ?>
                <div class="col-lg-12 col-12">
                    <div class="contact-form-wrap">
                        <form class="user" action="" method="POST">
                            <div class="account__form">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']; ?>">
                                <div class="single-contact-form">
                                    <label>nama <span>:</span></label>
                                </div>
                                <div class="single-contact-form space-between">
                                    <input class="input__box" name="nama_user" id="nama_user" value="<?= $row['nama_user']; ?>">
                                </div>
                                <div class="single-contact-form space-between">
                                    <label>email <span>:</span></label>
                                </div>
                                <div class="single-contact-form space-between">
                                    <input class="input__box" name="email" id="email" value="<?= $row['email']; ?>">
                                </div>
                                <div class="single-contact-form space-between">
                                    <label>username <span>:</span></label>
                                </div>
                                <div class="single-contact-form space-between">
                                    <input class="input__box" name="username" id="username" value="<?= $row['username']; ?>">
                                </div>
                                <div class="single-contact-form space-between">
                                    <label>password <span>:</span></label>
                                </div>
                                <div class="input__box">*****
                                </div>
                                <div class="single-contact-form space-between">
                                    <label>jenis kelamin <span>:</span></label>
                                </div>
                                <div class="single-contact-form space-between">
                                    <input class="input__box" name="jenis_kelamin" id="jenis_kelamin" value="<?= $row['jenis_kelamin']; ?>">
                                </div>
                                <div class="single-contact-form space-between">
                                    <label>no hp <span>:</span></label>
                                </div>
                                <div class="single-contact-form space-between">
                                    <input class="input__box" name="nohp_user" id="nohp_user" value="<?= $row['nohp_user']; ?>">
                                </div>
                            </div>
                            <div class="input__box">
                                <label>alamat <span>:</span></label>
                            </div>
                            <div class="input__box"><?= $row['alamat']; ?>
                            </div>
                            <div class="input__box">
                                <label>kode pos <span>:</span></label>
                            </div>
                            <div class="input__box"><?= $row['kodepos']; ?>
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
</div>
</div>

<?php
include 'include/_footer.php';
?>