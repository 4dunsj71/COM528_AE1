<?php

include("connect.php");

if(isset($_POST['submit'])) {
    $characterId = $_SESSION["characterId"];
    $spellId = $_POST["itemId"];
	$sql = "INSERT INTO character_inventory (character_id , item_id) VALUES (?,?)";
	$pdo->prepare($sql)->execute([$characterId, $spellId]);
	$user_id = $pdo->lastInsertId();
} else {
	echo "Submit not set???";
}



?>



