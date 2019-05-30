<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $id=$_POST['id'];
  $evilName=$_POST['evilName'];
  
  $update1 = $db->query("UPDATE evil SET evilName = :evilName  WHERE id = :id", array("evilName"=>$evilName,"id"=>$id));
  
  $obj->state='sucess';
  $obj->evilName=$evilName;
  
  echo json_encode($obj);

?>