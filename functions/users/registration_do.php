<?php
include('../../database.php');
$db=new PDO ($host, $user, $password); //stellt die DBVerbindung her
$error = false;
$username = htmlspecialchars($_POST['username']); // htmlspecialchars spezielle Zeichen werden verwandelt
$email = htmlspecialchars($_POST['email']);
$userpass = htmlspecialchars($_POST['password']);
$userpass2 = htmlspecialchars($_POST['password2']);
if(strlen($userpass) == 0) { //stringlength überprüft die länge vom passwort
    $error = true;
    echo "Bitte ein Passwort eingeben";
    header("Location: ../../index.php");
}
if($userpass !== $userpass2) { // != -> nicht gleich, == soll überprüfen, ob sie gleich sind
    $error = true;
    echo "Passwörter stimmen nicht überein";
}
if(!$error) { //if-schleife -> wenn keine fehlermeldung kam, also error nicht true dann -> überprüft ob username schon existiert
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $userdb = $statement->fetch();
    if($userdb !== false) { //fehlermeldung username vergeben
        $error = true;
        echo "Username bereits vergeben";
    }
}
if(!$error) { // keine fehlermeldung, läd den user hoch in die user- db
    $password_hash = password_hash($userpass, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)"); //username,passwort und email wird in die db tabelle eingefügt
    $result = $statement->execute(array('username' => $username, 'password' => $password_hash, 'email' => $email));
    $statement = $db->prepare("INSERT INTO profiles (username) VALUES (:username)"); // profil wird erstellt/vorbereitet -> prepare
    $result = $statement->execute(array('username' => $username)); //execute-> befehl wird ausgeführt
    $db = null; //db-verbindung wird geschlossen
    if($result) { //wenn erfolgreich -> kommt man auf die startseite
        header("Location: ../../index.php");
    } else { //fehlermeldung
        echo 'Beim Abspeichern ist ein Fehler aufgetreten';
        header("Location: ../../index.php");
    }
}
?>