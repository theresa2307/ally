<?php
session_start();
$logged_user = $_SESSION['username'];
$full_name = $_POST['full_name'];
$bio = $_POST['bio'];
include ('../../database.php');
$db = new PDO($host, $user, $password);
$statement = $db->prepare("UPDATE profiles SET name= :name, bio= :bio WHERE username= :username");
$result = $statement->execute(array('name' => $full_name, 'bio' => $bio, 'username' => $logged_user));
$db = null;
header ('Location: ../../index.php')

?>