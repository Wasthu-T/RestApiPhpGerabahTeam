<?php
//koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'test_restapi';

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//ambil data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mhs = $_POST['nama_mhs'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];


    //cek email duplikat
    $check_query = "SELECT * FROM data WHERE email = '$email'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo"<script>alert('Email sudah terdaftar!'); window.location='create.php';</script>";
        exit;
    }    

    //query untuk menyimpan data ke database
    $query = "INSERT INTO data (nama_mhs, email, jurusan) VALUES ('$nama_mhs', '$email', '$jurusan')";

    //alert
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='main.php';</script>";
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($connection);
    }
}

// Tutup koneksi database
mysqli_close($connection);
?>
