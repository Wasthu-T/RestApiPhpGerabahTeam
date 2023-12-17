<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<!-- ubah disini -->
<h1>Create</h1>
<form action="">
    <label for="name">Name :</label>
    <input type="text">
</form>
<!-- end ubah -->
<?php $content = ob_get_clean(); ?>



<?php
$title = 'Create Page';
require('layout.php');
?>