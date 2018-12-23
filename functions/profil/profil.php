<?php
$get_user = $_GET['user'];

if ($logged_user == $get_user) {
    echo "<a href='?page=profile&action=edit'>Profil bearbeiten</a>";
}else echo "nicht gleiche user";

echo "<h2>$get_user</h2><br><br>";

include ('database.php');

$db = new PDO($host, $user, $password);
$sql = "SELECT * FROM profiles WHERE username LIKE '".$get_user."'";
$statement = $db->prepare($sql);
$statement->execute();

while ($zeile = $statement->fetchObject()) {
    echo "Name: $zeile->name <br>";
    echo "Bio: $zeile->bio <br><br>";
}
?>
