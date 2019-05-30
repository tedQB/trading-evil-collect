<?php 
@session_start();  
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}
  
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();

  
//获取用户输入 
$username = $_POST['username']; 
$passcode = $_POST['passcode']; 
$cookie = $_POST['cookie']; 
$_SESSION['username'] = $username;

$query = $db->query("select username, userflag from users " 
."where username = '$username' and passcode = '$passcode'");


//判断用户是否存在，密码是否正确 
  foreach ($query as $key => $rs) { 
	

	if($rs['userflag'] == 1 or $rs['userflag'] == 0) //判断用户权限信息是否有效 
	{ 
	
	
		switch($cookie) //根据用户的选择设置cookie保存时间 
		{ 
			case 0: //保存Cookie为浏览器进程 
			setcookie("username", $rs['username']); 
			break; 
			case 1: //保存1天 
			setcookie("username", $rs['username'], time()+24*60*60); 
			break; 
			case 2: //保存30天 
			setcookie("username", $rs['username'], time()+30*24*60*60); 
			break; 
			case 3: //保存365天 
			setcookie("username", $rs['username'], time()+365*24*60*60); 
			break; 
		} 

		header("location: main.php"); //自动跳转到main.php 
	}  
	

  }

echo "用户名或密码错误"; 
?>

<!--
	if($rs['userflag'] == 1 or $rs['userflag'] == 0){
 

		if($rs['userflag'] == 1) 
			echo "欢迎管理员".$_SESSION['username']."登录系统"; 
		if($rs['userflag'] == 0) 
			echo "欢迎用户".$_SESSION['username']."登录系统"; 
			
		echo "<a href='logout.php' href='logout.php'>注销</a>"; 
			
	}
	else 
	{ 
		echo "您没有权限访问本页面"; 
	}  
	-->