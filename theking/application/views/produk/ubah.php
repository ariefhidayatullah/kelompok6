<div class="container text-center">
	<div class="text-center">
		<h1 class="h4 text-gray-900">Ubah Produk !</h1>
	</div>
	<div class="row">
		<div class="col-lg-6 offset-3">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control form-control-static text-center" id="id_produk" name="id_produk" value="<?= $produk['id_produk']; ?>" readonly>
				<div class="col mt-3 mb-sm-0">
					<label for="jenis_produk">Masukkan Jenis Produk : </label>
					<input type="text" class="form-control form-control-static text-center" id="jenis_produk" name="jenis_produk" value="<?= $produk['jenis_produk']; ?>">
					<?= form_error('jenis_produk', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col mt-3 mb-sm-0">
					<label for="deskripsi">Tambahkan Deskripsi : </label>
					<input type="text" class="form-control form-control-static text-center" id="deskripsi" name="deskripsi" value="<?= $produk['deskripsi']; ?>">
					<?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col mt-3 mb-sm-0">
					<label for="deskripsi">Tambahkan ukuran : </label>
					<input type="text" class="form-control form-control-static text-center" id="ukuran" name="ukuran" value="<?= $produk['ukuran']; ?>">
					<?= form_error('ukuran', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col mt-3 mb-sm-0">
					<label for="harga">Tambahkan harga awal : </label>
					<input type="text" class="form-control form-control-static text-center" id="harga" name="harga" value="<?= $produk['harga']; ?>">
					<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
                <div class="col mt-3 mb-sm-0">
                    <label for="gambar">gambar : </label>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <img src="<?= base_url('assets/img/') . $produk['gambar']; ?>" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
				<button type="submit" name="submit" class="btn btn-primary float-right">Ubah Data</button>
			</form>
		</div>
	</div>
</div>