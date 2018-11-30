<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="header">
    <h1>Registration and Login</h1>
</div>

<?php
    if (isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>div>";
        unset($_SESSION['message']);
    }
// php muss in login und registration rein
    ?>

<h1>Home</h1>h1>
<div><h4>Welcome <?php echo $_SESSION['username']; ?></h4>h4></div>div>
<div><a href="logout.php">Logout</a>a></div>div>
</body>body>
</html>

