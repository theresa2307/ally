<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
</head>
<body>
<div class="content_box">
    <?php
    $get_user = $_GET['user']; //user=username wird übernommen und in eine variable gespeichert, get-user -> profil auf dem man grrade ist
    include ('database.php');
    $db = new PDO($host, $user, $password);

    /*if ($logged_user == $get_user) { //logged_user-> eingeloggte user
        echo "<div id='profil_bearbeiten'><a href='?page=profile&action=edit'>Profil bearbeiten</a></div>"; //wenn dem so ist, dann kann man das profil bearbeiten (sein eigenes)
    }*/

    $sql_follow = "SELECT * FROM follower WHERE username = '".$logged_user."' AND follows = '".$get_user."'"; // zieht sich information aus db
    $statement_follow = $db->prepare($sql_follow);
    $statement_follow->execute();
	echo "<div class='profil_header'>";

    if ($statement_follow->rowCount() > 0) { // schaut, ob etwas aus der db ausgelesen wird, wenn ja dann hat man die möglichkeit dem nutzer zu entfolgen
        echo "<form action='./functions/profil/defollow_do.php' method='post'>";
        echo "<input type='hidden' name='defollow' value='$get_user'>";
        echo "<input class='profil_header_folgen' type='submit' value='Nutzer entfolgen'>";
    }elseif ($logged_user !== $get_user) { // wenn nichts angezeigt wird, kann man dem nutzer folgen
        echo "<form action='./functions/profil/follow_do.php' method='post'>";
        echo "<input type='hidden' name='follows' value='$get_user'>";
        echo "<input class='profil_header_entfolgen' type='submit' value='Nutzer folgen'>";
    }
	?>
	<?php
	 echo "<div class='profil_header_username'><h2>$get_user</h2></div>";

    $sql = "SELECT * FROM profiles WHERE username LIKE '".$get_user."'";
    $statement = $db->prepare($sql);
    $statement->execute();
	
	if ($logged_user == $get_user) { //logged_user-> eingeloggte user
        echo "<div class='profil_header_profil_bearbeiten'><a href='?page=profile&action=edit'>Profil bearbeiten</a></div></div>"; //wenn dem so ist, dann kann man das profil bearbeiten (sein eigenes)
    }
		
	echo "<div class='profil_body'>";
    while ($zeile = $statement->fetchObject()) { //liest so lange aus bis nichts mehr gibt
        if(strlen($zeile->datei)>1) { //profilbild
            echo  "<div class='profil_body_pic'><img src='./functions/profil/uploads/files/$zeile->datei'/></div>"; //profilbild
        }
		?>
	<div class="profil_body_text">
	<?php

        echo "<b>Name:</b> $zeile->name <br>";
        echo "<b>Bio:</b> $zeile->bio<br>"; //profilname und Bio wird angegeben, ausgegeben
    }
	 echo "</div></div>";
    ?>
</div>
</body>
</html>