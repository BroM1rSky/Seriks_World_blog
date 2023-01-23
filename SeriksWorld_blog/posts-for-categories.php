<?php
    require_once "./includes/conexion.php";
    require_once "./includes/header.php"; 
    require_once "./includes/side.php"; 

    if(isset($_GET["id"])):
        $actual_category  = getSingleCategory($connect,$_GET["id"]);

        if ($actual_category != null):
           
?>

        <div class="principal">
            <h1>Posts for <?=$actual_category["categoria"];?></h1>

            <?php   
                $posts = getPosts($connect,null,$_GET["id"]);

                if (!empty($posts) && $posts == "This category has no posts yet!"){

                    echo  "<br><br><br><br><br><br><br><br><center><h1 style=color:red>This category has no posts yet!</h1></center>";
                }
                
                if (!empty($posts) && $posts != "This category has no posts yet!") :

                    while ($post = mysqli_fetch_assoc($posts)) :
            ?>
                    <a href="">
                        <article class="post">
                            <h2><?=$post["titulo"]?></h2><br>
                            <span class="fecha"><?=$post["fecha"]." | ".$post["categoria"]?></span><br><br>
                            <p><?php echo $post["descripcion"];?></p>
                        </article>
                    </a>      
            
            <?php 
                    endwhile;
                endif;
            ?>
        </div>

                <!--Footer-->
                <?php require_once "./includes/footer.php"; ?>
                
            </body>

        </html>

<?php

    endif;
endif;

if ($actual_category == null){
    header("Location:./index.php");
}

?>