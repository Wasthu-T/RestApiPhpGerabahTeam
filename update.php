<?php
$title = 'Update Page';
require('connection.php');

ob_start();
?>

<?php
//cek id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //get data by id
    $query = "SELECT * FROM data WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo "Query error: " . mysqli_error($connection);
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data gagal diubah!'); window.location='main.php';</script>";
        exit;
    }
}

//form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mhs = $_POST['nama_mhs'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    //cek data baru-lama
    if ($nama_mhs == $data['nama_mhs'] && $email == $data['email'] && $jurusan == $data['jurusan']) {
        echo"<div class='alert alert-danger'>Data yang dimasukkan sama dengan data yang lama!</div>";
    } else {
        //proses update ke database
        $updateQuery =  "UPDATE data SET nama_mhs='$nama_mhs', email='$email', jurusan='$jurusan' WHERE id=$id";
        $updateResult = mysqli_query($connection, $updateQuery);

        if (!$updateResult) {
            echo "<div class='alert alert-success'>Data berhasil diperbarui.</div>";
        } else {
            echo "<div class='alert alert-danger'>Gagal memperbarui data:".mysqli_error($connection). "</div";
        }
    }
}
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-center mb-4">
                <h1 class="text-center">Update Data</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-75 mx-auto mt-3 shadow p-4 mb-5"> 
                <div class="card-header h4 row justify-content-center">
                    Informasi Data Sekarang
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-4" style="text-decoration: underline;"><?= $data['nama_mhs']; ?></h5>
                    <p class="card-text mb-3">Email: <?= $data['email']; ?></p>
                    <p class="card-text mb-3">Jurusan: <?= $data['jurusan']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card w-75 mx-auto mt-3 shadow p-4 mb-5">
                    <div class="card-header h4 row justify-content-center">
                        Masukkan Data Baru
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_mhs" class="form-label">Nama Mahasiswa:</label>
                            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" placeholder="<?= $data['nama_mhs']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?= $data['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan :</label>
                            <select class="form-select" name="jurusan" required>
                                <option value="Informatika" <?= ($data['jurusan'] == 'Informatika') ? 'selected' : ''; ?>>Informatika</option>
                                <option value="Sistem Informasi" <?= ($data['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                <option value="Teknik Mesin" <?= ($data['jurusan'] == 'Teknik Mesin') ? 'selected' : ''; ?>>Teknik Mesin</option>
                                <option value="Menejemen" <?= ($data['jurusan'] == 'Menejemen') ? 'selected' : ''; ?>>Menejemen</option>
                                <option value="Teknik Sipil" <?= ($data['jurusan'] == 'Teknik Sipil') ? 'selected' : ''; ?>>Teknik Sipil</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require('layout.php');
?>
