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
        <script type="text/javascript" src="/js/jquery.js" ></script>
    </head>
    <body>  
        <?= '<div style="color: red">'.$err.'</div>' ?>
        <form id="add-comment" action="add-comment.php" method="POST">
            <input type="text" name="name" placeholder="Имя"><br><br>
            <input type="text" name="email" placeholder="e-mail"><br><br>
            <input type="text" name="message" placeholder="Отзыв"><br><br>
            <input id="comment-btn1" type="submit" name="signup" value="send">
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
            <div class "i">
                <?=$kom['date'] ?>
            </div>
            <div class="message"><?= $kom['message']?> </div>  
            <hr>
            
        </div> 
        <?php } ?>
        <div id="new-comment"></div>
        <script>
            $(document).ready(function(){
                $('#comment-btn1').hide();
                $('#add-comment').append('<input id="comment-btn" type="button" value="Зарегистрироваться"');
                $('#comment-btn').bind('click', saveComment);
            )};

function saveComment(){
    var fData = $('add-comment').serialize();
    fData = fData + '&j=1';
    $.ajax({
        url:'add-comment.php',
        type:'get',
        dataType:'html',
        data: fData,
        success: function(data){
            $('#new-comment').html(data);
            $('#add-comment').hide('slow');
        }
    });
}
      </script>
    </body>
</html>