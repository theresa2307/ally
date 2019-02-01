<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style_create_form.css" />
</head>
<body>
	
	<div class="content_box">
		<?php
			if (isset($logged_user)) { // wird nur angezeigt, wenn man einhgeloggt ist
		?>
		<form action="./functions/posts/create_do.php" method="post" enctype="multipart/form-data">
			<div class="post_form_header">
				<div class="post_form_header_title"><h2>Neuen Beitrag verfassen</h2></div>
			</div>
			<div class="post_form_body">
				<div class="post_form_body_padding">
					<input class="post_form_body_title" type="text" placeholder="Titel" name="posttitle" required></br>
					<textarea class="post_form_body_text" name='post' placeholder='Was willst du posten?' rows='10' required></textarea></br>
					<input class="post_form_body_upload" type="file" name="datei"></p>
					<input class="post_form_body_posten" type="submit" value="posten"></p>
				</div>
			</div>
		</form>
		<?php
		}else echo "Bitte zuerst <a href='?page=users&action=login'>einloggen</a>";
		?>
	</div>
</body>
</html>

