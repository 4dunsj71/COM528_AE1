<!DOCTYPE html>

<?php
require("scripts/session.php");
require("scripts/character_details.php");

?>
<html lang="en">
  <head>
  <?php require("scripts/header.php"); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    
    <title>Starter Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

    
    
    
    <? if(isset($_SESSION["characterId"])){ ?>
    <h1 class="display-4">feats</h1>

    <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped boot-grid">
        <thead>
        <thead>
            <tr>
                <?php
                // for each column
                for ($i = 0; $i < $char_feats->columnCount(); $i++) {
                    // get the column name
                    $name = $char_feats->getColumnMeta($i)['name'];
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
            while ($row = $char_feats->fetch()) {
                echo "<tr>";
                for ($i = 0; $i < $char_feats->columnCount(); $i++) {
                    $name = $char_feats->getColumnMeta($i)["name"];
                    echo "<td>".$row[$name]."</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
		</table>
    <form action="character.php" method="POST">
            <div class="form-group">
                Remove Feat(FeatID):<input type="text" name="featId" class = "form-control"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submitFeat">
            </div>
    </form>
        <p><?echo($status)?>
        <h1 class="display-4">powers</h1>
     <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped boot-grid">
        <thead>
        <thead>
            <tr>
                <?php
                // for each column
                for ($i = 0; $i < $char_powers->columnCount(); $i++) {
                    // get the column name
                    $name = $char_powers->getColumnMeta($i)['name'];
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
            while ($row = $char_powers->fetch()) {
                echo "<tr>";
                for ($i = 0; $i < $char_powers->columnCount(); $i++) {
                    $name = $char_powers->getColumnMeta($i)["name"];
                    echo "<td>".$row[$name]."</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
		</table>
        <form action="character.php" method="POST">
            <div class="form-group">
                Remove Power(PowerID):<input type="text" name="powerId" class = "form-control"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submitPower">
            </div>
        </form>
        <p><?echo($status)?>
        <h1 class="display-4">spells</h1>
    <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped boot-grid">
        <thead>
            <tr>
                <?php
                // for each column
                for ($i = 0; $i < $char_spells->columnCount(); $i++) {
                    // get the column name
                    $name = $char_spells->getColumnMeta($i)['name'];
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
					while ($row = $char_spells->fetch()) {
						echo "<tr>";
						for ($i = 0; $i < $char_spells->columnCount(); $i++) {
							$name = $char_spells->getColumnMeta($i)["name"];
							echo "<td>".$row[$name]."</td>";
						}
						echo "</tr>";
					}
					?>
        </tbody>
		</table>
        <form action="character.php" method="POST">
            <div class="form-group">
                Remove Spell(SpellID):<input type="text" name="spellId" class = "form-control"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submitSpell">
            </div>
    </form>
        <p><?echo($status)?>
        <script>$("#grid-basic").bootgrid();</script>


        <h1 class="display-4">inventory</h1>
     <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped boot-grid">
        <thead>
        <thead>
            <tr>
                <?php
                // for each column
                for ($i = 0; $i < $char_items->columnCount(); $i++) {
                    // get the column name
                    $name = $char_items->getColumnMeta($i)['name'];
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
					while ($row = $char_items->fetch()) {
						echo "<tr>";
						for ($i = 0; $i < $char_items->columnCount(); $i++) {
							$name = $char_items->getColumnMeta($i)["name"];
							echo "<td>".$row[$name]."</td>";
						}
						echo "</tr>";
					}
					?>
        </tbody>
		</table>
        <form action="character.php" method="POST">
            <div class="form-group">
                Remove Item(itemID):<input type="text" name="itemId" class = "form-control"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submitItem">
            </div>
    </form>
        <p><?echo($status)?>

        <h1 class="display-4">equipment</h1>
     <table id="grid-basic" class="table-responsive table-condensed table-hover table-striped boot-grid">
        <thead>
        <thead>
            <tr>
                <?php
                // for each column
                for ($i = 0; $i < $char_equip->columnCount(); $i++) {
                    // get the column name
                    $name = $char_equip->getColumnMeta($i)['name'];
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
					while ($row = $char_equip->fetch()) {
						echo "<tr>";
						for ($i = 0; $i < $char_equip->columnCount(); $i++) {
							$name = $char_equip->getColumnMeta($i)["name"];
							echo "<td>".$row[$name]."</td>";
						}
						echo "</tr>";
					}
					?>
        </tbody>
		</table>
        <form action="character.php" method="POST">
            <div class="form-group">
                Remove Feat(FeatID):<input type="text" name="equipId" class = "form-control"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submitEquip">
            </div>
    </form>
        <p><?echo($status)?>
        <? }else{echo($status);} ?>
        <script>$("#grid-basic").bootgrid();</script>
</main><!-- /.container -->
<?php include("scripts/footer.php"); ?>
<script>
$(".boot-grid").bootgrid();
</script>

</html>

