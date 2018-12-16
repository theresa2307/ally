<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../style/style_login.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <meta charset="utf-8">
</head>

<body>
<div id="loginbox">
    <div id="loginheader">ally</div>
    <div id="login"
    <form id="formular" action="./functions/users/login_do.php" method="post">
        <div id="ueberschrift">Login</div>
        <div id="linie_anfang"></div>
        <input type="text" id="username" name="username" placeholder="Username"><br>
        <input type="password" id="passwort" name="passwort" placeholder="Passwort"><br>
        <a href="passwort_vergessen.php" id="passwort_vergessen">Passwort vergessen</a>
        <input type="submit" class="button" value="anmelden">
        <div id="linie_ende"></div>
    </form>
    </div>
    <div id="loginfooter">
        <div id="loginfooter_text">
            Noch keinen Account?
        </div>
        <div id="loginfooter_button">
            <input type="button" id="button_registrieren" value="Registrieren" onclick="window.location.href='registration_form.php'" />
        </div>
    </div>
</div>

</body>
</html>