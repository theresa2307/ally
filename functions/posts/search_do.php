<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style_search_results.css" />
	</head>
	<body>
		<div class="content_box">
		<div class="search_results_header">
			<div class="search_results_header_title"><h2>Suchergebnisse</h2></div>
		</div>
			<?php
			session_start();
			include ('database.php');
			$suchen= $_GET["q"]; //q->abfragen
			$db = new PDO($host, $user, $password);
			$statement = $db->prepare("SELECT * FROM profiles WHERE username LIKE '%$suchen%'"); //alle profile mit suchbegriff werden gesucht,% Platzhalter zb. test wird auch test2 angezeigt
			$result = $statement->execute();

			if($statement->rowCount() > 0) { //wird geschaut, ob er was in der db gefunden hat, rowcount->anzahl der spalten, wenn er was gefunden hat >0
			
					while ($userdb = $statement->fetchObject()) { // alles was gefunden wurde, wird ausgegeben
						
						echo "<div class='search_results_body'>";
						echo "<a class='search_results_body_pic' href='?page=profile&user=$userdb->username'><img src='./functions/profil/uploads/files/$userdb->datei'style='height:100px; width:100px;'/></a>";
						echo '<a class="search_results_body_username" href="?page=profile&user=' . $userdb->username . '">' . $userdb->username . '</a></div>';
					
						
					}
				}else echo "Kein Mitglied gefunden";
				?>
		</div>
	</body>
</html>