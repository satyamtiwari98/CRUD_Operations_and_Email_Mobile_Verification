<?php

require_once 'connection.php';

    session_start();

    $id = $_GET['id'];

    $sqlQuery = "DELETE  from User where `id`='$id'";

    if($connect->query($sqlQuery)==True) {

        echo "Deleted Successfully";
        header('location:display.php');

    }else {

        echo "You cannot Delete this please try again later!!!";
        
    }