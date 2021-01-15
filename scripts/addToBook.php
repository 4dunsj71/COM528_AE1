<?php

include("connect.php");

if(isset($_POST['submit'])) {
    $characterId = $_SESSION["characterId"];
    $spellId = $_POST["spellId"];
	$sql = "INSERT INTO character_spells (character_id , spell_id) VALUES (?,?)";
	$pdo->prepare($sql)->execute([$characterId, $spellId]);
} else {
	echo "Submit not set???";
}

?>



