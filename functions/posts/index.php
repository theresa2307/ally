<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style/style_profil.css" />
    </head>
    <body>
    <div id="content">
    <?php
    switch ($_GET["action"]){ // url wird ausgelesen, bei create wird formular angezeigt
        case"create":
            include"./functions/posts/create_form.php";
            break;}
    ?>
    </div>
    </body>
</html>
