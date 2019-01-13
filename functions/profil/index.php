<?php
switch ($_GET["action"]){
    case"edit":
        include"./functions/profil/profil_form.php";
        break;
    case"follow":
        include"./functions/profil/follow_do.php";
        break;
    default:
        include"./functions/profil/profil.php";
};
?>