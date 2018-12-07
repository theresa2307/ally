<?php
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; 
 dbname=u-ts175', 'ts175', 'ohngoow2Oo',
    array('charset'=>'utf8'));
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../style/style_registration.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body>

<?php
session_start();
include "../../database.php";
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

<div id="loginbox">
    <div id="loginheader">ally</div>
    <div id="login">
        <form action="registration_do.php" method="post" id="formular">
            <div id="ueberschrift">Registrierung</div>
            <div id="linie_anfang"></div>
            <input type="text" id="email" name="email" placeholder="Email" style="text-align: left; line-height: 0px; padding-left: 10px;"><br>
            <input type="text" id="username" name="username" placeholder="Username" style="text-align: left; line-height: 0px;"><br>
            <input type="password" id="passwort" name="password" placeholder="Passwort" style="text-align: left; line-height: 0px;"><br>
            <input type="password" id="passwort_wiederholen" name="password2" placeholder="Passwort wiederholen" style="text-align: left; line-height: 0px;"><br>
            <button type="submit" class="button">Registrieren</button>
            <div id="linie_ende"></div>
            </form>
    </div>
    <div id="loginfooter">
        <div id="loginfooter_text">
            Schon einen Account?
        </div>
        <div id="loginfooter_button">
            <input type="button" id="button_login" value="Login" onclick="window.location.href='login_form.php'" />
        </div>
    </div>
</div>

</body>
</html>
