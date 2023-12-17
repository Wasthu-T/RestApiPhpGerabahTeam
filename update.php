<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<h1>Update</h1>
<?php $content = ob_get_clean(); ?>



<?php
$title = 'Update Page';
require('layout.php');
?>