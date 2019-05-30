<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $id=$_POST['id'];
  $evilHandle=$_POST['evilHandle'];
  
  $update1 = $db->query("UPDATE evil SET evilHandle = :evilHandle  WHERE id = :id", array("evilHandle"=>$evilHandle,"id"=>$id));
  
  $obj->state='sucess';
  $obj->evilHandle=$evilHandle;
  
  echo json_encode($obj);

?>