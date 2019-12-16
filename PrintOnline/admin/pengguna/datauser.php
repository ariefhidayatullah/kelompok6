<?php
require 'function.php';
$bahan = query('SELECT * FROM user');
include '../_header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid text-center">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data user</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>id user</th>
                            <th>nama user</th>
                            <th>email</th>
                            <th>password</th>
                            <th>no hp user</th>
                            <th>alamat</th>
                            <th>kode pos</th>
                            <th>aksi</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($bahan as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['id_user']; ?></td>
                                <td><?= $row['nama_user']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['password']; ?></td>
                                <td><?= $row['nohp_user']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['kodepos']; ?></td>
                                <td>
                                    <a href="hapus.php?id=<?= $row['id_user']; ?>" onclick="return confirm('apakah anda yakin ? ');"><button class="btn btn-danger btn-sm">hapus</button></a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include '../_footer.php'; ?>