<?php>
    require "libs/rb.php";
    R::setup('mysql:host=localhost;dbname=otziv', 'root','root');
    $con= mysqli_connect('localhost','root','root','otziv');
    session_start();
    $adm_email="maksim-mogl@mail.ru";
    
?>