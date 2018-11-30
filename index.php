<?php
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; 
 dbname=u-ts175', 'ts175', 'ohngoow2Oo',
    array('charset'=>'utf8'));
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Beispiel</title>
</head>
<body>
<h1>Namensliste</h1>
<h2>Liste</h2>
<?php
session_start();
include "database.php";
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
?>
<h2>Neuen Namen eintragen</h2>
<form action="eintragen.php" method="post">
    Vorname: <input type="text" name="vorname">
    Nachname:<input type="text" name="name">
    <input type="submit">
</form>
</body>
</html>

<h2>Neuen Namen eintragen</h2>
<form action="registrierung.html" method="post">
    Vorname: <input type="text" name="vorname">
    Nachname:<input type="text" name="name">
    <input type="submit">
</form>
</body>
</html>