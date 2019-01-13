<?php
session_start();
$logged_user = $_SESSION['username']; //eingeloggte username wird ausgelesen
$defollow = $_POST['defollow']; //aus dem formular
include('../../database.php');

$db = new PDO($host, $user, $password);
$statement = $db->prepare("DELETE FROM follower WHERE username = '".$logged_user."' AND follows = '".$defollow."'");
$result = $statement->execute();
$db = null;
header ('Location: ../../index.php')
	
?>