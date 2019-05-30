<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $id=$_POST['id'];
  $evilDetail=$_POST['evilDetail'];
  
  $update1 = $db->query("UPDATE evil SET evilDetail = :evilDetail  WHERE id = :id", array("evilDetail"=>$evilDetail,"id"=>$id));
  
  $obj->state='sucess';
  $obj->evilDetail=$evilDetail;
  
  echo json_encode($obj);

?>