<div class="container text-center">
	<div class="text-center">
		<h1 class="h4 text-gray-900 mb-4">Tambahkan Bahan!</h1>
	</div>

	<div class="row">
		<div class="col-lg-6 offset-3">
			<form class="user" method="post" action="">
				<div class="form-group ">
					<div class="col mb-3 mb-sm-0">
						<label for="nama_bahan">Nama Bahan :</label>
						<input type="text" class="form-control form-control-static text-center" id="nama_bahan" name="nama_bahan" placeholder="Masukkan Nama Bahan">
					</div>
                    <small class="form-text text-danger"><?= form_error('nama_bahan'); ?></small>
				</div>
				<div class="form-group row">
					<div class="col mb-3 mb-sm-0">
						<label for="id_produk">nama Produk : </label>
						<select class="form-control" name="id_produk" id="id_produk">
							<option>Pilih Produk : </option>
                        <?php foreach ($produk as $prdk) : ?>
                            <option value="<?= $prdk['id_produk'] ?>"><?= $prdk['jenis_produk'] ?></option>
                            <?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col mb-3 mb-sm-0">
						<label for="harga_satuan">Harga :</label>
						<input type="text" class="form-control form-control-static text-center" id="harga" name="harga" placeholder="Masukkan Jumlah Harga">
					</div>
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
				</div>
				<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
			</form>
		</div>
	</div>
</div>