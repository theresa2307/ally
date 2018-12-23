<!doctype html>
<html lang="de">
<head>
    <link rel="stylesheet" type="text/css" href="./style/style_login.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <meta charset="utf-8">
    <title>Beispiel</title>
</head>
<body>
<?php
session_start();
$logged_user = $_SESSION['username'];
?>
<ul>
    <li>
        <a href="index.php">Home</a>
        <?php
        if (isset($logged_user)) {
            echo "<a href='?page=users&action=logout'>Logout</a>";
        } else {
            echo "<a href='?page=users&action=login'>Login</a>";
        };
        ?>
        <a href="?page=users&action=registrierung">Registrierung</a>
        <a href="?page=posts&action=create">Post erstellen</a>
        <a href="?page=posts&action=news">Neuigkeiten</a>
        <?php
        if(isset($logged_user)) {
            echo "<a href='?page=profile&user=$logged_user'>Profil</a>";
        }
        ?>
    </li>
</ul>
<?php
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
    default:
        include"./functions/posts/view.php";
}
echo $_SESSION['username'];
?>
</body>
</html>