<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<div class="container mt-5">
    <div class="d-flex justify-content-center align-item-center" style="height: 10vh;">
        <h1 class="text-center">Data-Data Mahasiswa</h1>
    </div>
    <table class="table table-bordered tabel-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Perintah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $dat) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dat["nama_mhs"]; ?></td>
                    <td><?= $dat["email"]; ?></td>
                    <td><?= $dat["jurusan"]; ?></td>
                    <td>
                        <a href="update.php?id=<?= $dat['id']; ?>" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="delete.php?id=<?= $dat['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>    
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a href="create.php" class="btn btn-primary">Tambah Data</a>
    </div>
</div>
<?php $content = ob_get_clean(); ?>



<?php
$title = 'Data Page';
require('layout.php');
?>