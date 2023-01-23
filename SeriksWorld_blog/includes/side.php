<?php
    require_once "./includes/helpers.php";
    if (!isset($_SESSION)){
        session_start();
    }
?>

<aside id="sidebar">
        <?php if (isset($_SESSION["user"])) : ?>
            <div id="user-login" class="block-aside">
                <center>
                     <h3><?=$_SESSION['user']['nombre'].' '.$_SESSION['user']['apellido'];?></h3>
                
                <a href="./close.php" class="button button-white">Logout</a>
                <a href="./create-post.php" class="button button-blue">Add Post</a>
                <a href="./create-category.php" class="button button-blue">Add Category</a>
                <a href="./my-account.php" class="button button-red">My account</a>
                </center>

            </div>
            
        <?php endif;?>

    <?php if (!isset($_SESSION["user"])) : ?>
        <div id="login" class="block-aside">
            <h3>Identification</h3>

            <?php if (isset($_SESSION["error_login"])) : ?>
                <div class="alert alert-error">
                    <?=$_SESSION["error_login"];?>
                </div>
            <?php endif;?>

            <form action="./actions/login.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email"/>

                <label for="password">Credentials</label>
                <input type="password" name="password"/>

                <input type="submit" name="submit" value="Sign In" />

            </form>
        </div>

        <div id="register" class="block-aside">
            <h3>Sign Up Now!</h3>
            <form action="./actions/register.php" method="post">

                <?php
                
                    if(isset($_SESSION["completed"])){

                        echo "<div class='alert alert-ok'>".$_SESSION["completed"]."</div>" ;
                    }
                    elseif(isset($_SESSION["errors"]["general"])){

                        echo "<div class='alerta alerta-error'>".$_SESSION["errors"]["general"]."</div>" ;
                    }
                
                ?>

                <label for="name">Name</label>
                <input type="text" name="name"/>

                <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'name') : ""; ?>

                <label for="surname">Surname</label>
                <input type="text" name="surname"/>

                <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'surname') : ""; ?>


                <label for="email">Email</label>
                <input type="email" name="email"/>

                <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'email') : ""; ?>


                <label for="password">Credentials</label>
                <input type="password" name="password"/>

                <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'credentials') : ""; ?>


                <input type="submit" name="submit" value="Sign Up" />

            </form>

            <?php demolishError(); ?>

        </div>

    <?php endif; ?>

</aside>