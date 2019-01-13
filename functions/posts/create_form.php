<?php

if (isset($logged_user)) {

	?>
<form action="./functions/posts/create_do.php" method="post" enctype="multipart/form-data">
<input type="text" name="posttitle" required>
<textarea name='post' placeholder='Was willst du posten?' rows='10' required></textarea>
<input type="file" name="datei"><br>
<input type="submit" value="Hochladen">
</form>

<?php
	
}else echo "bitte erst einloggen!";