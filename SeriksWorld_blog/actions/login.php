<?php

    if ($_SERVER['REQUEST_METHOD']=="POST"){

        session_start();

        #Start session and conexion at the database.

        require_once "../includes/conexion.php";

        if (!empty($_POST["email"]) && !empty($_POST["password"])){

            #Remove past errors

            if (isset( $_SESSION["error_login"])){

                $_SESSION['error_login'] = null;
                unset($_SESSION['error_login']);
            }

            #Recollect information from the form.

            $email = isset($_POST["email"]) ? mysqli_real_escape_string($connect,trim($_POST["email"])) : false;
            $credentials = isset($_POST["password"]) ? mysqli_real_escape_string($connect,$_POST["password"]) : false;

            #Do a consult to verify the password and email match or not.

            $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $login = mysqli_query($connect,$sql);

            if ($login && mysqli_num_rows($login) == 1){
                $user = mysqli_fetch_assoc($login);
            
                #Check the password.

                $verify_password = password_verify($credentials, $user["pasas"]);

                if ($verify_password){

                    #If everything is ok, create the sesion with user login.

                    $_SESSION["user"] = $user;

                    if (isset( $_SESSION["error_login"])){

                        $_SESSION['error_login'] = null;
                        unset($_SESSION['error_login']);
                    }
                    

                }else{
                    #If something are fail, create the sesion with correspondent error.
                    
                    $_SESSION["error_login"] = "Login has failed.";
            
                }

            }else{
                $_SESSION["error_login"] = "Login has failed.";
            }

            header("Location:../index.php");

        }else{
            $_SESSION["error_login"] = "Login has failed.";
            header("Location:../index.php");
        }
        
        
    }else{
        header("Location:../index.php");
    }
?>