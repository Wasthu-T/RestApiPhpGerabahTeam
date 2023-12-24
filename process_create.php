<?php

require('connection.php');


//ambil data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mhs = $_POST['nama_mhs'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];


    //cek email duplikat
    $check_query = "SELECT * FROM data WHERE email = '$email' AND nama_mhs = '$nama_mhs'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo"<script>alert('Email & Nama sudah terdaftar!'); window.location='create.php';</script>";
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

//close
mysqli_close($connection);
?>
