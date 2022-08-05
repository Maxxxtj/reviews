<?php
    require "db.php";
    if(isset($_POST['send'])){
        if(trim($_POST['name'])== "" || trim($_POST['email'])== "" || trim($_POST['message'])== ""){
            $err = "Заполниете все поля!";
        } else {
       
    $komments = R::dispense('komments');
    $komments->name = $_POST['name'];
    $komments->topic = $_POST['email'];
    $komments->message = $_POST['message'];
    $komments->date = date("d.m.y");
   
    R::store($komments);
    header('locftion: /');    
    
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Отзывы</title>
    </head>
    <body>  
        <?= '<div style="color: red">'.$err.'</div>' ?>
        <form  action="" method="POST">
            <input type="text" name="name" placeholder="Имя"><br><br>
            <input type="email" name="email" placeholder="e-mail"><br><br>
            <input type="text" name="message" placeholder="Отзыв"><br><br>
                       
            <input type="submit" name="send">
            <?= '<div style="color: red">'.$err.'</div>' ?>
        <?php
        echo '<br><a href="logout.php">Выйти</a>'
        ?>
            
        </form>
        <?php $komen = mysqli_query($con, "SELECT * FROM `komments` ORDER BY 'id'") ?> 
        <?php while($kom = mysqli_fetch_assoc($komen)) { ?>
        <div class="koment"> 
            <hr>
            <div class="name"><?= $kom['name']?> </div>
            <div class = "i">
                <?=$kom['date'] ?>
            </div>
            <div class="message"><?= $kom['message']?> </div>  
            <hr>
            
        </div> 
        <?php } ?>
       
    </body>
</html>