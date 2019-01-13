<?php
switch ($_GET["action"]){ //schaut sich den link an und schaut was nach action steht -> soll übermitteln was gemacht wird
    case"edit": //wird profil_form eingefügt
        include"./functions/profil/profil_form.php";
        break;
    case"follow": // hier follow_do
        include"./functions/profil/follow_do.php";
        break;
    default: // wenn nichts ist wird profil angezeigt
        include"./functions/profil/profil.php";
};
?>