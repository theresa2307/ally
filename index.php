<!doctype html>
<html lang="de">
<head>

        <!-- Einbindung Stylesheet-->


        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">


    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <meta charset="utf-8">
    <title>ally</title>
</head>
<body>
<?php
session_start();
$logged_user = $_SESSION['username'];

?>
<ul>
    <li>
        <a href="index.php">Startseite</a>
        <?php
        if (isset($logged_user)) {
            echo "<a href='?page=users&action=logout'>Logout</a>";
        } else {
            echo "<a href='?page=users&action=login'>Login</a>";
        };
        ?>
        <a href="?page=users&action=registrierung">Registrierung</a>
        <?php
        if(isset($logged_user)) {
			echo "<a href='?page=posts&action=create'>Neuer Beitrag</a>";
            echo "<a href='?page=profile&user=$logged_user'>Mein Profil</a>";
        }
        include_once('./functions/posts/search_form.php');
        ?>
    </li>
</ul>
<?php
if (isset($_GET['q'])){ //suche, get-> dass man NUR den findet, den man sucht
    include('./functions/posts/search_do.php');
}else {
    switch ($_GET["page"]){
        case"users":
            include "./functions/users/index.php";
            break;
        case"posts":
            include "./functions/posts/index.php";
            break;
        case"profile":
            include "./functions/profil/index.php";
            break;
        case"search": //suche
            include "./functions/posts/search_do.php";
            break;
        default:
            include"./functions/posts/view.php";
    }
}
?>
</body>
</html>