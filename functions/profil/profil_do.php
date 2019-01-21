<?php
session_start();

include('../../database.php');
$pdo=new PDO ($host, $user, $password);

$logged_user = $_SESSION['username']; // Nutzername wird aus session gelesen


$upload_folder = 'uploads/files/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME); //liest den filenamen aus
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION)); // liest die bildendung zb pdf,png aus. strtolower -> kleinbuchstaben
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if (!isset($filename)) { // profilbild
    if (!in_array($extension, $allowed_extensions)) { // wenn es nicht im array drin ist, also keine der endung entspricht, bricht es ab -> die
        die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }
}
//Überprüfung der Dateigröße
    $max_size = 500 * 1024; //500 KB
    if (!isset($filename)) {
        if ($_FILES['datei']['size'] > $max_size) {
            die("Bitte keine Dateien größer 500kb hochladen");
        }
    }

//Überprüfung dass das Bild keine Fehler enthält
    if (!isset($filename)) {
        if (function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
            $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
            if (!in_array($detected_type, $allowed_types)) {
                die("Nur der Upload von Bilddateien ist gestattet");
            }
        }
    }

//Pfad zum Upload
    $new_path = $upload_folder . $filename . '.' . $extension; //komplette Dateipfad
    $db_path = $filename . '.' . $extension; //nur die dateiname und endung in der db

//Neuer Dateiname falls die Datei bereits existiert
    if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
            $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
            $id++; //zahl wird um eisn erhöht
        } while (file_exists($new_path));
    }

//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES ['datei']['tmp_name'], $new_path);
    echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    $logged_user = $_SESSION['username']; //hier wird es in die db hochgeladen
    $full_name = htmlspecialchars($_POST['full_name']);
    $bio = htmlspecialchars($_POST['bio']);
    include('../../database.php');
    if (strlen($filename) > 1) { //profilbild
        $statement = $pdo->prepare("UPDATE profiles SET name= :name, bio= :bio, datei= :datei WHERE username= :username"); //profilbild
        $result = $statement->execute(array('name' => $full_name, 'bio' => $bio, 'username' => $logged_user, 'datei' => $db_path)); //profilbild
    } else {
        $statement = $pdo->prepare("UPDATE profiles SET name= :name, bio= :bio WHERE username= :username");
        $result = $statement->execute(array('name' => $full_name, 'bio' => $bio, 'username' => $logged_user));
    }
    $pdo = null;
    header("Location: ../../index.php?page=profile&user=$logged_user"); //profilbild

    ?>