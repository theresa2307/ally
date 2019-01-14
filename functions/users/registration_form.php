<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../style/style_registration.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body>

<div id="loginbox">
    <div id="loginheader">ally</div>
    <div id="login">
        <form action="./functions/users/registration_do.php" method="post">
			<div id="ueberschrift">Registrierung</div>
            <input type="text" id="email" name="email" placeholder="Email" required><br>
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="passwort" name="password" placeholder="Passwort" required><br>
            <input type="password" id="passwort_wiederholen" name="password2" placeholder="Passwort wiederholen" required><br>
            <input type="submit" class="button" value="anmelden">
        </form>
    </div>
    <div id="loginfooter">
        <div id="loginfooter_text">
            Schon einen Account?
        </div>
        <div id="loginfooter_button">
            <input type="button" id="button_login" value="Login" onclick="window.location.href='login_form.php'" />
        </div>
    </div>
</div>

</body>
</html>
