<?php

    

?>


<?php require_once "./includes/header.php"; ?>
<?php require_once "./includes/side.php"; ?>

        <div class="principal">
            <h1>All posts</h1>

            <?php   
                $posts = getPosts($connect);

                if (!empty($posts)) :

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