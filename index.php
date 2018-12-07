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
<h1>Namensliste</h1>
<h2>Liste</h2>
<?php
session_start();
include "database.php";
$pdo=new PDO ($host, $user, $password);
$statement = $pdo->prepare('SELECT * FROM users');
if($statement->execute()) {
    while($row=$statement->fetch()) {
        echo $row['email'].' '.$row['username'].' '.$row['password'].' '.$row['password2']."<br>";
    }
} else {
    echo 'Datenbank-Fehler:';
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
echo $_SESSION['username'];
?>

</body>
</html>

<h2>Neuen Namen eintragen</h2>
<form action="./functions/users/registration_do.php" method="post">
    Vorname: <input type="text" name="vorname">
    Nachname:<input type="text" name="name">
    <input type="submit">
</form>
<ul>
    <li>
        <a href="index.php">Home</a>
        <a href="?page=users&action=login">Login</a>
        <a href="?page=users&action=registrierung">Registrierung</a>
        <a href="?page=posts&action=create">Post erstellen</a>
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
    default:
        include"./functions/posts/view.php";
}
?>
</body>
</html>