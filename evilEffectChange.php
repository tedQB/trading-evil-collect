<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $id=$_POST['id'];
  $evilEffect=$_POST['evilEffect'];
  
  $update1 = $db->query("UPDATE evil SET evilEffect = :evilEffect  WHERE id = :id", array("evilEffect"=>$evilEffect,"id"=>$id));
  
  $obj->state='sucess';
  $obj->evilEffect=$evilEffect;
  
  echo json_encode($obj);

?>