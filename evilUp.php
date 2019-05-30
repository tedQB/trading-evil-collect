<?php
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();



  $evilCode=$_POST['evilCode'];
  $evilName=$_POST['evilName'];
  $luruTime=$_POST['luruTime'];
  $evilTime=$_POST['evilTime'];
  $evilType=$_POST['evilType'];
  $evilDetail=$_POST['evilDetail'];
  

  //$insert   =  $db->query("INSERT INTO Persons(Firstname,Age) VALUES(:f,:age)", array("f"=>"Vivek","age"=>"20"));
  
  $inert=$db->query('INSERT INTO
  evil(evilCode,evilName,luruTime,evilTime,evilType,evilDetail) VALUES(:evilCode,:evilName,:luruTime,:evilTime,:evilType,:evilDetail)', array(
      'evilCode'=>$evilCode,
      'evilName'=>$evilName,
      'luruTime'=>$luruTime,
      'evilTime'=>$evilTime,
      'evilType'=>$evilType,
      'evilDetail'=>$evilDetail
      )

  );



    //echo "$luruTime <br>";
    //echo "$jieseTime <br>";
  echo 'sucess';

?>