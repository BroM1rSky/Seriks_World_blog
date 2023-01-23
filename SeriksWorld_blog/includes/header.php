<?php
    include 'conexion.php';
    include 'helpers.php';
?>

<!DOCTYPE HTML>
<html lang="es">

    <head>
        <title>Blog - The World of Seriks!</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>
        <!--Cabezera-->
        <header id="header">
            <!--LOGO-->
            <div id="logo">
                <a href="./index.php">
                    Blog - The World of Seriks!
                </a>
            </div>

            <!--Menu-->
            <nav id="nav">
                <ul>
                    <li><a href="./index.php">Start</a></li>
                    <?php 
                        $categorys = getCategorys($connect);

                        if (!empty($categorys)):

                            while ($categoria = mysqli_fetch_assoc($categorys)) :
                    ?>
                                <li><a href="./posts-for-categories.php?id=<?=$categoria["id"]?>"><?=$categoria["categoria"]?></a></li>

                    <?php 
                            endwhile;
                        endif;
                    ?>

                    <li><a href="./index.php">Contact us</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>

        <div id="container">
