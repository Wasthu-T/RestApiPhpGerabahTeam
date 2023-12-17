<?php
// ngk dipakai
    require_once('connection.php');
    if(empty($_GET)) {
        $query = mysqli_query($connection, "SELECT * from data");
        $result = array();
        while($row = mysqli_fetch_array($query)) {
            array_push($result, array (
                'id' => $row['id'],
                'nama_mhs' => $row['nama_mhs'],
                'email' => $row['email'],
                'jurusan' => $row['jurusan']
            ));
        }
    
        echo json_encode(
            array('result' => $result)
        );
    }else {
        $query = mysqli_query($connection, "SELECT * from data where id=".$_GET['id']);
        $result = array();
        while($row = $query -> fetch_assoc()) {
            $result = array (
                'id' => $row['id'],
                'nama_mhs' => $row['nama_mhs'],
                'email' => $row['email'],
                'jurusan' => $row['jurusan']
            );
        }
    
        echo json_encode(
            $result
        );
    }

?>