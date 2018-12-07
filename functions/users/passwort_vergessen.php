<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../style/style_passwort_vergessen.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <meta charset="utf-8">
</head>

<body>
<div id="loginbox">
    <div id="loginheader">ally</div>
    <div id="login">
        <form id="formular" action="passwort_vergessen_do.php" method="post">
            <div id="ueberschrift">Passwort vergessen</div>
            <div id="linie_anfang"></div>
            <input type="text" id="email" name="email" placeholder="Email"><br>
            <input type="text" id="username" name="username" placeholder="Username"><br>
            <button type="submit" class="button">Passwort neu anfordern</button>
            <div id="linie_ende"></div>
        </form>
    </div>
    <div id="loginfooter">
        <div id="loginfooter_text">
            Noch keinen Account?
        </div>
        <div id="loginfooter_button">
            <input type="button" id="button_login" value="Login" onclick="window.location.href='login_form.php'" />
        </div>
    </div>
</div>

</body>
</html>
