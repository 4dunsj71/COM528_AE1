<?php
  $status="";
  include("connect.php");
  if(isset($_SESSION["characterId"]) && $_SESSION["characterId"] != ""){
      //query to pull all feats for character with given ID
      $char_feats = $pdo->prepare("SELECT cf.feat_id, f.name, f.full_text FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id INNER JOIN dnd35.character_feats cf ON cf.character_id = uc.id INNER JOIN dnd35.feat f ON f.id = cf.feat_id WHERE uc.id = :id ORDER BY cf.feat_id");
      $char_feats ->execute([':id' => $_SESSION["characterId"]]);
      
      //query to pull all powers for character with given ID
      $char_powers = $pdo->prepare("SELECT cp.power_id, p.name, p.full_text FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id INNER JOIN dnd35.character_powers cp ON cp.character_id = uc.id INNER JOIN dnd35.power p ON p.id = cp.power_id WHERE uc.id = :id  ORDER BY cp.power_id ");
      $char_powers ->execute([':id' => $_SESSION["characterId"]]);
      //query to pull all spells for character with given ID
      $char_spells = $pdo->prepare("SELECT cs.spell_id, s.name, s.full_text FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id INNER JOIN dnd35.character_spells cs ON cs.character_id = uc.id INNER JOIN dnd35.spell s ON s.id = cs.spell_id WHERE uc.id = :id ORDER BY cs.spell_id  ");
      $char_spells ->execute([':id' => $_SESSION["characterId"]]);
      //query to pull all items for character with given ID
      $char_items = $pdo->prepare(" SELECT ci.item_id, i.name, i.full_text FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id INNER JOIN dnd35.character_inventory ci ON ci.character_id = uc.id INNER JOIN dnd35.item i ON i.id = ci.item_id WHERE uc.id = :id ORDER BY ci.item_id");
      $char_items ->execute([':id' => $_SESSION["characterId"]]);
      //query to pull all equipment for character with given ID
      $char_equip = $pdo->prepare("SELECT ce.equipment_id, e.name, e.full_text FROM dnd35.user_characters uc INNER JOIN dnd35.users u ON u.id = uc.users_id INNER JOIN dnd35.character_equipment ce ON ce.character_id = uc.id INNER JOIN dnd35.equipment e ON e.id = ce.equipment_id WHERE uc.id = :id ORDER BY ce.equipment_id ");
      $char_equip ->execute([':id' => $_SESSION["characterId"]]);

      
  }
  else{
      $status = "please select/create a character";
  }

if($_POST['submitFeat']){
    //query to drop a feat from a table
    //$drop_feat = $pdo->prepare("SELECT * FROM dnd35.character_spells WHERE character_id = (?) AND spell_id = (?)");
    $drop_feat = $pdo->prepare("DELETE FROM dnd35.character_feats WHERE character_id = :id AND feat_id = :rId ");
    $drop_feat->bindParam(':id',$_SESSION['characterId'],PDO::PARAM_STR);
    $drop_feat->bindParam(':rId',$_POST['featId'],PDO::PARAM_STR);
    $drop_feat ->execute();
    $status ="Feat dropped";
    header("Location: character.php");
}
if($_POST['submitPower']){
  //query to drop a feat from a table
  //$drop_feat = $pdo->prepare("SELECT * FROM dnd35.character_spells WHERE character_id = (?) AND spell_id = (?)");
  $drop_power = $pdo->prepare("DELETE FROM dnd35.character_powers WHERE character_id = :id AND power_id = :rId ");
  $drop_power->bindParam(':id',$_SESSION['characterId'],PDO::PARAM_STR);
  $drop_power->bindParam(':rId',$_POST['powerId'],PDO::PARAM_STR);
  $drop_power ->execute();
  $status ="power dropped";
  header("Location: character.php");
}

if($_POST['submitSpell']){
  //query to drop a feat from a table
  //$drop_feat = $pdo->prepare("SELECT * FROM dnd35.character_spells WHERE character_id = (?) AND spell_id = (?)");
  $drop_feat = $pdo->prepare("DELETE FROM dnd35.character_spells WHERE character_id = :id AND spell_id = :rId ");
  $drop_feat->bindParam(':id',$_SESSION['characterId'],PDO::PARAM_STR);
  $drop_feat->bindParam(':rId',$_POST['spellId'],PDO::PARAM_STR);
  $drop_feat ->execute();
  $status ="spell dropped";
  header("Location: character.php");
}

if($_POST['submitItem']){
  //query to drop a feat from a table
  //$drop_feat = $pdo->prepare("SELECT * FROM dnd35.character_spells WHERE character_id = (?) AND spell_id = (?)");
  $drop_feat = $pdo->prepare("DELETE FROM dnd35.character_inventory WHERE character_id = :id AND item_id = :rId ");
  $drop_feat->bindParam(':id',$_SESSION['characterId'],PDO::PARAM_STR);
  $drop_feat->bindParam(':rId',$_POST['itemId'],PDO::PARAM_STR);
  $drop_feat ->execute();
  $status ="item dropped";
  header("Location: character.php");
}

if($_POST['submitEquip']){
  //query to drop a feat from a table
  //$drop_feat = $pdo->prepare("SELECT * FROM dnd35.character_spells WHERE character_id = (?) AND spell_id = (?)");
  $drop_feat = $pdo->prepare("DELETE FROM dnd35.character_equipment WHERE character_id = :id AND equipment_id = :rId ");
  $drop_feat->bindParam(':id',$_SESSION['characterId'],PDO::PARAM_STR);
  $drop_feat->bindParam(':rId',$_POST['equipId'],PDO::PARAM_STR);
  $drop_feat ->execute();
  $status ="equipment dropped";
  header("Location: character.php");
}

?>
