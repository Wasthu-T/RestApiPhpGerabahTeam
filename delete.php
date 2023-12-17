<?php

require('connection.php');
$data = query("SELECT * FROM data");


?>


<?php ob_start(); ?>
<h1>Delete</h1>
<!-- content disini -->

<!-- end content -->
<?php $content = ob_get_clean(); ?>



<?php
$title = 'Delete Page';
require('layout.php');
?>