<?php
require("connection.php");

//get id dari url
$id = $_GET['id'];

//query hapus by id
$query = "DELETE FROM data WHERE id = $id";

if (mysqli_query($connection, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='main.php';</script>";
} else {
    echo "Gagal menghapus data:" .mysqli_error($connection);
}

mysqli_close($connection);
?>