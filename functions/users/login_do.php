<?php
session_start();
include ('../../database.php');
$pdo= new PDO($host, $user, $password);
$username= $_POST['username'];
$passwort=$_POST['passwort'];
$statement= $pdo->prepare("SELECT * FROM users WHERE username=:username"); //vorbereitet
$statement->execute(array('username'=> $username));
$user2=$statement->fetch(); // auslesen aus der DB und speichern in der variable user
    if ($user2 !== false && password_verify($passwort, $user2['password'])){
        $_SESSION['username']=$user2['username'];
    } //überprüft wenn es den nutzer schon gibt, 1. wird übermittelt, 2. ist in der DB hinterlegt, verify funktion schaut ob die beiden die gleichen sind, und rückgängig
    else {
        header ("Location:../../index.php");
    }
?>

<html>
<body>
<div><a href="logout.php">logout</a></div>
</body>
</html>