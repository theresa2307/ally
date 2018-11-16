<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>
<body>
<div class="header">
    <h1> Registration</h1>
</div>
<h1>Home</h1>
<div><h4>Welcome<?php echo $_SESSION ['username']; ?></h4></div>
</body>
</html>