<?php

  header("Access-Control-Allow-Origin:*");
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();
  $obj=(object)null;	
  
  $weixinName=$_POST['id'];
  $one=$_POST['one'];
  $two=$_POST['two'];
  $three=$_POST['three'];
  $four=$_POST['four'];
  $five=$_POST['five'];  
  $six=$_POST['six'];
  $theve=$_POST['theve'];
  $eight=$_POST['eight'];
  $time=$_POST['time'];
  $date = $_POST['date'];
  

  		
  	  $exist = $db->row("SELECT id FROM huibao where weixinName=:weixinName and subDate=:subDate order by id desc",array("weixinName"=>$weixinName,"subDate"=>$date));
  	  //$person = $db->row("SELECT * FROM bang WHERE id=:id",array("id"=>$id));
  	  //$db->query("UPDATE bang SET endTime = :endTime  WHERE id = :id", array("endTime"=>$endTime,"id"=>$id));  
  	  echo $time;
  	  if($time>5){
	  	echo 'fail';
  	  }
  	  else{
	  	  if(!$exist){
	//var_dump($eight); 
	//echo "1xxxxxxxxxxxx";
			  $insert = $db->query('INSERT INTO
			  huibao(weixinName,cont1,score1,cont2,score2,cont3,score3,cont4,score4,cont5,score5,cont6,score6,cont7,score7,cont8,score8,sum,subDate) VALUES(:weixinName,:cont1,:score1,:cont2,:score2,:cont3,:score3,:cont4,:score4,:cont5,:score5,:cont6,:score6,:cont7,:score7,:cont8,:score8,:sum,:subDate)', array(
			      'weixinName'=>$weixinName,
			      'cont1'=>$one['cont'],
			      'score1'=>$one['score'],
				  'cont2'=>$two['cont'],
			      'score2'=>$two['score'],
			      'cont3'=>$three['cont'],
			      'score3'=>$three['score'],
				  'cont4'=>$four['cont'],
			      'score4'=>$four['score'],
				  'cont5'=>$five['cont'],
			      'score5'=>$five['score'],
				  'cont6'=>$six['cont'],
			      'score6'=>$six['score'],
				  'cont7'=>$theve['cont'],
			      'score7'=>$theve['score'],      
			      'cont8' =>$eight['cont'],
			      'score8'=>$eight['score'],
				  'sum'=>$one['score']+$two['score']+$three['score']+$four['score']+$five['score']+$six['score']+$theve['score']+$eight['score'],
				  'subDate'=> $date    	        
				
			      ));
		  	  echo 'sucess';
	  
	  	}
  		if(count($exist)){ 
//var_dump($eight); 
//echo "2xxxxxxxxxxxxx";
  			 //$update4 = $db->query("UPDATE bang SET groups = :groups WHERE id = :id", array("groups"=>$groups,"id"=>$rs['id']));	

  			 $update1 = $db->query("UPDATE huibao SET cont1=:cont1, score1=:score1, cont2=:cont2, score2=:score2, cont3=:cont3, score3=:score3, cont4=:cont4, score4=:score4, cont5=:cont5, score5=:score5, cont6=:cont6, score6=:score6,cont7=:cont7, score7=:score7, cont8=:cont8, score8=:score8, sum=:sum   
  			 	WHERE id = :id", 
  			 	array(
	 			  'cont1'=>$one['cont'],
			      'score1'=>$one['score'],
				  'cont2'=>$two['cont'],
			      'score2'=>$two['score'],
			      'cont3'=>$three['cont'],
			      'score3'=>$three['score'],
				  'cont4'=>$four['cont'],
			      'score4'=>$four['score'],
				  'cont5'=>$five['cont'],
			      'score5'=>$five['score'],
				  'cont6'=>$six['cont'],
			      'score6'=>$six['score'],
				  'cont7'=>$theve['cont'],
			      'score7'=>$theve['score'],      
			      'cont8'=>$eight['cont'],
			      'score8'=>$eight['score'],
				  'sum'=>$one['score']+$two['score']+$three['score']+$four['score']+$five['score']+$six['score']+$theve['score']+$eight['score'],   	        
  			 	  'id'=>$exist['id']

  			 	));
  			 echo "update";
  		}
  	}


?>