<?php
include("scripts/connect.php");
include("scripts/session.php");
include("scripts/addToInv.php");

$spells = $pdo->query('SELECT * FROM item');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("scripts/header.php"); ?>
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

  <div class="starter-template">
    
  <br><br><br><br><br><h1 class ="display-4">This Webpage serves as a somewhat shoddy compendium of all things 3.5e</h1>
    
    <script>
    $("#grid-basic").bootgrid();
    </script>
    <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped">
        <thead>
						<tr>
							<?php
							// for each column
							for ($i = 0; $i < $spells->columnCount(); $i++) {
								// get the column name
								$name = $spells->getColumnMeta($i)['name'];
								// if first column identify as ID
								if ($i == 0) {
									$identifier = ' data-identifier="true"';
								} else {
									$identifier = '';
								}
								// print the column heading
								?>
								<th data-column-id="<?= $name ?>"<?= $identifier ?>><?= $name ?></th>
								<?php
							}
							?>
            </tr>
        </thead>
				<tbody>
					<?php
					while ($row = $spells->fetch()) {
						echo "<tr>";
						for ($i = 0; $i < $spells->columnCount(); $i++) {
							$name = $spells->getColumnMeta($i)["name"];
							echo "<td>".$row[$name]."</td>";
						}
						echo "</tr>";
					}
					?>
        </tbody>
		</table>
	<?if(isset($_SESSION["characterId"])){?>
		<form action="item.php" method="POST">
		<div class="form-group">
				ItemID: <input type="text" name="itemId" class = "form-control"><br>
		</div> 
				<input type="submit" name="submit">
			</form>
			<h2>enter the ItemID and press submit to add a spell to your selected character.</h2>
	<?}else{echo("Please Select/Create a Character");}?>	


</main><!-- /.container -->
<?php include("scripts/footer.php"); ?>
<script>
	$("#grid-basic").bootgrid();
</script>
</html>

