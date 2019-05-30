<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();

  $id=$_POST['id'];

  $delete = $db->query("DELETE FROM evil WHERE Id = :id", array("id"=>$id));
  echo 'sucess';

?>