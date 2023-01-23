<?php

    $server = "localhost";
    $username = "root";
    $credentials = "";
    $database = "serik_world";

    $connect = mysqli_connect($server,$username,$credentials,$database);

    mysqli_query($connect,"SET NAMES 'utf8'");

   

    if (!isset($_SESSION)){
        session_start();
    }

?>