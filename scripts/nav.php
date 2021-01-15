<?php
include("connect.php");
?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="spell.php">spells</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feats.php">feats</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="powers.php">powers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="equipment.php">equipment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="item.php">items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="monsters.php">monsters</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="character.php">character info</a>
      </li>
		</ul>

		<ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if (isset($_SESSION["characterName"])) { echo $_SESSION["characterName"]; } else { echo "Select Character"; } ?>
				</a>
       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="char_create.php">character Create</a>
					<?php
    			$sql = $pdo->prepare("SELECT uc.id, uc.name FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id WHERE u.id = ?");
    			$sql -> execute([$_SESSION["userId"]]);
					$characters = $sql->fetchAll();
					foreach($characters as $character) {
						?>
						<a href="scripts/char_select.php?id=<?= $character["id"] ?>" class="dropdown-item"><?= $character["name"] ?></a>
						<?php
					}
			  	?>
        </div>
      </li>

			<?php if(!isset($_SESSION["userId"])) { ?>
				<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			<?php } else { ?>
				<li class="nav-item"><a href="scripts/logout.php" class="nav-link">Logout,<?= $_SESSION["userName"] ?></a></li>
			<?php } ?>
		</ul>
  </div>
</nav>
