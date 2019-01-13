<!doctype html>
<html lang="de">
<head>
    <link rel="stylesheet" type="text/css" href="../../Desktop/public_html/style/style_login.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <meta charset="utf-8">
    <title>Beispiel</title>
</head>
<body>
<?php
session_start();
$logged_user = $_SESSION['username'];
$date = date("Y-m-d h:i:sa");

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
        <a href="?page=posts&action=news">Neuigkeiten</a>
        <?php
        if(isset($logged_user)) {
			echo "<a href='?page=posts&action=create'>Post erstellen</a>";
            echo "<a href='?page=profile&user=$logged_user'>Profil</a>";
			echo "<a href='?page=news&action=view'>Das hast du verpasst</a>";
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
    case"news":
        include "./functions/news/index.php";
        break;
    default:
        include"./functions/posts/view.php";
}
?>
</body>
</html>