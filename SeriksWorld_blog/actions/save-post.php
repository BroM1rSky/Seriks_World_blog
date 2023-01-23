<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        require "../includes/conexion.php";

        if(!isset($_SESSION)){
            session_start();
            
            $user_id = $_SESSION["user"]["id"];
        }else{
            $user_id = $_SESSION["user"]["id"];
        }
        
        #Recollection of post values

        $errors = array();

        $title = isset($_POST["title"]) ? mysqli_real_escape_string($connect, trim($_POST["title"])) : false;
        $description = isset($_POST["description"]) ? mysqli_real_escape_string($connect, trim($_POST["description"])) : false;
        $category = isset($_POST["category"]) ? intval($_POST["category"]) : false;



        if (empty($title)){
  
            $errors["title"] = "The title should not be empty! ";

        }

        if (empty($description)){
        
            $errors["description"] = "The description should not be empty!";

        }

        if (empty($category)){

            $errors["category"] = "The post must belong to a category!";

        }

        if (count($errors) == 0){

            $sql = "INSERT INTO entradas VALUES (null,$user_id,$category,'$title','$description', CURDATE());"; 
            $query = mysqli_query($connect,$sql);

            $_SESSION["completed"] = "The post has been created successfully";

            header("Location:../create-post.php");




        }
        else{
            $_SESSION["errors"] = $errors;

            header("Location:../create-post.php");
        }

        


    }else{
        header("Location:../index.php");
    }

?>