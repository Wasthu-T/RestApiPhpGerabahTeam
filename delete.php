<?php
$title = 'Delete Page';
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

    //cek query
    if (!$result) {
        echo "Query error: " . mysqli_error($connection);
        exit;
    }

    //cek data
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID tidak ditemukan";
    exit;
}
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="d-flex justify-content-center mb-4">
                <h1 class="text-center">Delete Data</h1>
            </div>
        </div>
    </div>

    <?php if ($data): ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-75 mx-auto mt-3 shadow p-4"> 
                <div class="card-header h4 row justify-content-center">
                    Informasi Data yang Akan Dihapus
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-4" style="text-decoration: underline;"><?= $data['nama_mhs']; ?></h5>
                    <p class="card-text mb-3">Email: <?= $data['email']; ?></p>
                    <p class="card-text mb-3">Jurusan: <?= $data['jurusan']; ?></p>
                    <a href="process_delete.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">Hapus Data</a>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger mt-4" role="alert">
                Data tidak ditemukan atau ada kesalahan dalam mengambil data.
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<?php
$content = ob_get_clean();
require('layout.php');
?>
