<?php
session_start();
$logged_user = htmlspecialchars($_SESSION['username']);
$follows = htmlspecialchars($_POST['follows']);
include('../../database.php');

$db = new PDO($host, $user, $password); //fügt mein nutzername in die db (logged_user) und den nutzername, dem ich fole (get_user)
$statement = $db->prepare("INSERT INTO follower (username, follows) VALUES (:username, :follows)"); //vorbereitet, : bedeutet platzhalter
$result = $statement->execute(array('username' => $logged_user, 'follows' => $follows)); //ausgeführt
$db = null; // db ist weg
header ('Location: ../../index.php')
	
?>