<?php
require "db.php";

 if(isset($_POST['signup'])){
        if(trim($_POST['name'])== "" || trim($_POST['email'])== "" || trim($_POST['password1'])== ""){
            $err1 = "Заполниете все поля!";
        } else {
if (isset($_POST['signup'])) {
    if ($_POST['password1'] != $_POST['password2']) {
        $err[] ="Пароли не совпадают";
    } else {
    $email = $_POST['email'];              

    if ($result = $con->query("SELECT * FROM `users` WHERE `email` = '$email'"))
    {
        $row_cnt = $result->num_rows;
        $result->close();
    }
 
if ($row_cnt > 0)
{
    $err[] ="Такой пользователь уже существует!";

$con->close();

        }else{
    if (empty($err)) {
     $users = R::dispense('users');
     $users->name = $_POST['name'];
     $users->email = $_POST['email'];
     $users->password = password_hash($_POST['password1'],PASSWORD_DEFAULT);
     R::store($users);
     header('locftion: signup.php'); 
     echo "Регистрация прошла успешно!<script>window.location = 'login.php';</script>";
}
        }
}
        }
 }
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body> 
        <?= '<div style="color: red">'.$err1.'</div>' ?>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Имя"><br><br>
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="password" name="password1" placeholder="Пароль"><br><br>
            <input type="password" name="password2" placeholder="Подтверждение пароля"><br><br>
            <input type="submit" name="signup" value="Зарегистрироваться">
        </form>
       <?php if(!empty($err)) echo '<div style="color: red;">'.array_shift($err).'</div>'; ?>
    </body>
</html>