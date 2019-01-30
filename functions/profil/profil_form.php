<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style_profil_form.css" />
</head>
<body>
	<div class="content_box">
		<?php
			include ('database.php');

			$db = new PDO($host, $user, $password);
			$sql = "SELECT * FROM profiles WHERE username LIKE '".$logged_user."'";
			$statement = $db->prepare($sql);
			$statement->execute();
			$db = null;
			while ($zeile = $statement->fetchObject()) {
				echo "<form action='./functions/profil/profil_do.php' method='post' enctype='multipart/form-data'>";?>
		
			<div class="profil_form_header">
				<div class="profil_form_header_title">
					<h2>Profil bearbeiten</h2>
				</div>
			</div>
			<div class="profil_form_body">
				<?php
						echo "<input class='profil_form_body_username' type='text' name='full_name' placeholder='Username' value='$zeile->name'/>"; //wird aus der db ausgelesen
						echo "<textarea class='profil_form_body_bio' name='bio' placeholder='Über mich' rows='10'>$zeile->bio</textarea>";
						echo "<input class='profil_form_body_upload' type='file' name='datei'>";
						echo "<input class='profil_form_body_speichern' type='submit' class='button' value='speichern'>";
						echo "</form>";
					}
				?>
			</div>
	</div>
</body>
</html>