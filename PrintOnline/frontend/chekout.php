<?php
session_start();
include 'include/_header.php';
require 'function.php';

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script> alert ('keranjang kosong, silahkan belanja dahulu') ; </script>";
    echo "<script>location='daftarproduk.php'; </script>";
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
                        <h2 class="bradcaump-title">Keranjang Belanja</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Keranjang Belanja</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wn_contact_area section-padding--lg bg--white">
        <div class="container">
            <!-- cart-main-area end -->
            <!-- Footer Area -->
            <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
                <div class="footer-static-top">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>produk</th>
                                            <th>Harga</th>
                                            <th>jumlah</th>
                                            <th>subharga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $totalbelanja = 0; ?>
                                        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                            <?php
                                                $ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                                $pecah = $ambil->fetch_assoc();
                                                ?>
                                            <?php
                                                $kab = mysqli_query($conn, "SELECT * FROM bahan WHERE id_produk = '$id_produk'");
                                                $kot = $kab->fetch_assoc();
                                                $subharga = $kot["harga_satuan"] * $jumlah;
                                                ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $pecah["jenis_produk"]; ?></td>
                                                <td>Rp. <?= number_format($kot["harga_satuan"]); ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td><?= number_format($subharga); ?></td>
                                            </tr>
                                            <?php $nomor++; ?>
                                            <?php $totalbelanja += $subharga; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">total belanja</th>
                                            <th>Rp. <?= number_format($totalbelanja) ?> </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <form action="" method="POST">
                                    <div class="row contact-form-wrap">
                                        <div class="col-md-4">
                                            <div class=" single-contact-form">
                                                <input type="text" readonly value="<?= $_SESSION["LOGIN"]["nama_user"] ?>" class="input__box">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class=" single-contact-form">
                                                <input type="text" readonly value="<?= $_SESSION["LOGIN"]["nohp_user"] ?>" class="input__box">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class=" single-contact-form">
                                                <?php
                                                $id_userrr = $_SESSION["LOGIN"]["id_user"];
                                                $queryy = "SELECT kabkot.id_kabkot, kabkot.jne_reg FROM user left join kabkot on user.kabupaten = kabkot.id_kabkot WHERE id_user = '$id_userrr'";
                                                $result1 = mysqli_query($conn, $queryy);
                                                $row1 = mysqli_fetch_array($result1);
                                                ?>
                                                <input type="text" readonly value="<?= $row1['jne_reg'] ?>" class="input__box" name="id_ongkir" id="id_ongkir">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="chekout">chekout</button>
                                </form>
                                <?php
                                if (isset($_POST["chekout"])) {
                                    $id_userr = $_SESSION["LOGIN"]["id_user"];
                                    $nama_userr = $_SESSION["LOGIN"]["nama_user"];
                                    $id_ongkir = $_POST["id_ongkir"];
                                    $tanggal_pembelian = date("y-m-d");
                                    $emaill = $_SESSION["LOGIN"]["email"];
                                    $nohp_userr = $_SESSION["LOGIN"]["nohp_user"];

                                    $ambilll = $conn->query("SELECT * FROM kabkot WHERE id_kabkot = '$id_ongkir'");
                                    $arrayongkir = $ambilll->fetch_assoc();
                                    $tarif = $arrayongkir['jne_reg'];

                                    $total_pembelian = $totalbelanja + $tarif;

                                    // menyimpan ke data pemesanan 
                                    mysqli_query($conn, "INSERT INTO 'pemesanan' (id_pesan, id_user, nama_user, tgl_pesan, email, nohp_user, id_krw, total_harga, )
                                    VALUES ('', '$id_userr', '$nama_userr', '$tanggal_pembelian', '$emaill', '$nohp_userr', '', '$total_pembelian', '')");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>


<?php
include 'include/_footer.php';
?>