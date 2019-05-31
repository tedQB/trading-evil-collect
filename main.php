<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php 

@session_start(); 


if(isset($_COOKIE['username'])) 
{ 

require_once("easyCRUD/easyCRUD.class.php");
require_once("Db.class.php");
$db = new Db();	


//获取Session 
$username = $_COOKIE['username']; 
	
$query = $db->query("select userflag from users " 
."where username = '$username'");

echo $_SESSION['username']; 

  foreach ($query as $key => $rs) { 

	if($rs['userflag']){
		if($rs['userflag'] == 1) 
			echo "欢迎管理员".$_SESSION['username']."登录系统"; 
		if($rs['userflag'] == 0) 
			echo "欢迎用户".$_SESSION['username']."登录系统"; 
		
		echo "<a href='mimi.php?action=logout'>注销</a><br />"; 
		echo "<a href='add.php'>添加</a><br />";
		echo "<a href='out.php'>养生榜单</a>";
		
	}else{ 
		echo "您没有权限访问本页面"; 
	}
   }

 }
?>

