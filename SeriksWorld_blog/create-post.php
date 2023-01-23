<?php

    require_once "./includes/redirection.php";
    require_once "./includes/header.php";
    require_once "./includes/side.php";

    if(!isset($_SESSION)){
        session_start();
    }
?>

<div class="principal">
    <h1>Create New Posts</h1><br>
    <p class="inform">Add new categories for the users who wanna use them for create other posts!</p><br/><br/>

    <form class="form-posts" action="./actions/save-post.php" method="post">
    
    <?php        
        if(isset($_SESSION["completed"])){
            echo "<div class='alert alert-ok'>".$_SESSION["completed"]."</div>" ;
         }
    ?>

    <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'title') : ""; ?>


       <label for="title">Title</label>
       <input type="text" name="title"/>

       <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'description') : ""; ?>

       <label for="description">Description</label>
       <textarea class="textarea-post" type="text" name="description" placeholder="Put your text right here..."></textarea>

       <?php echo isset($_SESSION["errors"]) ? ShowErrors($_SESSION["errors"],'category') : ""; ?>

       <label for="category">Category</label>
       <select name="category">
            <?php 
                    $categories = getCategorys($connect);
                    while ($category = mysqli_fetch_assoc($categories)) :  ?>
                        <option value="<?=$category["id"]?>"><?=$category["categoria"]?></option>
            <?php   endwhile; ?>
            
       </select>

        <input class="submit-category" type="submit" value="Save"/>
    </form>

</div>
        
<?php require_once "./includes/footer.php"; ?>

<?php demolishError(); ?>