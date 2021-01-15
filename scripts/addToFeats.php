<?php

include("connect.php");

if(isset($_POST['submit'])) {
    $characterId = $_SESSION["characterId"];
    $featId = $_POST["featId"];
	$sql = "INSERT INTO character_feats (character_id , feat_id) VALUES (?,?)";
	$pdo->prepare($sql)->execute([$characterId, $featId]);
} else {
	echo "Submit not set???";
}



?>