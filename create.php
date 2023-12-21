<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<!-- ubah disini -->
<div class="d-flex justify-content-center align-item-center" style="height: 10vh;">
    <h1 class="text-center">Create Data</h1>
</div>
<form action="process_create.php" method="POST" class="mt-4">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Data Mahasiswa</h5>
                    <form action="process_create.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" name="nama_mhs" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan :</label>
                            <input type="text" class="form-control" name="jurusan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- end ubah -->
<?php $content = ob_get_clean(); ?>
<?php
$title = 'Create Page';
require('layout.php');
?>