<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include "../includes/conexion.php";

        $nameImg = $_FILES["user_avatar"]["name"];
        $path = "../uploads/".$nameImg;

        if(!isset($_SESSION)){
            session_start();

            $id = $_SESSION["user"]["id"];
        }else{
            $id = $_SESSION["user"]["id"];
        }

        move_uploaded_file($_FILES["user_avatar"]["tmp_name"],$path);

        $newpath = "./uploads/".$nameImg;

        $sql = "UPDATE users SET avatar = '$newpath' WHERE (id = $id);";
        $query = mysqli_query($connect,$sql);

        $_SESSION["user"]["avatar"] = $newpath;

        header("Location:../my-account.php");



    }else{
        header("Location:../index.php");
    }

?>