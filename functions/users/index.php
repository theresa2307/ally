<?php
switch ($_GET["action"]){
    case"login":
        include"./functions/users/login_form.php";
        break;
    case"registrierung":
        include"./functions/users/registration_form.php";
        break;}
?>