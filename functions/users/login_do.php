<?php
session_start();
include ('../../database.php');
$username = htmlspecialchars($_POST["username"]); //Formular
$userpass = htmlspecialchars($_POST["password"]);
$db = new PDO($host, $user, $password); //dbverbindung wird hergestellt
$statement = $db->prepare("SELECT * FROM users WHERE username = :username"); //SQL-Befehl wählt alle aus users-spalte, wo username mit eingeloggten username übereinstimmt
$result = $statement->execute(array('username' => $username)); //platzhalter : wird verknüpft, sql injection für sicherheit
$userdb = $statement->fetch(PDO::FETCH_ASSOC); // fetch-> zieht sich alle ergebnisse der db aus und fetch_assoc-> speichert alles im array
if (password_verify($userpass, $userdb['password'])) { //funktion von php, überprüft ob passwort von db übereinstimmt -> verschlüsselt
    $_SESSION['username'] = $userdb['username']; //username aus der db wird in session gespeichert
    header("Location: ../../index.php"); //nach Login kommt man autom. auf die Startseite
} else {
    echo "Fehler bei Login";
}
?>