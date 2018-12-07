<?php
include('../../database.php');
$pdo=new PDO ($host, $user, $password);
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Beispiel</title>
</head>
<body>
<?php
$password =$_POST["password"];
$password_hash = password_hash($password, PASSWORD_DEFAULT); //funktion, die zufallhash generiert
$statement = $pdo->prepare("INSERT INTO users (email, username, password, password2) 
                VALUES (:email, :username, :password, :password2)");

$statement->bindParam(':email', $_POST["email"]);
$statement->bindParam(':username', $_POST["username"]);
$statement->bindParam(':password', $password_hash); //läd nicht das password hoch
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
<a href="../../index.php">zurück zur Startseite</a>
</body>
</html>