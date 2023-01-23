<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){

    if (isset($_POST)){

        require "../includes/conexion.php";

        if(!isset($_SESSION)){
            session_start();
        }
        

        #Recollection of post values

        $name = isset($_POST["name"]) ? mysqli_real_escape_string($connect, trim($_POST["name"])) : false;
        $surname = isset($_POST["surname"]) ? mysqli_real_escape_string($connect, trim($_POST["surname"])) : false;
        $email = isset($_POST["email"]) ? mysqli_real_escape_string($connect,trim($_POST["email"])) : false;

        #Validation of user information previosly to insert to the database
        
        $errors = array();

        #Name validation

        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/",$name)){
            $name_validate = true;
        }
        else{
            $name_validate = false;
            $errors["name"] =  "The name will be write badly.";
        }

        #Surname validation

        if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/",$surname)){
            $surname_validate = true;
        }
        else{
            $surname_validate = false;
            $errors["surname"] =  "Those surnames will be writen badly.";
        }

        #Email validation

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validate = true;
        }
        else{
            $email_validate = false;
            $errors["email"] =  "The email will be write badly.";
        }

        $save_user = false;

        //Create secure password:

        $secure_password = password_hash($credentials, PASSWORD_BCRYPT,['cost'=>4]);

        if (count($errors) == 0) {

            $id = $_SESSION['user']['id'];

            $save_user = true;

            //Insert user to the database:

            $sql = "UPDATE users SET nombre = '$name', apellido = '$surname', email = '$email' WHERE (id = $id)";
            $consult = mysqli_query($connect,$sql);

            $_SESSION["user"]["nombre"] = $name;
            $_SESSION["user"]["apellido"] = $surname;
            $_SESSION["user"]["email"] = $email;

            if ($consult){
                $_SESSION['completed'] = "Account has been updated successfully !";
            }else{
                $_SESSION['errors']['general'] = "Registration has failed";
            }
            
        }else{
            $_SESSION["errors"] = $errors;
        }

        header("Location:../my-account.php");
    }

}

else{
header("Location:../index.php");
}

?>