<?php

require('connection.php');

if (!$connection){
    die('Koneksi gagal: '. mysqli_connect_error());
}

//query hapus semua
$query = "DELETE FROM data";

if (mysqli_query($connection, $query)){
    echo "<script>alert('Semua data berhasil dihapus!'); window.location='main.php';</script>";
}else{
    echo "Gagal menghapus data: ". mysqli_error($connection);
}

//close
mysqli_close($connection);