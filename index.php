<!DOCTYPE html>
<html lang="en">
	<head>
    <?php 
      require("scripts/header.php");
      require("scripts/session.php");
    ?>
    <title>Starter Template · Bootstrap</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
<?php require("scripts/nav.php"); ?>

<main role="main" class="container">

	<?php include("scripts/nav.php"); ?>
  <div class="starter-template">

    <br><br><br><br><br><h1 class ="display-4">This Webpage serves as a somewhat shoddy compendium of all things 3.5e</h1><br><br><br>
    <p class="lead">ALL BROKEN ALL BAD ALL THE TIME, LEAVE WHILE YOU CAN</p>

</main>
<?php include("scripts/footer.php"); ?>
</html>

