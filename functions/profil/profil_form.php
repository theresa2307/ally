<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
</head>
<body>
<div id="content">
    <?php
    include ('database.php');

    $db = new PDO($host, $user, $password);
    $sql = "SELECT * FROM profiles WHERE username LIKE '".$logged_user."'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $db = null;
    while ($zeile = $statement->fetchObject()) {
        echo "<form action='./functions/profil/profil_do.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='text' name='full_name' placeholder='Username' value='$zeile->name'/>"; //wird aus der db ausgelesen
        echo "<textarea name='bio' placeholder='Über mich' rows='10'>$zeile->bio</textarea>";
        echo "<input type='file' name='datei'>";
        echo "<input type='submit' class='button' value='speichern'>";
        echo "</form>";
    }
    ?>
</div>
</body>
</html>