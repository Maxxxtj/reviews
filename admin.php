<?php
    require "db.php";
    if (isset($_POST['delete'])) {
        mysqli_query($con, "DELETE FROM `komments` WHERE `komments`.`id`=".$_POST['id']);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
    </head>
    <body>  
    <?php if($_SESSION['logged_user']->email == $adm_email): ?> 
        <div class="form">
            <form action="" method="POST">
                <input type="text" placeholder="Введите id:" name="id">
            
            <input type="submit" value="Удалить" name = "delete">
            </form>    
        </div>
        
    <?php else: ?>
        <div class="form">
            Такой страницы не существует!
        </div>
             
    <?php endif ?>   
        <?php $komen = mysqli_query($con, "SELECT * FROM `komments` ORDER BY 'id'") ?>
        <?php while($kom = mysqli_fetch_assoc($komen)) { ?>
        <div class="koment">
            <hr>
            <div class="name"><?= $kom['name']?> </div>
            <div class "i">
                <?=$kom['date'] ?>
            </div>
            <div class="message"><?= $kom['message']?> </div>  
            <hr>
            
        </div>
        <?php } ?>
    </body>
</html>    