<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();


  $id=$_POST['id'];
  $weixinName=$_POST['weixinName'];
  $name=$_POST['name'];
  $nickName=$_POST['nickName'];
  $jieseTime=$_POST['jieseTime'];
  $luruTime=$_POST['luruTime'];
  $endTime=$_POST['endTime'];
  $leftTime=$_POST['leftTime'];
  $state=$_POST['state'];
  $pojiecishu=$_POST['pojiecishu'];
  $pojieTime=$_POST['pojieTime'];
  $pojieshengyuTime=$_POST['pojieshengyuTime'];


  $update1 = $db->query("UPDATE bang SET weixinName = :weixinName  WHERE id = :id", array("weixinName"=>$weixinName,"id"=>$id));
  $update2 = $db->query("UPDATE bang SET name = :name  WHERE id = :id", array("name"=>$name,"id"=>$id));      
  $update3 = $db->query("UPDATE bang SET nickName = :nickName  WHERE id = :id", array("nickName"=>$nickName,"id"=>$id)); 
  $update4 = $db->query("UPDATE bang SET jieseTime = :jieseTime  WHERE id = :id", array("jieseTime"=>$jieseTime,"id"=>$id)); 
  $update5 = $db->query("UPDATE bang SET luruTime = :luruTime  WHERE id = :id", array("luruTime"=>$luruTime,"id"=>$id)); 
  $update6 = $db->query("UPDATE bang SET leftTime = :leftTime  WHERE id = :id", array("leftTime"=>$leftTime,"id"=>$id)); 
  $update7 = $db->query("UPDATE bang SET state = :state  WHERE id = :id", array("state"=>$state,"id"=>$id));         
  $update8 = $db->query("UPDATE bang SET endTime = :endTime  WHERE id = :id", array("endTime"=>$endTime,"id"=>$id));  
  $update9 = $db->query("UPDATE bang SET pojiecishu = :pojiecishu  WHERE id = :id", array("pojiecishu"=>$pojiecishu,"id"=>$id));  
  $update10 = $db->query("UPDATE bang SET pojieTime = :pojieTime  WHERE id = :id", array("pojieTime"=>$pojieTime,"id"=>$id));  
  $update11 = $db->query("UPDATE bang SET pojieshengyuTime = :pojieshengyuTime  WHERE id = :id", array("pojieshengyuTime"=>$pojieshengyuTime,"id"=>$id));    

    //echo "$luruTime <br>";
    //echo "$jieseTime <br>";
  echo 'sucess';

?>