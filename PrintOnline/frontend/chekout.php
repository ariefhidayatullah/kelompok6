<?php
session_start();
include 'include/_header.php';
require 'function.php';

if (!isset($_SESSION["LOGIN"])) {
    echo "<script> alert ('silahkan login terlebih dahulu') ; </script>";
    echo "<script>location='login.php'; </script>";
}
$email = $_SESSION["LOGIN"];
$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE email = '$email'");
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
                                        <?php $nomor = 1;
                                        $total = 0; ?>
                                        <?php while ($data = mysqli_fetch_array($query)) {
                                            $id_cart = $data['id_cart'];
                                            $id_produk = $data['id_produk'];
                                            $nama_bahan = $data['nama_bahan'];
                                            $harga_satuan = $data['harga_satuan'];
                                            $qty = $data['qty'];

                                            $quer = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                            $b = mysqli_fetch_array($quer);
                                        ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $b['jenis_produk']; ?></td>
                                                <td><?= $nama_bahan; ?></td>
                                                <td><?= $harga_satuan ?></td>
                                                <td>
                                                    <form action="updatecart.php" method="get">
                                                        <input type="text" name="id_cart" value="<?= $id_cart; ?>" hidden>
                                                        <input type="number" min="1" max="100" name="qty" placeholder="<?= $qty; ?>">
                                                        <button class="btn btn-warning btn-sm" type="submit" name="sub" value="sub">OK</button>
                                                    </form>
                                                </td>
                                                <td><?php $subtotal = $harga_satuan * $qty; ?>
                                                    <?= $subtotal; ?></td>
                                                <td><a class="btn btn-danger btn-sm" href="hapuskeranjang.php?id_cart=<?= $id_cart; ?>">Hapus</a></td>
                                            </tr>
                                            <?php $nomor++; ?>
                                            <?php
                                            $total = $total + $subtotal;
                                            ?>
                                        <?php } ?>
                                        <tr>
                                            <th colspan="5" style="text-align:right">jumlah total</th>
                                            <th><?= $total; ?></th>
                                            <th><input type="button" onclick="window.print()" value="cetak"></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="" method="POST">
                                    <div class="row contact-form-wrap">
                                        <div class="col-md-4">
                                            <input type="hidden" id="id_pesan" name="id_pesan" required value="" readonly>
                                            <div class=" single-contact-form">
                                                <?php
                                                $user1 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                                                $nama = mysqli_fetch_array($user1);
                                                ?>

                                                <input type="text" readonly value="<?= $nama['nama_user']; ?>" class="input__box">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class=" single-contact-form">
                                                <input type="text" readonly value="<?= $nama['nohp_user'] ?>" class="input__box">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class=" single-contact-form">
                                                <?php
                                                $result1 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                                                $row1 = mysqli_fetch_array($result1);
                                                $id_kabkot = $row1['kabupaten'];

                                                $ong = mysqli_query($conn, "SELECT * FROM kabkot WHERE id_kabkot = '$id_kabkot'");
                                                $ongk = mysqli_fetch_array($ong);
                                                ?>
                                                <input type="hidden" readonly value="<?= $row1['id_kabkot'] ?>" class="input__box" name="id_ongkir" id="id_ongkir">
                                                <input type="text" readonly value="<?= $ongk['nama_kabkot'] ?>" class="input__box">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="chekout">chekout</button>
                                </form>
                                <?php
                                if (isset($_POST['chekout'])) {
                                    $id_pesan = $_POST['id_pesan'];
                                    $id_pelanggan = $nama['id_user'];
                                    $nama_user = $nama['nama_user'];
                                    $nohp_user = $nama['nohp_user'];
                                    $id_kabkot = $ongk['nama_kabkot'];
                                    $tanggal_pembelian = date("Y-m-d");

                                    mysqli_query($conn, "INSERT INTO pesan VALUES ('$id_pesan','$id_pelanggan','$nama_user','$email','$nohp_user','$id_kabkot','$tanggal_pembelian', '$total', 'pending' )");

                                    $id_pesan_barusan = $conn->insert_id;

                                    while ($fetch = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM keranjang WHERE email = '$email'"))) {
                                        $id_cart = $fetch['id_cart'];
                                        $id_produk = $fetch['id_produk'];
                                        $res = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $arr = mysqli_fetch_array($res);
                                        $jenis_produk = $arr['jenis_produk'];
                                        $nama_bahan = $fetch['nama_bahan'];
                                        $harga_satuan = $fetch['harga_satuan'];
                                        $qty = $fetch['qty'];

                                        $ress = mysqli_query($conn, "SELECT * FROM bahan WHERE nama_bahan = '$nama_bahan' AND id_produk = '$id_produk'");
                                        $arra = mysqli_fetch_array($ress);
                                        $id_bahan = $arra['id_bahan'];

                                        mysqli_query($conn, "INSERT INTO `detail_pemesanan`(`id_detail`, `id_pesan`, `id_produk`, `jenis_produk`, `id_bahan`, `ukuran`, `qty`, `harga_satuan`) VALUES ('','$id_pesan_barusan','$id_produk','$jenis_produk','$id_bahan','1','$qty','$harga_satuan')");

                                        mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart = '$id_cart'");                                                                       
                                        #tampilan dialihkan ke nota, nota pembelian baru terjadi
                                        echo "<script>alert('Pembelian Berhasil !');</script>";
                                        echo "<script>location='nota.php?id=$id_pesan_barusan';</script>";
                                    }
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