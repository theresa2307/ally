<?php
session_start();
include ('../../database.php');
$suchen= $_POST["q"]; //q->abfragen
$db = new PDO($host, $user, $password);
$statement = $db->prepare("SELECT * FROM profiles WHERE username LIKE '%$suchen%'");
$result = $statement->execute();

if($statement->rowCount() > 0) {

    while ($userdb = $statement->fetchObject()) {
        echo '<a href="https://mars.iuk.hdm-stuttgart.de/~ts175/index.php?page=profile&user=' . $userdb->username . '">' . $userdb->username . '</a>';
        echo "<br>";
    }
}else echo "nichts gefunden";
?>
