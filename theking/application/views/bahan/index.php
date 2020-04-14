<div class="container-fluid text-center">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Bahan</h1>
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Bahan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Bahan</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($bahan as $bhn) : ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?= $bhn['nama_bahan']; ?></td>
                <td><?= $bhn['harga_satuan']; ?></td>
                <td>
                <a href="" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <a href="" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                  <a href="<?= base_url(); ?>bahan/hapus/<?= $bhn['id_bahan']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="Swal('hello world', 'latihan', 'success')">
                    <i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
        <a href="<?= base_url(); ?>bahan/tambah" class="btn btn-primary">Tambah
                Data Bahan</a>
      </div>
    </div>
  </div>
</div>