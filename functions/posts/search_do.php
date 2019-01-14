<?php
session_start();
include ('database.php');
$suchen= $_GET["q"]; //q->abfragen
$db = new PDO($host, $user, $password);
$statement = $db->prepare("SELECT * FROM profiles WHERE username LIKE '%$suchen%'"); //alle profile mit suchbegriff werden gesucht,% Platzhalter zb. test wird auch test2 angezeigt
$result = $statement->execute();

if($statement->rowCount() > 0) { //wird geschaut, ob er was in der db gefunden hat, rowcount->anzahl der spalten, wenn er was gefunden hat >0

    while ($userdb = $statement->fetchObject()) { // alles was gefunden wurde, wird ausgegeben
        echo '<a href="?page=profile&user=' . $userdb->username . '">' . $userdb->username . '</a>';
        echo "<br>";
    }
}else echo "Kein Mitglied gefunden";
?>