<?php

    function ShowErrors($error,$field){

        $alert = ''; 

        if(isset($error[$field]) && !empty($field)){

            $alert = "<div class='alert alert-error'>".$error[$field]."</div>";

        }

        return $alert;
    }

    function demolishError(){

        if (isset($_SESSION["errors"])){

            $_SESSION['errors'] = null;
            unset($_SESSION['errors']);

        }

        if (isset($_SESSION["completed"])){

            $_SESSION['completed'] = null;
            unset($_SESSION['completed']);

        }

        if (isset($_SESSION["error_categories"])){

            $_SESSION['error_categories'] = null;
            unset($_SESSION['error_categories']);

        }


    }

        function getCategorys($connect){

            $sql = "SELECT * FROM categorias;";
            $categorys = mysqli_query($connect,$sql);

            if($categorys && mysqli_num_rows($categorys) >=1){
                $result = $categorys;
            }
            
            return $result;
        }

        function getSingleCategory($connect,$id){

            $sql = "SELECT * FROM categorias WHERE (id = $id);";
            $categorys = mysqli_query($connect,$sql);

            if($categorys && mysqli_num_rows($categorys) >=1){
                $result = mysqli_fetch_assoc($categorys);


                return $result;
            }
            
            
        }



        function getPosts($connect, $limit = null, $category = null){

            $sql = "SELECT e.*, c.categoria AS 'categoria' FROM entradas e ".
                   "INNER JOIN categorias c ON e.categoria_id=c.id ";
            
            if (!empty($category)){
                $sql .= "WHERE e.categoria_id = $category ";
            }

            $sql .="ORDER BY e.id DESC ";

            if ($limit){
                $sql .= " LIMIT 4";
            }

            $posts = mysqli_query($connect,$sql);

            if($posts && mysqli_num_rows($posts) >=1){
                $result = $posts;

                return $result;
                 
            }else{
                $result = "This category has no posts yet!";

                return $result;
            }            

        }


?>