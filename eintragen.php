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
<?php

$statement = $pdo->prepare("INSERT INTO users (email, username, password, password2) 
                VALUES (:email, :username, :password, :password2)");

$statement->bindParam(':email', $_POST["email"]);
$statement->bindParam(':username', $_POST["username"]);
$statement->bindParam(':password', $_POST["password"]);
$statement->bindParam(':password2', $_POST["password2"]);
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