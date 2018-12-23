<?php
include('../../database.php');
$db=new PDO ($host, $user, $password);
$error = false;
$username = htmlspecialchars($_POST['username']); // htmlspecialchars spezielle Zeichen werden verwandelt
$email = htmlspecialchars($_POST['email']);
$userpass = htmlspecialchars($_POST['password']);
$userpass2 = htmlspecialchars($_POST['password2']);
if(strlen($userpass) == 0) {
    $error = true;
    echo "Bitte ein Passwort eingeben";
    header("Location: ../../index.php");
}
if($userpass != $userpass2) {
    $error = true;
    echo "Passwörter stimmen nicht überein";
}
if(!$error) {
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $userdb = $statement->fetch();
    if($userdb !== false) {
        $error = true;
        echo "Username bereits vergeben";
    }
}
if(!$error) {
    $password_hash = password_hash($userpass, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $result = $statement->execute(array('username' => $username, 'password' => $password_hash, 'email' => $email));
    $statement = $db->prepare("INSERT INTO profiles (username) VALUES (:username)");
    $result = $statement->execute(array('username' => $username));
    $db = null;
    if($result) {
        header("Location: ../../index.php");
    } else {
        echo 'Beim Abspeichern ist ein Fehler aufgetreten';
        header("Location: ../../index.php");
    }
}
?>