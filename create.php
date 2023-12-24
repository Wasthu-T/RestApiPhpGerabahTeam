<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
    <h1 class="text-center">Create Data</h1>
</div>
<form action="process_create.php" method="POST" class="mt-4">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4 mb-5 my-5">
                    <div class="card-header h4 row justify-content-center">
                        Form Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="text-decoration: underline;">Data Mahasiswa Baru</h5>
                        <form action="process_create.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mahasiswa:</label>
                                <input type="text" class="form-control" name="nama_mhs" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan:</label>
                                <select class="form-select" name="jurusan" required>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Menejemen">Menejemen</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); ?>
<?php
$title = 'Create Page';
require('layout.php');
?>
