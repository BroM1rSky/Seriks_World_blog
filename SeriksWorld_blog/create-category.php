<?php
    require_once "./includes/redirection.php";
    require_once "./includes/header.php";
    require_once "./includes/side.php";

    if(!isset($_SESSION)){
        session_start();
    }
?>

<div class="principal">
    <h1>Create New Category</h1>
    <br>
    <p class="inform">Add new categories for the users who wanna use them for create other posts!</p>
    <br/><br/>
    
    <form class="form-categories" action="./actions/save-category.php" method="post">
       <center><label for="category">Title for the new categories</label><br></center>
        <input type="text" name="category"/>

        <?php if(isset($_SESSION["error_categories"])) : ?>
            <div class="alert alert-error">
                <?php echo $_SESSION["error_categories"];?>
            </div>
        <?php endif;?>
        

        <input class="submit-category" type="submit" value="Save"/>
    </form>

</div>
        
<!--Footer-->
<?php require_once "./includes/footer.php"; ?>

<?php demolishError();?>
        