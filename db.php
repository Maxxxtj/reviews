<?php>
    require "libs/rb.php";
    R::setup('mysql:host=localhost;dbname=otzivproekt', 'root123','Root123');
    $con= mysqli_connect('localhost','root123','Root123','otzivproekt');
    session_start();
    $adm_email="maksim-mogl@mail.ru";
    
?>