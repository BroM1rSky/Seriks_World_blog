<?php

require_once "./includes/redirection.php";
require_once "./includes/header.php";
require_once "./includes/side.php";

if (isset($_SESSION["user"])){

    $user = $_SESSION["user"];
    
}else{
    header("Location:./index.php");
}

?>

<div class="principal">
    <center><h1>My account</h1><br></center>

    <div class="account">
        <form class="form-account" action="./actions/update-account.php" method="post">
        
            <?php if(isset($_SESSION["completed"])){

                echo "<div class='alert alert-ok'>".$_SESSION["completed"]."</div>" ;
            }
            elseif(isset($_SESSION["errors"]["general"])){

                echo "<div class='alerta alerta-error'>".$_SESSION["errors"]["general"]."</div>" ;
            }?>

            <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'name') : ""; ?>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?=$user["nombre"]?>" />

            <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'surname') : ""; ?>
            <label for="surname">Surname</label>
            <input type="text" name="surname" value="<?=$user["apellido"]?>">

            <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'email') : ""; ?>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?=$user["email"]?>">

            <a href="#">Change password</a>

            <input class="submit-category" type="submit" value="Save"/>
        </form>

        <!--Change user avatar-->

    <form class="form-account2" action="./actions/update-avatar.php" method="post"  enctype="multipart/form-data">

        <center>
        <?php if ($_SESSION["user"]["avatar"] == null) :?>
            <img src="./uploads/default-avatar.png" alt="user-avatar" width="35%"> 
        <?php endif?>  
        
        <?php if ($_SESSION["user"]["avatar"] != null) : ?>
            <img src="<?=$_SESSION["user"]["avatar"]?>" alt="user-avatar" width="35%" ></center><br>
        <?php endif; ?>

        <center>
                <input id="avatar" name="user_avatar" type="file" value="Update"/><br>
        </center><br>

        <input class="submit-category" type="submit" value="Update Avatar"/>
    </form>
 </div>
</div>
        
<?php require_once "./includes/footer.php"; ?>

<?php demolishError(); ?>