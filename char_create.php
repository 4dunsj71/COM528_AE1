<!DOCTYPE html>
<html lang="en">
  <head>
<?php 
  require("scripts/session.php");
  include("scripts/char_create.php");
	require("scripts/header.php");
?>
  </head>
  <body>
    <?require("scripts/nav.php");?>
<main role="main" class="container">

  <div class="starter-template">
    <br><br><br><br><br><h1 class ="display-4">This Webpage serves as a somewhat shoddy compendium of all things 3.5e</h1><br><br><br>
    <p class="lead">Create a Character!</p>
    <!-- action="scripts/[query script for spell search]" method="POST" || add this to the form div below, when query script is complete-->
    <form action="char_create.php" method="POST">
        </div>    
        <div class="form-group">
            Character Name: <input type="text" name="charName" class = "form-control"><br>
        </div>
        <input type="submit" name="submit">
    </form>
    <?php echo $_SESSION["userId"]?>

     <p class ="lead"> <?php echo $status ?></p>
<div class ="overflow-auto">
	<table class="table table-striped table-dark table-bordered">
		
	</table>	

</div>
</main><!-- /.container -->
<?php require("scripts/footer.php");?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
