<?php
require 'function.php';
$produk = query('SELECT * FROM produk order by rand()');

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Printonline</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery1.min.js"></script>
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>
		$(document).ready(function() {
			$(".megamenu").megamenu();
		});
	</script>
	<!--start slider -->
	<link rel="stylesheet" href="css/fwslider.css" media="all">
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/css3-mediaqueries.js"></script>
	<script src="js/fwslider.js"></script>
	<!--end slider -->
	<script src="js/jquery.easydropdown.js"></script>
</head>

<body>
	<div class="header-top">
		<div class="wrap">
			<div class="header-top-left">
				<div class="box">
					<select tabindex="4" class="dropdown">
						<option value="" class="label" value="">Bahasa :</option>
						<option value="1">English</option>
						<option value="2">Indonesia</option>
					</select>
				</div>
				<div class="box1">
					<select tabindex="4" class="dropdown">
						<option value="" class="label" value="">Currency :</option>
						<option value="1">$ Dollar</option>
						<option value="2">Rupiah</option>
					</select>
				</div>
				<div class="clear"></div>
			</div>
			<div class="cssmenu">
				<ul>
					<li class="active"><a href="login.html">Account</a></li> |
					<li><a href="login.php">Log In</a></li> |
					<li><a href="register.php">Sign Up</a></li>
					<li><a href="login.html">Log In</a></li> |
					<li><a href="register.html">Sign Up</a></li>

				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.html"><img src="images/king.jpg" alt="" /></a>
				</div>
				<div class="menu">
					<ul class="megamenu skyblue"></ul>
				</div>
			</div>
			<div class="header-bottom-right">
				<div class="search">
					<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="Subscribe" id="submit" name="submit">
					<div id="response"> </div>
				</div>
				<div class="tag-list">
					<ul class="icon1 sub-icon1 profile_img">
						<li><a class="active-icon c1" href="#"> </a>
							<ul class="sub-icon1 list">
								<li>
									<h3>...</h3><a href=""></a>
								</li>
								<li>
									<p>Lorem ipsum dolor sit amet <a href="">Lorem ipsum dolor sit amet </a></p>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="icon1 sub-icon1 profile_img">
						<li><a class="active-icon c2" href="#"> </a>
							<ul class="sub-icon1 list">
								<li>
									<h3>...</h3><a href=""></a>
								</li>
								<li>
									<p>Lorem ipsum dolor sit amet <a href="">Lorem ipsum dolor sit amet</a></p>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="last">
						<li><a href="#">Cart(0)</a></li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- start slider -->
	<div id="fwslider">
		<div class="slider_container">
			<div class="slide">
				<!-- Slide image -->
				<img src="images/banner.jpg" alt="" />
				<!-- /Slide image -->
				<!-- Texts container -->
				<div class="slide_content">
					<div class="slide_content_wrap">
						<!-- Text title -->
						<h4 class="title">Selamat Datang di</h4>
						<!-- /Text title -->

						<!-- Text description -->
						<p class="description">Printonline</p>
						<!-- /Text description -->
					</div>
				</div>
				<!-- /Texts container -->
			</div>
			<!-- /Duplicate to create more slides -->
			<div class="slide">
				<img src="images/banner1.jpg" alt="" />
				<div class="slide_content">
					<div class="slide_content_wrap">
						<h4 class="title">Ayo print di</h4>
						<p class="description">Sobat Erman</p>
					</div>
				</div>
			</div>
			<!--/slide -->
		</div>
		<div class="timers"></div>
		<div class="slidePrev"><span></span></div>
		<div class="slideNext"><span></span></div>
	</div>
	<!--/slider -->
	<div class="main">
		<div class="wrap">
			<div class="section group">
				<div class="cont span_2_of_3">
					<h2 class="head">Featured Products</h2>
					<?php foreach ($produk as $row) : ?>
						<div class="top-box">
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
									<div class="inner_content clearfix">
										<div class="product_image">
											<img src="img/<?= $row['gambar']; ?>" alt="" />
										</div>
										<div class="price">
											<div class="cart-left">
												<p class="title">
													<?php
														echo $row['jenis_produk'];
														?>
												</p>
												<div class="price1">
													<span class="actual">Rp 12.000.00</span>
												</div>
											</div>
											<div class="cart-right"> </div>
											<div class="clear"></div>
										</div>
									</div>
								</a>
							</div>
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
									<div class="inner_content clearfix">
										<div class="product_image">
											<img src="images/produk/idcard.jpg" alt="" />
										</div>
										<div class="price">
											<div class="cart-left">
												<p class="title">
													<?php
														echo $row['jenis_produk'];
														?>
												</p>
												<div class="price1">
													<span class="actual">Rp 12.000.00</span>
												</div>
											</div>
											<div class="cart-right"> </div>
											<div class="clear"></div>
										</div>
									</div>
								</a>
							</div>
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
									<div class="inner_content clearfix">
										<div class="product_image">
											<img src="images/produk/idcard.jpg" alt="" />
										</div>
										<div class="price">
											<div class="cart-left">
												<p class="title">
													<?php
														$row = mysqli_fetch_array($produk);
														echo $row['jenis_produk'];
														?>
												</p>
												<div class="price1">
													<span class="actual">Rp 12.000.00</span>
												</div>
											</div>
											<div class="cart-right"> </div>
											<div class="clear"></div>
										</div>
									</div>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					<?php endforeach; ?>
					<div class="top-box">
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">
												<?php
												$row = mysqli_fetch_array($produk);
												echo $row['jenis_produk'];
												?>
											</p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title"><? echo $row['jenis_produk']; ?></p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">Lorem Ipsum simply</p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="top-box1">
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">Lorem Ipsum simply</p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">Lorem Ipsum simply</p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="col_1_of_3 span_1_of_3">
							<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="images/produk/idcard.jpg" alt="" />
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">Lorem Ipsum simply</p>
											<div class="price1">
												<span class="actual">Rp 12.000.00</span>
											</div>
										</div>
										<div class="cart-right"> </div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="rsidebar span_1_of_left">
					<div class="top-border"> </div>
					<div class="border">
						<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
						<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
						<script src="js/jquery.nivo.slider.js"></script>
						<script type="text/javascript">
							$(window).load(function() {
								$('#slider').nivoSlider();
							});
						</script>
						<div class="slider-wrapper theme-default">
							<div id="slider" class="nivoSlider">
								<img src="images/t-img1.jpg" alt="" />
								<img src="images/t-img2.jpg" alt="" />
								<img src="images/t-img3.jpg" alt="" />
							</div>
						</div>
						<div class="btn"><a href="single.html">Check it Out</a></div>
					</div>
					<div class="top-border"> </div>
					<div class="sidebar-bottom">
						<h2 class="m_1">Newsletters<br> Signup</h2>
						<p class="m_text">Lorem ipsum dolor sit amet, consectetuer</p>
						<div class="subscribe">
							<form>
								<input name="userName" type="text" class="textbox">
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footer-top">
			<div class="wrap">
				<div class="section group example">
					<div class="col_1_of_2 span_1_of_2">
						<ul class="f-list">
							<li><img src="images/2.png"><span class="f-text">Menyediakan jasa kirim</span>
								<div class="clear"></div>
							</li>
						</ul>
					</div>
					<div class="col_1_of_2 span_1_of_2">
						<ul class="f-list">
							<li><img src="images/3.png"><span class="f-text">Call us! toll free-0831-6307-1145 </span>
								<div class="clear"></div>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="footer-middle">
			<div class="wrap">
				<!-- <div class="section group">
			  	<div class="f_10">
					<div class="col_1_of_4 span_1_of_4">
						<h3>Facebook</h3>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="like_box">	
							<div class="fb-like-box" data-href="http://www.facebook.com/w3layouts" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
						</div>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h3>From Twitter</h3>
						<div class="recent-tweet">
							<div class="recent-tweet-icon">
								<span> </span>
							</div>
							<div class="recent-tweet-info">
								<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="recent-tweet">
							<div class="recent-tweet-icon">
								<span> </span>
							</div>
							<div class="recent-tweet-info">
								<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
				</div>
				<div class="f_10">
					<div class="col_1_of_4 span_1_of_4">
					    <h3>Information</h3>
						<ul class="f-list1">
						    <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
				             <li><a href="#">Duis autem vel eum iriure </a></li>
				            <li><a href="#">anteposuerit litterarum formas </a></li>
				            <li><a href="#">Tduis dolore te feugait nulla</a></li>
			         	</ul>
					</div>
					<div class="col_1_of_4 span_1_of_4">
						<h3>Contact us</h3>
						<div class="company_address">
					                <p>500 Lorem Ipsum Dolor Sit,</p>
							   		<p>22-56-2-9 Sit Amet, Lorem,</p>
							   		<p>USA</p>
					   		<p>Phone:(00) 222 666 444</p>
					   		<p>Fax: (000) 000 00 00 0</p>
					 	 	<p>Email: <span>mail[at]leoshop.com</span></p>
					   		
					   </div>
					   <div class="social-media">
						     <ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Linked in"><a href="#" target="_blank"> </a> </span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Rss"><a href="#" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="#" target="_blank"> </a></span></li>
						    </ul>
					   </div>
					</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		  </div>-->





				<div class="section group example">
					<div class="col_1_of_f_1 span_1_of_f_1">
						<div class="section group example">
							<div class="col_1_of_f_2 span_1_of_f_2">
								<h3>PRINTONLINE</h3>
								<script>
									(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s);
										js.id = id;
										js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								</script>
								<div class="like_box">
									<div class="fb-like-box" data-href="http://www.facebook.com/w3layouts" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
								</div>
							</div>
							<div class="col_1_of_f_2 span_1_of_f_2">
								<h3>From Twitter</h3>
								<div class="recent-tweet">
									<div class="recent-tweet-icon">
										<span> </span>
									</div>
									<div class="recent-tweet-info">
										<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="recent-tweet">
									<div class="recent-tweet-icon">
										<span> </span>
									</div>
									<div class="recent-tweet-info">
										<p>Ds which don't look even slightly believable. If you are <a href="#">going to use nibh euismod</a> tincidunt ut laoreet adipisicing</p>
									</div>
									<div class="clear"> </div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="col_1_of_f_1 span_1_of_f_1">
						<div class="section group example">
							<div class="col_1_of_f_2 span_1_of_f_2">
								<h3>Information</h3>
								<ul class="f-list1">
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Lorem ipsum dolor sit amet</a></li>
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Lorem ipsum dolor sit amet</a></li>
								</ul>
							</div>
							<div class="col_1_of_f_2 span_1_of_f_2">
								<h3>Contact us</h3>
								<div class="company_address">
									<p>500 Lorem Ipsum Dolor Sit,</p>
									<p>22-56-2-9 Sit Amet, Lorem,</p>
									<p>USA</p>
									<p>Phone:(+62) 8316 3071 145</p>
									<p>Fax: (000) 000 00 00 0</p>
									<p>Email: <span>Printonline.com</span></p>

								</div>
								<div class="social-media">
									<ul>
										<li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google"><a href="#" target="_blank"> </a></span></li>
										<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Linked in"><a href="#" target="_blank"> </a> </span></li>
										<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Rss"><a href="#" target="_blank"> </a></span></li>
										<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="#" target="_blank"> </a></span></li>
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copy">
					<p>©printonline</p>
				</div>
				<div class="f-list2">
					<ul>
						<li class="active"><a href="about.html">About Us</a></li> |
						<li><a href="delivery.html">Delivery & Returns</a></li> |
						<li><a href="delivery.html">Terms & Conditions</a></li> |
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>

</html>