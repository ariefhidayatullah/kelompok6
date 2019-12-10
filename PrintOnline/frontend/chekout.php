<?php
session_start();
include 'include/_header.php';
require 'function.php';

if (!isset($_SESSION["LOGIN"])) {
    echo "<script> alert ('keranjang kosong, silahkan belanja dahulu') ; </script>";
    echo "<script>location='login.php'; </script>";
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
                        <h2 class="bradcaump-title">chekout</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">chekout</span>
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
                                            <th>bahan</th>
                                            <th>Harga</th>
                                            <th>jumlah</th>
                                            <th>subharga</th>
                                            <th>Pilihan</th>
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
                                                $subharga = $pecah["harga"] * $jumlah;
                                                ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $pecah["jenis_produk"]; ?></td>
                                                <td><?= $pecah["jenis_bahan"]; ?></td>
                                                <td>Rp. <?= number_format($pecah["harga"]); ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td><?= number_format($subharga); ?></td>
                                                <td>
                                                    <a href="hapuskeranjang.php?id=<?= $id_produk ?> " class="btn btn-primary" onclick="return confirm('yakin menghapus produk dari keranjang ? ');">hapus</a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                            <?php $totalbelanja += $subharga; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6">total belanja</th>
                                            <th>Rp. <?= number_format($totalbelanja) ?> </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <form action="" method="POST">
                                    <div class="row contact-form-wrap">
                                        <div class="col-md-4">
                                            <input type="hidden" id="id_pesan" name="id_pesan" required value="" readonly>
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
                                                $queryy = "SELECT kabkot.id_kabkot, kabkot.nama_kabkot, kabkot.jne_reg FROM user left join kabkot on user.kabupaten = kabkot.id_kabkot WHERE id_user = '$id_userrr'";
                                                $result1 = mysqli_query($conn, $queryy);
                                                $row1 = mysqli_fetch_array($result1);
                                                var_dump($row1);
                                                ?>
                                                <input type="hidden" readonly value="<?= $row1['id_kabkot'] ?>" class="input__box" name="id_ongkir" id="id_ongkir">
                                                <input type="text" readonly value="<?= $row1['nama_kabkot'] ?>" class="input__box">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="chekout">chekout</button>
                                </form>
                                <?php
                                if (isset($_POST['chekout'])) {
                                    $id_pesan = $_POST['id_pesan'];
                                    $id_pelanggan = $_SESSION['LOGIN']['id_user'];
                                    $nama_user = $_SESSION['LOGIN']['nama_user'];
                                    $email = $_SESSION['LOGIN']['email'];
                                    $nohp_user = $_SESSION['LOGIN']['nohp_user'];
                                    $id_kabkot = $_POST['id_ongkir'];
                                    $tanggal_pembelian = date("Y-m-d");

                                    $ambil = $conn->query("SELECT * FROM kabkot WHERE id_kabkot ='$id_kabkot'");
                                    $arrayongkir = $ambil->fetch_assoc();
                                    $tarif = $arrayongkir['jne_reg'];

                                    $total_pembelian = $totalbelanja + $tarif;

                                    # 1. simpan data ke tabel pembelian
                                    $query = "INSERT INTO pesan VALUES ('$id_pesan','$id_pelanggan','$nama_user','$email','$nohp_user','$id_kabkot','$tanggal_pembelian', '$total_pembelian' )";

                                    mysqli_query($conn, $query);

                                    $id_pesan_barusan = $conn->insert_id;

                                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                                        $value = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $row2 = $value->fetch_assoc();

                                        $jenis_produk = $row2["jenis_produk"];
                                        $jenis_bahan = $row2["jenis_bahan"];
                                        $ukuran = $row2["ukuran"];

                                        $conn->query("INSERT INTO `detail_pemesanan`(`id_pesan`, `id_produk`, `jenis_produk`, `nama_bahan`, `ukuran`, `qty`, `harga_satuan`) VALUES ('$id_pesan_barusan','$id_produk','$jenis_produk','$jenis_bahan','$ukuran','$jumlah','$subharga' )");
                                    }

                                    #kosongkan keranjang belanja
                                    unset($_SESSION['keranjang']);

                                    #tampilan dialihkan ke nota, nota pembelian baru terjadi
                                    echo "<script>alert('Pembelian Berhasil !');</script>";
                                    echo "<script>location='nota.php?id=$id_pesan_barusan';</script>";
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