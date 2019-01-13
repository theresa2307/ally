<?php
session_start();
$logged_user = $_SESSION['username'];
$defollow = $_POST['defollow'];
include('../../database.php');

$db = new PDO($host, $user, $password);
$statement = $db->prepare("DELETE FROM follower WHERE username = '".$logged_user."' AND follows = '".$defollow."'");
$result = $statement->execute();
$db = null;
header ('Location: ../../index.php')
	
?>