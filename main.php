<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<h1>Data</h1>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Perintah</th>
    </tr>

    <?php $i = 1 ?>
    <?php foreach ($data as $dat) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $dat["nama_mhs"]; ?></td>
            <td><?= $dat["email"]; ?></td>
            <td><?= $dat["jurusan"]; ?></td>
            <td>
                <a href="update.php">Ubah</a> ||
                <a href="delete.php">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach ?>
</table>
<br>
<a href="create.php"><button>Tambah Data</button></a>
<?php $content = ob_get_clean(); ?>



<?php
$title = 'Data Page';
require('layout.php');
?>