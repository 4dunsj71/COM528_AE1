<?php

include("connect.php");

if(isset($_POST['submit'])) {
    $characterId = $_SESSION["characterId"];
    $spellId = $_POST["equipmentId"];
	$sql = "INSERT INTO character_equipment (character_id , equipment_id) VALUES (?,?)";
	$pdo->prepare($sql)->execute([$characterId, $spellId]);
	$user_id = $pdo->lastInsertId();
} else {
	echo "Submit not set???";
}



?>



