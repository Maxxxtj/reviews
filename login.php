<?php 
require "db.php";

if(isset($_POST['log'])){
    $error=array();
    $user = R::findOne('users','email=?', array($_POST['email']));
    $secret = htmlspecialchars(trim($_POST['secret']));
    if ($user) {    
    if (password_verify($_POST['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        header('locftion: /');
        echo "Авторизация прошла успешно!<script>window.location = 'otziv.php';</script>";
} else {
    $error[]="Пароль введён не верно!";
} 
}
 else {
    $error[]="Пользователь не найден!";
}
/*if($secret != 'secretkey'){
    return false;
}*/


}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
    </head>
    <body>  
        <form action="" method="POST">
        <input type="text" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Пароль"><br><br>
            <input type="hidden" id="secret" name="secret" value=" ">
            <input type="submit" name="log" value="Войти"><br><br>
            </form>
         <?php if(!empty($error)) echo '<div style="color: red;">'.array_shift($error).'</div>'; ?>
        
        <script>
         /*   let secret = document.querySelector('#secret'); 
            document.querySelector('.btn').onclick = function () {
                secret.value='secretkey';
            } */
        </script>
        <a href="otziv.php"> </a>
    </body>
</html>