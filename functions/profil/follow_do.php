<?php
session_start();
$logged_user = $_SESSION['username'];
$follows = $_POST['follows'];
include('../../database.php');

$db = new PDO($host, $user, $password);
$statement = $db->prepare("INSERT INTO follower (username, follows) VALUES (:username, :follows)");
$result = $statement->execute(array('username' => $logged_user, 'follows' => $follows));
$db = null;
header ('Location: ../../index.php')
	
?>