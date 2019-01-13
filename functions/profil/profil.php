<?php
$get_user = $_GET['user'];
include ('database.php');
$db = new PDO($host, $user, $password);

if ($logged_user == $get_user) {
    echo "<a href='?page=profile&action=edit'>Profil bearbeiten</a>";
}else echo "nicht gleicher user";

$sql_follow = "SELECT * FROM follower WHERE username = '".$logged_user."' AND follows = '".$get_user."'";
$statement_follow = $db->prepare($sql_follow);
$statement_follow->execute();

if ($statement_follow->rowCount() > 0) {
  	echo "<form action='./functions/profil/defollow_do.php' method='post'>";
	echo "<input type='hidden' name='defollow' value='$get_user'>";
	echo "<input type='submit' value='Nutzer entfolgen'>";
}elseif ($logged_user !== $get_user) {
	echo "<form action='./functions/profil/follow_do.php' method='post'>";
	echo "<input type='hidden' name='follows' value='$get_user'>";
	echo "<input type='submit' value='Nutzer folgen'>";
}

echo "<h2>$get_user</h2><br><br>";

$sql = "SELECT * FROM profiles WHERE username LIKE '".$get_user."'";
$statement = $db->prepare($sql);
$statement->execute();

while ($zeile = $statement->fetchObject()) {
    echo "Name: $zeile->name <br>";
    echo "Bio: $zeile->bio <br><br>";
}
?>
