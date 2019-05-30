<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $id=$_POST['id'];
  $evilCode=$_POST['evilCode'];
  
  $update1 = $db->query("UPDATE evil SET evilCode = :evilCode  WHERE id = :id", array("evilCode"=>$evilCode,"id"=>$id));
  
  $obj->state='sucess';
  $obj->evilCode=$evilCode;
  
  echo json_encode($obj);

?>