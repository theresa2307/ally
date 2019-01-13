<?php
session_start();
include ('../../database.php');
$suchen= $_POST["q"]; //q->abfragen
$db = new PDO($host, $user, $password);
$statement = $db->prepare("SELECT * FROM profiles WHERE username LIKE '%$suchen%'"); // alle profile mit suchbegriff werden gesucht, %Platzhalter zb test wird auch test2 angezeigt
$result = $statement->execute();

if($statement->rowCount() > 0) { //wird geschaut, ob er was in der db gefunden hat, rowCount-> anzahl der spalten, wenn er was gefunden hat >0

    while ($userdb = $statement->fetchObject()) { //alles was gefunden wurde, wird ausgegeben
        echo '<a href="https://mars.iuk.hdm-stuttgart.de/~ts175/index.php?page=profile&user=' . $userdb->username . '">' . $userdb->username . '</a>';
        echo "<br>";
    }
}else echo "nichts gefunden";
?>
