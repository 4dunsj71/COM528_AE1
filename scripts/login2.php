<?php

require("connect.php");
$status = "";

if(isset($_POST['submit'])) {
	
	$userName = $_POST["userName"];
    if(isset($userName) && $userName != ""){
        $sql = $pdo->prepare("SELECT * FROM users WHERE user_name= ?");
        $sql ->execute([$userName]);
				$user = $sql->fetch();
				if ($user) {
                    $userId = $user['id'];
                    $status = "successfully logged in!";
				} else {
      		        $sql = $pdo->prepare("INSERT INTO users (user_name) VALUES(?)");
        	        $sql ->execute([$userName]);
        	        $userId = $pdo->lastInsertId();
                    $status = "Successfully Created User!";
				}
    }
  	$_SESSION["userId"] = $userId;
    $_SESSION["userName"] = $userName;

    Header("Location: index.php");
} else {
	echo "User could not be found or created, please Choose a unique user name";
}

?>
