<?php
session_start();
require 'function.php';
include 'include/_header.php';

$idpesan = $_GET["id"];

$ambil = $conn->query("SELECT * FROM pembayaran LEFT JOIN pesan ON pembayaran.id_pesan=pesan.id_pesan WHERE pesan.id_pesan = '$idpesan'");
$detailbayar = $ambil->fetch_assoc();

$email = $_SESSION["LOGIN"];
$ong = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
$ongk = mysqli_fetch_array($ong);
$id_user = $ongk["id_user"];


if (empty($detailbayar)) {
    echo "<script>alert(' belum ada data pembayaran !');</script>";
    echo "<script>location='riwayatpemesanan.php';</script>";
    exit();
}


if ($id_user !== $detailbayar["id_user"]) {

    echo "<script>alert(' anda tidak berhak !');</script>";
    echo "<script>location='riwayatpemesanan.php';</script>";
    exit();
}

?>
<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
    <?php include 'include/navbar.php'; ?>
    <!-- //Header -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">pembayaran</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">lihat pembayaran</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h3>lihat pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table>
                    <tr>
                        <th>Nama</th>
                        <td><?= $detailbayar["nama"] ?></td>
                    </tr>
                    <tr>
                        <th>bank</th>
                        <td><?= $detailbayar["bank"] ?></td>
                    </tr>
                    <tr>
                        <th>tanggal</th>
                        <td><?= $detailbayar["tanggal"] ?></td>
                    </tr>
                    <tr>
                        <th>jumlah</th>
                        <td>Rp. <?= $detailbayar["jumlah"]; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h3>lihat pembayaran</h3>
                <img src="bukti_pembayaran/<?= $detailbayar["bukti"] ?>" alt="" class="img-responsive">
            </div>
        </div>
    </div>

</div>


<?php
include 'include/_footer.php';
?>