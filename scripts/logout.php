<?php

include("session.php");

unset($_SESSION["userId"]);
unset($_SESSION["userName"]);
unset($_SESSION["characterId"]);
unset($_SESSION["characterName"]);

header("Location: ../index.php");

?>
