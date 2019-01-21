<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
</head>
<body>
<div id="content">
    <?php

if (isset($logged_user)) { // wird nur angezeigt, wenn man einhgeloggt ist

?>
<form action="./functions/posts/create_do.php" method="post" enctype="multipart/form-data">
<input type="text" placeholder="Titel" name="posttitle" required>
<textarea name='post' placeholder='Was willst du posten?' rows='10' required></textarea>
<input type="file" name="datei"><br>
<input type="submit" value="hochladen">
</form>

<?php
	
}else echo "Bitte zuerst <a href='?page=users&action=login'>einloggen</a>";
?>
</div>
</body>
</html>

