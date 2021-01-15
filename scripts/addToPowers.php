<?php

include("connect.php");

if(isset($_POST['submit'])) {
    $characterId = $_SESSION["characterId"];
    $powerId = $_POST["powerId"];
	$sql = "INSERT INTO character_powers (character_id , power_id) VALUES (?,?)";
	$pdo->prepare($sql)->execute([$characterId, $powerId]);
	$user_id = $pdo->lastInsertId();
} else {
	echo "Submit not set???";
}


?>