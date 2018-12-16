<?php
include ('../../database.php');
$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
$passwordeingabe = ($_POST["passwort"]);
$db = new PDO($host, $user, $password);
$sql = "SELECT * FROM users WHERE username = :username"; //vorbereitet
$query = $db->prepare($sql);
$query->bindParam(':username', $username);
$query->execute();
while ($zeile = $query->fetchObject()) { // auslesen aus der DB und speichern in der variable user
    $passwordausDB = $zeile->password;
    $userIDausDB = $zeile->id;
    $usernameausDB = $zeile->username;
}
if(password_verify($passwordeingabe, $passwordausDB)) { //überprüft wenn es den nutzer schon gibt, 1. wird übermittelt, 2. ist in der DB hinterlegt, verify funktion schaut ob die beiden die gleichen sind, und rückgängig

    session_start();
    $_SESSION["username"] = $usernameausDB;
    $_SESSION["id"] = $userIDausDB;
    header ('Location: ../../index.php');
} else {
    echo "Login fehlgeschlagen. Du wirst zurück zum Login geleitet.";
    header ("refresh:4;url=../../index.php"); //refresh:4 -> schickt dich nach 2sek wieder zurück
}
?>

<html>
<body>
<div><a href="logout.php">logout</a></div>
</body>
</html>

