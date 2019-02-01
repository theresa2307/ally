<?php
session_start();
include('../../database.php');
$pdo=new PDO ($host, $user, $password);

$username =$_POST[".$new_path."];
$logged_user = htmlspecialchars($_SESSION['username']);
$post = htmlspecialchars($_POST['post']);
$posttitle = htmlspecialchars($_POST['posttitle']);
$date = date("Y-m-d H:i:sa"); //datum wird erfasst, ermittelt die serverzeit und wird in db hochgeladen


$upload_folder = 'uploads/files/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME); //Dateiname
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION)); //dass alles klein geschrieben ist
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif'); // wenn es nicht im array drin ist, also keine der endung entspricht, bricht es ab -> die
if (!isset($filename)) {
	if(!in_array($extension, $allowed_extensions)) {
	 die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
	}
}
 
//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if (!isset($filename)) {
if($_FILES['datei']['size'] > $max_size) {
 die("Bitte keine Dateien größer 500kb hochladen");
}
}

//Überprüfung dass das Bild keine Fehler enthält
if (!isset($filename)) {
if(function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
 $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
 $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
 if(!in_array($detected_type, $allowed_types)) {
 die("Nur der Upload von Bilddateien ist gestattet");
 }
}
}
 
//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;
$db_path= $filename.'.'.$extension;

if (isset($filename)) { //die schleife schaut, ob ein bild hochgeladen wird, wenn ja dann 1. befehl. datei wird hochgeladen
$statement = $pdo->prepare("INSERT INTO posts (datei, username, datum, text, titel) VALUES (:db_path, :username, :date, :post, :title)"); //SQL Befehl, datum wird eingefügt

$statement->bindParam(':db_path', $db_path); //bindparam verbindet platzhalter mit dem array mit :, nachträglich eingefügt
$statement->bindParam(':username', $logged_user);
$statement->bindParam(':date', $date);
$statement->bindParam(':post', $post);
$statement->bindParam(':title', $posttitle);
$statement->execute();
}else { // wenn nein wird keine datei hochgeladen
$statement = $pdo->prepare("INSERT INTO posts (username, datum, text, titel) VALUES (:username, :date, :post, :title)"); //SQL Befehl

$statement->bindParam(':username', $logged_user);
$statement->bindParam(':date', $date);
$statement->bindParam(':post', $post);
$statement->bindParam(':title', $posttitle);
$statement->execute();
}

if(!isset($filename)){
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}
}
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES ['datei']['tmp_name'], $new_path);
echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
header('Location: ../../index.php');
?>