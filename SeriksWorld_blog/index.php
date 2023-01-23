<?php require_once "./includes/header.php"; ?>
<?php require_once "./includes/side.php"; ?>

        <div class="principal">
            <h1>Last posts</h1>

            <?php   
                $posts = getPosts($connect,true);

                if (!empty($posts)) :

                    while ($post = mysqli_fetch_assoc($posts)) :
            ?>
                    <a href="">
                        <article class="post">
                            <h2><?=$post["titulo"]?></h2><br>
                            <span class="fecha"><?=$post["fecha"]." | ".$post["categoria"]?></span><br><br>
                            <!--limit description string to 150 characters.-->
                            <p><?=substr($post["descripcion"],0,150)." ...";?></p>
                        </article>
                    </a>      
            
            <?php 
                    endwhile;
                endif;
            ?>
            
            <div id="see-all">
                <a href="./all-post.php">See all posts</a>
            </div>

        </div>
        
        <!--Footer-->
        <?php require_once "./includes/footer.php"; ?>
        
    </body>

</html>