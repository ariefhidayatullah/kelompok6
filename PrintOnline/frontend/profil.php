<?php
session_start();
require 'function.php';
include 'include/_header.php';
$id_user = $_SESSION["LOGIN"];

$bahan = query("SELECT * FROM user WHERE id_user = '$id_user'");
?>


<!-- Main wrapper -->
<div class="wrapper" id="wrapper">
	<!-- Header -->
	<?php include 'include/navbar-login.php'; ?>
	<!-- //Header -->
	<!-- Start Bradcaump area -->
	<div class="ht__bradcaump__area bg-image--4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bradcaump__inner text-center">
						<h2 class="bradcaump-title">Profil</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="dashboard.php">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Profil</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<?php foreach ($bahan as $row) : ?>
			<div class="col-12">
				<div class="card">

					<div class="card-body">
						<div class="card-title mb-4">
							<div class="d-flex justify-content-start">
								<div class="image-container">
									<img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
									<div class="middle">
										<input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
										<input type="file" style="display: none;" id="profilePicture" name="file" />
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
									</li>
								</ul>
								<div class="tab-content ml-1" id="myTabContent">
									<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">Username</label>
											</div>
											<div class="col-md-8 col-6"><input type="" name="" placeholder="<?= $row['nama_user']; ?>">	
											</div>
										</div>
										<hr />

										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">email</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['email']; ?>
											</div>
										</div>
										<hr />


										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">password</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['password']; ?>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">jenis kelamin</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['jenis_kelamin']; ?>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">no hp</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['nohp_user']; ?>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">alamat</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['alamat']; ?>
											</div>
										</div>
										<hr />
										<div class="row">
											<div class="col-sm-3 col-md-2 col-5">
												<label style="font-weight:bold;">kode pos</label>
											</div>
											<div class="col-md-8 col-6">
												<?= $row['kodepos']; ?>
											</div>
										</div>
										<hr />

									</div>
									<div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
										Facebook, Google, Twitter Account that are connected to this account
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
			</div>
		<?php endforeach; ?>
	</div>


</div>


<?php
include 'include/_footer.php';
?>