<?php
require 'function.php';

$id_produk = $_GET['id'];

$bahan = query('SELECT * FROM produk order by rand()');
$mhs = query("SELECT * FROM produk WHERE id_produk = '$id_produk'");

include 'include/_header.php';
include 'include/navbar.php';
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
						<h2 class="bradcaump-title">Shop Single</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="dashboard.php">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Shop Single</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Bradcaump area -->
	<!-- Start main Content -->
	<div class="maincontent bg--white pt--80 pb--55">
		<?php foreach ($mhs as $row) : ?>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="wn__single__product">
							<div class="row">
								<div class="col-lg-6 col-6">
									<div class="wn__fotorama__wrapper">
										<div class="fotorama wn__fotorama__action" data-nav="thumbs">
											<a href="1.jpg"><img src="img/<?= $row['gambar']; ?>" alt=""></a>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-6">
									<div class="product__info__main">
										<h1><?= $row['jenis_produk']; ?></h1>
										<a href="">Harga Satuan : Rp.
											<?php
												$han = $_POST['han'];
												?>
											<?php
												if (isset($_POST['han'])) {
													$bahan1 = mysqli_query($conn, "SELECT * FROM bahan where nama_bahan = '$han'");
													$row1 = mysqli_fetch_array($bahan1);
													echo $row1['harga_satuan'];
												}
												?>
										</a>
										<div class="product__overview">
											<?php
												$sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
												$ba = mysqli_query($conn, $sql);
												$ro = mysqli_fetch_array($ba);
												echo "Kenapa harus mencetak " . $ro['jenis_produk'] . "?";
												?>
											<br>
											<?php
												echo $ro['deskripsi'];
												?>
											</p>
										</div>
										<?php
											$bahan = mysqli_query($conn, "SELECT * FROM bahan where id_produk = '$id_produk'");
											$row = mysqli_fetch_array($bahan);
											?>
										<br>
										<form action="" method="post">
											<h4><select name="han" class="drop"><a href="">Bahan</a>
													<ul>
														<?php foreach ($bahan as $p) : ?>
															<li>
																<option><?= $p['nama_bahan']; ?></option>
															</li>
														<?php endforeach ?>
													</ul>
												</select>
												<button class="btn btn-danger" type="submit" value="han">Cari Harga</button><br>
										</form>
										</h4><br>
										<br>
										<div>
											<form action="cart.php" method="get">
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<button type="submit" class="btn btn-info" name="cart" value="cart">Add to
													Cart
												</button>
											</form>

											<form action="checkout.php" method="get">
												<input type="text" name="id_bahan" value="<?php echo $han ?>" hidden>
												<input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
												<button type="submit" class="btn btn-success" value="checkout">Checkout Sekarang
												</button>
											</form>
											<br>
											</form>
											<div class="product-share">
												<ul>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			<?php endforeach; ?>
			</div>

			<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
				<div class="footer-static-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="footer__widget footer__menu">
									<div class="ft__logo">
										<a href="index.html">
											<img src="images/logo/3.png" alt="logo">
										</a>
										<p>There are many variations of passages of Lorem Ipsum available, but the majority
											have suffered duskam alteration variations of passages</p>
									</div>
									<div class="footer__content">
										<ul class="social__net social__net--2 d-flex justify-content-center">
											<li><a href="#"><i class="bi bi-facebook"></i></a></li>
											<li><a href="#"><i class="bi bi-google"></i></a></li>
											<li><a href="#"><i class="bi bi-twitter"></i></a></li>
											<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
											<li><a href="#"><i class="bi bi-youtube"></i></a></li>
										</ul>
										<ul class="mainmenu d-flex justify-content-center">
											<li><a href="index.html">Trending</a></li>
											<li><a href="index.html">Best Seller</a></li>
											<li><a href="index.html">All Product</a></li>
											<li><a href="index.html">Wishlist</a></li>
											<li><a href="index.html">Blog</a></li>
											<li><a href="index.html">Contact</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright__wrapper">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="copyright">
									<div class="copy__right__inner text-left">
										<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights
											Reserved</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="payment text-right">
									<img src="images/icons/payment.png" alt="" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- //Footer Area -->
			<!-- QUICKVIEW PRODUCT -->
			<div id="quickview-wrapper">
				<!-- Modal -->
				<div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
					<div class="modal-dialog modal__container" role="document">
						<div class="modal-content">
							<div class="modal-header modal__header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="modal-product">
									<!-- Start product images -->
									<div class="product-images">
										<div class="main-image images">
											<img alt="big images" src="images/product/big-img/1.jpg">
										</div>
									</div>
									<!-- end product images -->
									<div class="product-info">
										<h1>Simple Fabric Bags</h1>
										<div class="rating__and__review">
											<ul class="rating">
												<li><span class="ti-star"></span></li>
												<li><span class="ti-star"></span></li>
												<li><span class="ti-star"></span></li>
												<li><span class="ti-star"></span></li>
												<li><span class="ti-star"></span></li>
											</ul>
											<div class="review">
												<a href="#">4 customer reviews</a>
											</div>
										</div>
										<div class="price-box-3">
											<div class="s-price-box">
												<span class="new-price">$17.20</span>
												<span class="old-price">$45.00</span>
											</div>
										</div>
										<div class="quick-desc">
											Designed for simplicity and made from high quality materials. Its sleek geometry
											and material combinations creates a modern look.
										</div>
										<div class="select__color">
											<h2>Select color</h2>
											<ul class="color__list">
												<li class="red"><a title="Red" href="#">Red</a></li>
												<li class="gold"><a title="Gold" href="#">Gold</a></li>
												<li class="orange"><a title="Orange" href="#">Orange</a></li>
												<li class="orange"><a title="Orange" href="#">Orange</a></li>
											</ul>
										</div>
										<div class="select__size">
											<h2>Select size</h2>
											<ul class="color__list">
												<li class="l__size"><a title="L" href="#">L</a></li>
												<li class="m__size"><a title="M" href="#">M</a></li>
												<li class="s__size"><a title="S" href="#">S</a></li>
												<li class="xl__size"><a title="XL" href="#">XL</a></li>
												<li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
											</ul>
										</div>
										<div class="social-sharing">
											<div class="widget widget_socialsharing_widget">
												<h3 class="widget-title-modal">Share this product</h3>
												<ul class="social__net social__net--2 d-flex justify-content-start">
													<li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
													<li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
													<li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
													<li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="addtocart-btn">
											<a href="#">Add to cart</a>
										</div>
									</div><!-- .product-info -->
								</div><!-- .modal-product -->
							</div><!-- .modal-body -->
						</div><!-- .modal-content -->
					</div><!-- .modal-dialog -->
				</div>
				<!-- END Modal -->
			</div>
			<!-- END QUICKVIEW PRODUCT -->

	</div>
	<!-- //Main wrapper -->



	<?php
	include 'include/_footer.php';
	?>