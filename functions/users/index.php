<?php
switch ($_GET["action"]){ //wenn action = login ist, macht es das...schaut sich den link an und schaut was nach action steht -> soll übermitteln was gemacht wird
    case"login":
        include"./functions/users/login_form.php";
        break;
    case"logout":
        include"./functions/users/logout.php";
        break;
    case"registrierung":
        include"./functions/users/registration_form.php";
        break;}
?>