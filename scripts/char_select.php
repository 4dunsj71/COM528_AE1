<?php
    include("connect.php");
    include("session.php");

    $sql = $pdo->prepare("SELECT uc.id, uc.name FROM dnd35.user_characters uc WHERE uc.id = ?");
    $sql -> execute([$_GET["id"]]);
		$character = $sql->fetch();

		$_SESSION["characterId"] = $character["id"];
		$_SESSION["characterName"] = $character["name"];

		Header("Location: ../index.php");

?>
