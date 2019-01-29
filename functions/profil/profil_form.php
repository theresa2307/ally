<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
    <link rel="stylesheet" type="text/css" href="style/style_profil_form.css" />
</head>
<body>
<div id="content_box">
    <?php
    include ('database.php');

    $db = new PDO($host, $user, $password);
    $sql = "SELECT * FROM profiles WHERE username LIKE '".$logged_user."'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $db = null;
    while ($zeile = $statement->fetchObject()) {
        echo "<form id='profil_form' action='./functions/profil/profil_do.php' method='post' enctype='multipart/form-data'>";?>
        <div id="profil_ueberschrift"><h2>Profil bearbeiten</h2></div>
        <?php
        echo "<input id='profil_username' type='text' name='full_name' placeholder='Username' value='$zeile->name'/>"; //wird aus der db ausgelesen
        echo "<textarea id='profil_bio' name='bio' placeholder='Über mich' rows='10'>$zeile->bio</textarea>";
        echo "<input id='profil_datei_upload' type='file' name='datei'>";
        echo "<input id='profil_button_speichern' type='submit' class='button' value='speichern'>";
        echo "</form>";
    }
    ?>
</div>
</body>
</html>