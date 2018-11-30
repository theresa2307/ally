
<?php
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; 
 dbname=datenbankname', 'datenbanklogin', 'datenbankpasswort',
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
        echo $row['id'].' '.$row['vorname'].' '.$row['name']."<br>";
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

<?php

$statement = $pdo->prepare("INSERT INTO users (vorname, name) 
                VALUES (:vorname, :name)");

$statement->bindParam(':vorname', $_POST["vorname"]);
$statement->bindParam(':name', $_POST["name"]);
if($statement->execute()){
    echo 'id in der Datenbank: '.$id=$pdo->lastInsertId();
} else{
    echo 'Datenbank-Fehler:';
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}

?>
<br>
<a href="index.php">Zurück zur Startseite</a>
</body>
</html>
