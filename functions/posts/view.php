<?php
include('database.php');
$pdo= new PDO($host, $user, $password); //datenbankverbindung hergestellt
$query = $pdo->prepare ("SELECT * FROM posts ORDER BY datum DESC");// Datenbankbefehl hochladen,Sternchen bedeutet alles auslesen
$query->execute(); //Befehl ausführen
while ($zeile=$query->fetchObject()){
    echo "<span>$zeile->titel</span>";
    echo "<span>$zeile->text</span>"; //liest alle posts aus aus der DB
} //liest alles aus der datenbank aus und fügt es ins objekt ein, while-> solange bis was passiert
