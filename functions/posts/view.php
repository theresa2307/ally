<?php
include('database.php');
$pdo= new PDO($host, $user, $password);
$follower_array = array();
$query_follow = $pdo->prepare("SELECT * FROM follower WHERE username= :username");
$query_follow->execute(array('username' => $logged_user));
while ($follower_dump = $query_follow->fetch(PDO::FETCH_ASSOC)
) {
	array_push($follower_array, $follower_dump['follows']);
}

$follower_array2 = join("','",$follower_array);
$query = $pdo->prepare ("SELECT * FROM posts WHERE username IN ('$follower_array2') OR username= :username ORDER BY datum DESC");
$query->execute(array('username' => $logged_user));
$query2 = $pdo->prepare ("SELECT * FROM profiles WHERE username IN ('$follower_array2') OR username= :username");
$query2->execute(array('username' => $logged_user));
$zeile2=$query2->fetchObject();

while ($zeile=$query->fetchObject()){
    echo "<span><b>$zeile->titel</b> (by <a href='?page=profile&user=$zeile->username'>$zeile->username</a>)</span><br>";
	if ($zeile2->username == $zeile->username and (strlen($zeile2->datei)>1)) {
		echo "<a href='?page=profile&user=$zeile->username'><img style='width:50px;' src='./functions/profil/uploads/files/$zeile2->datei'/></a>";
	}
	if (strlen($zeile->datei)>1) {
		echo "<img src='./functions/posts/uploads/files/$zeile->datei'/><br>";
	}
    echo "<span>$zeile->text</span><br><br>";
}