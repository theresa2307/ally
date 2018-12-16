<?php
$host='mysql:: host=mars.iuk.hdm-stuttgart.de;dbname=u-ts175'; $user='ts175'; $password='ohngoow2Oo';
$pdo= new PDO($host, $user, $password); //datenbankverbindung hergestellt
$username= $_SESSION['username'];
$titel= $_POST['titel'];
$text=$_POST['text'];
$statement= $pdo->prepare("INSERT INTO posts (titel,text)VALUES (:titel,:text)"); //vorbereitet
$statement->execute(array('titel'=> $titel, 'text'=> $text)); //ausfgeführt
$pdo=null; //geschlossen
//header("Location: ../../index.php");

//username noch reinschreiben und datum!!!;


$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');

if(!in_array($extension, $allowed_extensions)) {
    die("Ungültige Dateiendung");
}

$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
if(!in_array($detected_type, $allowed_types)) {
    die("Nur der Upload von Bilddateien ist gestattet");
}

$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'] > $max_size) {
    die("Bitte keine Dateien größer 500kb hochladen");
}

$temporary_name = $_FILES['datei']['tmp_name'];
$extension = pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION);

//Überprüfung der Datei-Endung, MIME-Header Check etc.

function random_string() {
    if(function_exists('random_bytes')) {
        $bytes = random_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes(16);
        $str = bin2hex($bytes);
    } else if(function_exists('mcrypt_create_iv')) {
        $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $str = bin2hex($bytes);
    } else {
        //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
        $str = md5(uniqid('euer_geheimer_string', true));
    }
    return $str;
}

$name = random_string(); //random new name
$new_name = 'uploads/files/'.$name.'.'.$extension;
move_uploaded_file($temporary_name, $new_name);
echo "Bild hochgeladen nach: $new_name";


$upload_folder = 'uploads/files/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
    die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}

//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'] > $max_size) {
    die("Bitte keine Dateien größer 500kb hochladen");
}

//Überprüfung dass das Bild keine Fehler enthält
if(function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
    $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
    if(!in_array($detected_type, $allowed_types)) {
        die("Nur der Upload von Bilddateien ist gestattet");
    }
}

//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;

//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
    $id = 1;
    do {
        $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
        $id++;
    } while(file_exists($new_path));
}

//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
?>