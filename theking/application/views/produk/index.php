<div class="container-fluid text-center">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Jenis Produk</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($produk as $row) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row['jenis_produk']; ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><img src="<?= base_url(); ?>/assets/img/<?= $row['gambar']; ?>" width="100"></td>

                <td>
                  <a href="<?= base_url(); ?>produk/ubah/<?= $row['id_produk']; ?>" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-info-circle"></i></a>
                  <a href="<?= base_url(); ?>produk/hapus/<?= $row['id_produk']; ?>" onclick="return confirm('apakah anda yakin ? ');" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="<?= base_url(); ?>produk/tambah" class="btn btn-primary" role="button"> Tambah Data </a>
      </div>
    </div>
  </div>
</div>