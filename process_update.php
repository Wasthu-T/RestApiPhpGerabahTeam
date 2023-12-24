<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_mhs = $_POST['nama_mhs'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    //ambil data lama by id
    $query = "SELECT * FROM data WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $old_data = mysqli_fetch_assoc($result);

    //comp data lama-baru
    if ($old_data['nama_mhs'] === $nama_mhs && $old_data['email'] === $email && $old_data['jurusan'] === $jurusan) {
        echo "<script>alert('Data gagal diubah!'); window.location='main.php';</script>";
        exit;
    }

    //validasi
    $update_query = "UPDATE data SET nama_mhs=?, email=?, jurusan=? WHERE id=?";
    $update_stmt = mysqli_prepare($connection, $update_query);
    mysqli_stmt_bind_param($update_stmt, 'sssi', $nama_mhs, $email, $jurusan, $id);
    
    if (mysqli_stmt_execute($update_stmt)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='main.php';</script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($connection);
    }

    //close
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($update_stmt);
    mysqli_close($connection);
} else {
    echo "Akses ditolak!";
}
?>

