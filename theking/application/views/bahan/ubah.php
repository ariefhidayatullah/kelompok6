<div class="container text-center">
	<div class="text-center">
		<h1 class="h4 text-gray-900 mb-4">Tambahkan Bahan!</h1>
	</div>

	<div class="row">
		<div class="col-lg-6 offset-3">
			<form method="post" action="">
            <input type="hidden" name="id_bahan" value="<?= $bahan['id_bahan']; ?>">
				<div class="form-group ">
					<div class="col mb-3 mb-sm-0">
						<label for="nama_bahan">Nama Bahan :</label>
						<input type="text" class="form-control form-control-static text-center" id="nama_bahan" name="nama_bahan" value="<?= $bahan['nama_bahan']; ?>">
					</div>
                    <small class="form-text text-danger"><?= form_error('nama_bahan'); ?></small>
				</div>
				<div class="form-group row">
					<div class="col mb-3 mb-sm-0">
						<label for="id_produk">nama Produk : </label>
						<select class="form-control" name="id_produk" id="id_produk">
                        <?php foreach( $produk as $j ) : ?>
                            <?php if( $j['id_produk'] == $bahan['id_produk'] ) : ?>
                                <option value="<?= $j['id_produk']; ?>" selected><?= $j['jenis_produk']; ?></option>
                            <?php else : ?>
                                <option value="<?= $j['id_produk']; ?>"><?= $j['jenis_produk']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col mb-3 mb-sm-0">
						<label for="harga_satuan">Harga :</label>
						<input type="text" class="form-control form-control-static text-center" id="harga_satuan" name="harga_satuan" value="<?= $bahan['harga_satuan']; ?>">
					</div>
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
				</div>
				<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
			</form>
		</div>
	</div>
</div>