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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>
<body>
<div class="header">
    <h1> Registration</h1>
</div>

<form method="post" action="register.php">
    <table>
        <tr>
            <td>Username:</td>
            <td>< input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>< input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>< input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>Password again:</td>
            <td>< input type="password" name="password 2" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td>< input type="submit" name="register_btn" value="Register"></td>
        </tr>
    </table>
</form>
</body>
</html>