<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style/style_posts.css" />
    </head>
    <body>
		<div class="content_box">
        <?php
        include('database.php');
        $pdo= new PDO($host, $user, $password);
        $follower_array = array(); //macht ein array auf
        $query_follow = $pdo->prepare("SELECT * FROM follower WHERE username= :username"); //db-verbindung, query -> abfrage
        $query_follow->execute(array('username' => $logged_user)); //liest alles aus der follower-db aus
        while ($follower_dump = $query_follow->fetch(PDO::FETCH_ASSOC) // alle ausgaben aus der db wird im array gespeichert
        ) {
            array_push($follower_array, $follower_dump['follows']); // wird dem follow_array hinzugefügt, follower_dump -> sind alle db-ausgaben drin, also alle follower
        }

        $follower_array2 = join("','",$follower_array); // es soll alle post von mir und denen ich folge angezeigt werden, follower_array2=join-> dass es rcihtig ausgelesen werden kann
        $query = $pdo->prepare ("SELECT * FROM posts WHERE username IN ('$follower_array2') OR username= :username ORDER BY datum DESC"); //nach datum sortiert
        $query->execute(array('username' => $logged_user)); // liest alles aus post aus der db
        $query2 = $pdo->prepare ("SELECT * FROM profiles WHERE username IN ('$follower_array2') OR username= :username"); //
        $query2->execute(array('username' => $logged_user)); //liest alle saus der db spalte des nutzername oder wo der nutezrname gleich dem nutezrname ist
        $zeile2=$query2->fetchObject();		

        while ($zeile=$query->fetchObject()){ //alles was in der db steht, alle post werden ausgelesen, was oben gesucht wird bei query
		
			/*echo "<div class='post_box'>";*/

			echo "<div class='post_header' style='height:50px; background-color:#888;'>";


            if ($zeile2->username == $zeile->username and (strlen($zeile2->datei)>1)) { //profilbild wird ausgelesen vom profilverfasser
               echo "<a class='post_header_userpic' href='?page=profile&user=$zeile->username'><img style='width:50px; height:50px; border-radius:100%;' src='./functions/profil/uploads/files/$zeile2->datei'/></a>"; //bild wird angezeigt und verlinkt
           } 
		
			echo "<a class='post_header_username' href='?page=profile&user=$zeile->username'>$zeile->username</a>";
			
			
			
			echo "</div><div class='post_body'>";
            echo "<div class='post_body_title'><b>$zeile->titel</b></div>"; //titel, nutzername wird angezeigt und nutzername wird verlinkt auf profil

			if (strlen($zeile->datei)>1) { //bild vom post wird ausgelesen
                echo "<div class='post_body_pic'><img src='./functions/posts/uploads/files/$zeile->datei'/></div>";
            }
			
            echo "<div class='post_body_text'>$zeile->text</div></div>"; // text vom post wird ausgelesen
			
        }
        ?>
		</div>
				
    </body>
</html>
