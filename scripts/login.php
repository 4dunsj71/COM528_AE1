<?php

require("connect.php");
$status = "Could not find/create user!";

if(isset($_POST['submit'])) {
	
	$userName = $_POST["userName"];
	echo($userName);
	if(isset($userName) && $userName != ""){
		$sql = $pdo->prepare("SELECT * FROM users WHERE user_name= ?");
		$sql->execute($userName);
		$user = $sql->fetchAll();
		$userId = $user['id']; 
		$userName = $user['user_name'];
		$status = "successfully logged in!";
		
	}
	if(!isset($userId) && $userId == "") {
		$sql = $pdo->prepare("INSERT INTO users (user_name) VALUES (:userName)");
		$pdo->prepare($sql)->execute([":userName" => $userName]);
		$userId = $pdo->lastInsertId();
		$sql = $pdo->prepare("SELECT * FROM users WHERE user_name=:userName");
		$sql->execute([":userName" => $userName]);
		$user = $sql->fetch();
		$userId = $user["id"];
		$userName = $user["user_name"];
		$status = "Successfully Created User!";
		
	}

	$_SESSION["userId"] = $userId;
	$_SESSION["userName"] = $userName;

	//Header("Location: ../login.php");

} else {
	echo "Submit not set???";
}

?>
