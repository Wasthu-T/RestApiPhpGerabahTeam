<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'test_restapi';

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data yang dikirimkan dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mhs = $_POST['nama_mhs'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];


    //Cek email duplikat
    $check_query = "SELECT * FROM data WHERE email = '$email'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo"<script>alert('Email sudah terdaftar!'); window.location='create.php';</script>";
        exit;
    }    

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO data (nama_mhs, email, jurusan) VALUES ('$nama_mhs', '$email', '$jurusan')";

    if (mysqli_query($connection, $query)) {
        // Jika berhasil menyimpan, arahkan kembali ke halaman utama atau tampilkan pesan sukses
        echo "<script>alert('Data berhasil disimpan!'); window.location='main.php';</script>";
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menyimpan data: " . mysqli_error($connection);
    }
}

// Tutup koneksi database
mysqli_close($connection);
?>
