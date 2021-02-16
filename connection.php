<?php
    $serverName = 'localhost';
    $username = 'root';
    $password = '';
    $dataBaseName = 'Cedcoss';

    $connect = new mysqli($serverName,$username,$password,$dataBaseName);

    if($connect->connect_error) {

        die("There is something wrong with the connection please recheck it !!!");
        
    }


?>