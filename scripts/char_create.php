<?php

include("connect.php");
include("session.php");
$status = "no character created!";
if(isset($_POST['submit'])) {
    $charName = $_POST["charName"];  

    if(isset($charName) && $charName != ""){
        $sql = $pdo->prepare("INSERT INTO user_characters (name , users_id) VALUES (?,?)");
        $sql->execute([$charName, $_SESSION["userId"]]);
        $charId = $pdo->lastInsertId();
        $sql = $pdo->prepare("SELECT * FROM user_characters WHERE id = ?");
        $sql->execute([$charId]);
        $user = $sql->fetch();
        $charId = $user["id"];
        $charName = $user["name"];
        $status ="character Created!";   
    } 
}
else {
	echo "Submit not set???";
}

?>
