<?php
session_start();
include 'include/_header.php';
require 'function.php';

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
                        <h2 class="bradcaump-title">nota</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="dashboard.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">nota</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wn_contact_area section-padding--lg bg--white">
        <?php $ambil = $conn->query("SELECT * FROM pesan JOIN user ON pesan.id_user=user.id_user WHERE pesan.id_pesan='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        $id_kabkot = $detail['nama_kabkot'];
        ?>
        <?php $value = $conn->query("SELECT * FROM kabkot WHERE id_kabkot = '$id_kabkot'");
        $row2 = $value->fetch_assoc();
        $nama_kabkot = $row2['nama_kabkot'];
        $jne_reg = $row2['jne_reg'];
        ?>
        <pre><?php print_r($detail); ?></pre>
        <div class="container">
            <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3>pembelian</h3>
                        <strong>no. pembelian : <?= $detail['id_pesan']; ?></strong><br>
                        tanggal: <?= $detail['tanggal_pemesanan']; ?> <br>
                        Total : Rp. <?= number_format($detail['total_harga']); ?>
                    </div>
                    <div class="col-md-4">
                        <h3>pelanggan</h3>
                        <strong><?= $detail['nama_user']; ?></strong>
                        <p>
                            <?= $detail['nohp_user']; ?> <br>
                            <?= $detail['email']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>pengiriman</h3>
                        <strong><?= $nama_kabkot ?></strong><br>
                        ongkos kirim : Rp. <?= number_format($row2['jne_reg']); ?>
                    </div>
                </div>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php
                                        $ambil1 = $conn->query("SELECT * FROM detail_pemesanan JOIN produk ON detail_pemesanan.id_produk=produk.id_produk WHERE detail_pemesanan.id_pesan = '$_GET[id]'");
                                        ?>
                                        <?php while ($pecah = $ambil1->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $pecah["jenis_produk"]; ?></td>
                                                <td><?= $pecah["jenis_bahan"]; ?></td>
                                                <td>Rp. <?= number_format($pecah["harga"]); ?></td>
                                                <td><?= $pecah["qty"]; ?></td>
                                                <td><?= $pecah['harga'] * $pecah['qty']; ?></td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-7">
                            <div class="alert alert-info">
                                <p>
                                    silahkan melakukan pembayaran minimal 50% Rp . <?= number_format($detail['total_harga']); ?> ke <br>
                                    <strong>BANK MANDIRI 137-001088-3276 . Mohammad Arief Hidayatullah</strong>
                                </p>
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