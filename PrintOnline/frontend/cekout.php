<?php
session_start();
require 'function.php';
include 'include/_header.php';


if (!isset($_SESSION["LOGIN"])) {
    echo "<script> alert ('silahkan login terlebih dahulu') ; </script>";
    echo "<script>location='login.php'; </script>";
}
$email = $_SESSION["LOGIN"];
$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE email = '$email'");
$user = query("SELECT * FROM user WHERE email = '$email'");

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
    <!-- End Bradcaump area -->
    <!-- Start main Content -->
    <section class="wn__checkout__area section-padding--lg bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wn_checkout_wrap">
                        <div class="checkout_info">
                            <span>Returning customer ?</span>
                            <a class="showlogin" href="#">Click here to login</a>
                        </div>
                        <div class="checkout_login">
                            <form class="wn__checkout__form" action="#">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>

                                <div class="input__box">
                                    <label>Username or email <span>*</span></label>
                                    <input type="text">
                                </div>

                                <div class="input__box">
                                    <label>password <span>*</span></label>
                                    <input type="password">
                                </div>
                                <div class="form__btn">
                                    <button>Login</button>
                                    <label class="label-for-checkbox">
                                        <input id="rememberme" name="rememberme" value="forever" type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                        <div class="checkout_info">
                            <span>Have a coupon? </span>
                            <a class="showcoupon" href="#">Click here to enter your code</a>
                        </div>
                        <div class="checkout_coupon">
                            <form action="#">
                                <div class="form__coupon">
                                    <input type="text" placeholder="Coupon code">
                                    <button>Apply coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <?php foreach ($user as $row) : ?>
                        <div class="customer_details">
                            <h3>Billing details</h3>
                            <div class="customar__field">
                                <div class="input_box">
                                    <label>Nama <span>*</span></label>
                                    <input type="text" name="nama_user" id="nama_user" required value="<?= $row['nama_user']; ?>">
                                </div>
                                <div class="input_box">
                                    <label>No Hp <span>*</span></label>
                                    <input type="text" name="nohp_user" id="nohp_user" required value="<?= $row['nohp_user']; ?>">
                                </div>
                                <div class="input_box">
                                    <label>Provinsi<span>*</span></label>
                                    <select name="provinsi" id="provinsi" class="select__option" required></select>
                                </div>
                                <div class="input_box">
                                    <label>Kabupaten<span>*</span></label>
                                    <select class="select__option" id="kabupaten" name="kabupaten" required></select>
                                </div>
                                <div class="input_box">
                                    <label>kecamatan<span>*</span></label>
                                    <select class="select__option" id="kecamatan" name="kecamatan" required></select>
                                </div>
                                <div class="input_box">
                                    <label>Alamat <span>*</span></label>
                                    <input type="text" name="alamat" id="alamat" required value="<?= $row['alamat']; ?>">
                                </div>
                                <div class="input_box">
                                    <label>Kode pos <span>*</span></label>
                                    <input type="text" name="kodepos" id="kodepos" required value="<?= $row['kodepos']; ?>">
                                </div>
                            </div>
                            <div class="create__account">
                                <div class="wn__accountbox">
                                    <input class="input-checkbox" name="createaccount" value="1" type="checkbox">
                                    <span>Create an account ?</span>
                                </div>
                                <div class="account__field">
                                    <form action="#">
                                        <label>Account password <span>*</span></label>
                                        <input type="text" placeholder="password">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="cart-main-area section-padding--lg bg--white">
                        <div class="container">
                            <div class="row">
                                <div class="table-content wnro__table table-responsive">
                                    <div class="wn__order__box">
                                        <h3 class="onder__title">Your order</h3>

                                        <table>
                                            <thead>
                                                <tr class="title-top">
                                                    <th>produk</th>
                                                    <th>bahan</th>
                                                    <th>Harga</th>
                                                    <th>jumlah</th>
                                                    <th>total harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $nomor = 1;
                                                $total = 0; ?>
                                                <?php
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_cart = $data['id_cart'];
                                                    $id_produk = $data['id_produk'];
                                                    $nama_bahan = $data['nama_bahan'];
                                                    $harga_satuan = $data['harga_satuan'];
                                                    $qty = $data['qty'];
                                                    $gambar = $data['gambar'];

                                                    $quer = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                                    $b = mysqli_fetch_array($quer);
                                                ?>
                                                    <tr>
                                                        <td class="product-name"><a href=""><?= $b['jenis_produk']; ?></a></td>
                                                        <td class="product-name"><a href=""><?= $nama_bahan; ?></a></td>
                                                        <td class="product-price"><span class="amount">Rp. <?= $harga_satuan ?></span></td>
                                                        <td class="product-quantity">
                                                            <input type="text" name="id_cart" value="<?= $id_cart; ?>" hidden>
                                                            <input type="number" min="1" max="100" name="qty" placeholder="<?= $qty; ?>" readonly>

                                                        </td>
                                                        <td><?php $subtotal = $harga_satuan * $qty; ?>
                                                            <?= $subtotal; ?></td>
                                                    </tr>
                                                    <?php $nomor++; ?>
                                                    <?php
                                                    $total = $total + $subtotal;
                                                    ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <ul class="shipping__method">
                                            <li>Cart Subtotal <span>Rp. <?= $total; ?></span></li>
                                            <li>ongkos kirim
                                                <ul>
                                                    <li>
                                                        <input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" checked="checked" type="radio">
                                                        <label>Flat Rate: $48.00</label>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="total__amount">
                                            <li>Order Total <span>$223.00</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                            <div class="payment">
                                <div class="che__header" role="tab" id="headingOne">
                                    <a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Direct Bank Transfer</span>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="headingTwo">
                                    <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Cheque Payment</span>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="payment-body">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="headingThree">
                                    <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Cash on Delivery</span>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="payment-body">Pay with cash upon delivery.</div>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="che__header" role="tab" id="headingFour">
                                    <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>PayPal <img src="images/icons/payment.png" alt="payment images"> </span>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="payment-body">Pay with cash upon delivery.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
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