<?php
include ('database.php');

$db = new PDO($host, $user, $password);
$sql = "SELECT * FROM profiles WHERE username LIKE '".$logged_user."'";
$statement = $db->prepare($sql);
$statement->execute();
$db = null;
while ($zeile = $statement->fetchObject()) {
    echo "<form action='./functions/profil/profil_do.php' method='post'>";
    echo "<input type='text' name='full_name' placeholder='Name' value='$zeile->name'/>";
    echo "<textarea name='bio' placeholder='bio' rows='10'>$zeile->bio</textarea>";
    echo "<input type='submit' class='button' value='Bearbeiten'>";
    echo "</form>";
}
?>
<form action="./functions/profil/create_do.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
</form>
