<?php
session_start();
include ('../../database.php');
$username = $_POST["username"];
$userpass = $_POST["password"];
$db = new PDO($host, $user, $password);
$statement = $db->prepare("SELECT * FROM users WHERE username = :username");
$result = $statement->execute(array('username' => $username));
$userdb = $statement->fetch(PDO::FETCH_ASSOC);
if (password_verify($userpass, $userdb['password'])) {
    $_SESSION['username'] = $userdb['username'];
    echo $_SESSION['username'];
    header("Location: ../../index.php");
} else {
    echo "Fehler bei Login";
}
?>