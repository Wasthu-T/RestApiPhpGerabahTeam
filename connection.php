<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'test_restapi');

    $connection = mysqli_connect(HOST,USER,PASS,DB) or die 
    ('Unable connect');

    function query($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        } 
        return $rows;
    }
?>