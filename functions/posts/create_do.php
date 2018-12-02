<?php
include('../../database.php');
$pdo= new PDO($host, $user, $password); //datenbankverbindung hergestellt
$username= $_SESSION['username'];
$titel= $_POST['titel'];
$text=$_POST['text'];
$statement= $pdo->prepare("INSERT INTO posts (titel,text)VALUES (:titel,:text)"); //vorbereitet
$statement->execute(array('titel'=> $titel, 'text'=> $text)); //ausfgeführt
$pdo=null; //geschlossen
header("Location: ../../index.php");

//username noch reinschreiben und datum!!!
?>



