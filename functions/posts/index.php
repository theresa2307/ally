<?php
switch ($_GET["action"]){ // url wird ausgelesen, bei create wird formular angezeigt
    case"create":
        include"./functions/posts/create_form.php";
        break;}
?>