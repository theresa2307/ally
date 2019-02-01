<!doctype html>
<html lang="de">
<head>

    <!-- Einbindung Stylesheet-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">


    <link rel="stylesheet" type="text/css" href="style/style_index.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <meta charset="utf-8">
    <title>ally</title>
</head>
<body>
<?php
session_start();
$logged_user = $_SESSION['username'];
?>
<div id="header">
	<div id="logo_mobil">ally</div>
    <div id="header_content">
        <a href="index.php"><div id="logo">ally</div></a>
		<div id="suchform">
			<?php
			if (isset($logged_user)) {
			include_once('./functions/posts/search_form.php');
			}
			?>
		</div>
			<!--<div class="navigation">
            <ul>-->
                <?php
                /*if (isset($logged_user)) {
                    echo "<li><a href='?page=users&action=logout'><i class=\"fas fa-sign-out-alt\"></i> Logout</a></li>";
                    echo "<li><a href='?page=posts&action=create'><i class=\"fas fa-plus\"></i> Neuer Beitrag</a></li>";
                    echo "<li><a href='?page=profile&user=$logged_user'><i class=\"fas fa-user\"></i> Mein Profil</a></li>";
					echo "<li><a href='index.php'><i class='fas fa-home'></i> Startseite</a></li>";
                }*/
                ?>
				
					<nav id="nav" role="navigation">
						<a href="#nav" title="Show Menu"><i class="fas fa-bars"></i></a>
						<a href="#" title="Hide Menu"><i class="fas fa-bars"></i></a>
						<ul>
							<?php
								if (isset($logged_user)) {
									echo "<li><a href='?page=users&action=logout'><i class=\"fas fa-sign-out-alt\"></i> Logout</a></li>";
									echo "<li><a href='?page=posts&action=create' aria-haspopup='true'><i class=\"fas fa-plus\"></i> Neuer Beitrag</a></li>";
									echo "<li><a href='?page=profile&user=$logged_user' aria-haspopup='true'><i class=\"fas fa-user\"></i> Mein Profil</a></li>";
									echo "<li><a href='index.php'><i class='fas fa-home'></i> Startseite</a></li>";
								}
                			?>
						</ul>
					</nav>
			<!--</ul>
			</div>-->
		</div>
        
	</div>
</div>

<div id="content">
    <?php
    if (isset($_GET['q'])){ //suche, get-> dass man NUR den findet, den man sucht, q -> abfragen
        include('./functions/posts/search_do.php');
    }elseif (!isset($logged_user)) {
        switch ($_GET["page"]) {
            case"users":
                include "./functions/users/index.php";
                break;
            default:
                include"./functions/users/login_form.php";
        }
    }
	else {
        switch ($_GET["page"]){
            case"users":
                include "./functions/users/index.php";
                break;
            case"posts":
                include "./functions/posts/index.php";
                break;
            case"profile":
                include "./functions/profil/index.php";
                break;
            case"search": //suche
                include "./functions/posts/search_do.php";
                break;
            default:
                include"./functions/posts/view.php";
        }
    }
    ?>
</div>
</body>
</html>