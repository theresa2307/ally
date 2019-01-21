<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
</head>
<body>
<div id="content">
    <?php
    $get_user = $_GET['user']; //user=username wird übernommen und in eine variable gespeichert, get-user -> profil auf dem man grrade ist
    include ('database.php');
    $db = new PDO($host, $user, $password);

    if ($logged_user == $get_user) { //logged_user-> eingeloggte user
        echo "<a href='?page=profile&action=edit'>Profil bearbeiten</a>"; //wenn dem so ist, dann kann man das profil bearbeiten (sein eigenes)
    }

    $sql_follow = "SELECT * FROM follower WHERE username = '".$logged_user."' AND follows = '".$get_user."'"; // zieht sich information aus db
    $statement_follow = $db->prepare($sql_follow);
    $statement_follow->execute();

    if ($statement_follow->rowCount() > 0) { // schaut, ob etwas aus der db ausgelesen wird, wenn ja dann hat man die möglichkeit dem nutzer zu entfolgen
        echo "<form action='./functions/profil/defollow_do.php' method='post'>";
        echo "<input type='hidden' name='defollow' value='$get_user'>";
        echo "<input type='submit' value='Nutzer entfolgen'>";
    }elseif ($logged_user !== $get_user) { // wenn nichts angezeigt wird, kann man dem nutzer folgen
        echo "<form action='./functions/profil/follow_do.php' method='post'>";
        echo "<input type='hidden' name='follows' value='$get_user'>";
        echo "<input type='submit' value='Nutzer folgen'>";
    }

    echo "<h2>$get_user</h2><br><br>";

    $sql = "SELECT * FROM profiles WHERE username LIKE '".$get_user."'";
    $statement = $db->prepare($sql);
    $statement->execute();

    while ($zeile = $statement->fetchObject()) { //liest so lange aus bis nichts mehr gibt
        if(strlen($zeile->datei)>1) { //profilbild
            echo  "<img src='./functions/profil/uploads/files/$zeile->datei'/><br>"; //profilbild
        }
        echo "Name: $zeile->name <br>";
        echo "Bio: $zeile->bio<br>"; //profilname und Bio wird angegeben, ausgegeben
    }
    ?>
</div>
</body>
</html>