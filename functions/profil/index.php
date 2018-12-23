<?php
switch ($_GET["action"]){
    case"edit":
        include"./functions/profil/profil_form.php";
        break;
    default:
        include"./functions/profil/profil.php";
};
?>