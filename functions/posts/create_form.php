<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
    <link rel="stylesheet" type="text/css" href="style/style_create_form.css" />
</head>
<body>

<div id="content_box">
    <?php
    if (isset($logged_user)) { // wird nur angezeigt, wenn man einhgeloggt ist
        ?>
        <form id="post_form" action="./functions/posts/create_do.php" method="post" enctype="multipart/form-data">
            <div id="post_ueberschrift"><h2>Neuen Beitrag verfassen</h2></div>
            <input id="textarea_titel" type="text" placeholder="Titel" name="posttitle" required></br>
            <textarea id="textarea" name='post' placeholder='Was willst du posten?' rows='10' required></textarea></br>
            <input id="button_datei_uplaod" type="file" name="datei"></p>
            <input id="button_hochladen"type="submit" value="hochladen"></p>
        </form>
        <?php
    }else echo "Bitte zuerst <a href='?page=users&action=login'>einloggen</a>";
    ?>
</div>
</body>
</html>

