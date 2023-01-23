<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){

    require "../includes/conexion.php";

    if(!isset($_SESSION)){
        session_start();
    }


    #Recollection of post values

    $category = isset($_POST["category"]) ? mysqli_real_escape_string($connect, trim($_POST["category"])) : false;
    
    
    $errors = array();

    #Category validation

    if (!empty($category) && !is_numeric($category) && !preg_match("/[0-9]/",$category)){
        $category_validate = true;
    }
    else{
        $categoty_validate = false;
        $errors["error_categories"] = "There was an error saving the category";
    }

    if (count($errors)==0){
        $sql = "INSERT INTO categorias VALUES (null,'$category');";
        $query = mysqli_query($connect,$sql);

        header("Location:../index.php");

        
    }
    else{
        $_SESSION["error_categories"] = $errors["error_categories"];
        header("Location:../create-category.php");
    }

}else{
    header("Location:../index.php");
}

?>