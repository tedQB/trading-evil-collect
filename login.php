<?php 
@session_start();  
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo 'ע����¼�ɹ�������˴� <a href="login.html">��¼</a>';
    exit;
}
  
  require_once("easyCRUD/easyCRUD.class.php");
  require_once("Db.class.php");
  $db = new Db();

  
//��ȡ�û����� 
$username = $_POST['username']; 
$passcode = $_POST['passcode']; 
$cookie = $_POST['cookie']; 
$_SESSION['username'] = $username;

$query = $db->query("select username, userflag from users " 
."where username = '$username' and passcode = '$passcode'");


//�ж��û��Ƿ���ڣ������Ƿ���ȷ 
  foreach ($query as $key => $rs) { 
	

	if($rs['userflag'] == 1 or $rs['userflag'] == 0) //�ж��û�Ȩ����Ϣ�Ƿ���Ч 
	{ 
	
	
		switch($cookie) //�����û���ѡ������cookie����ʱ�� 
		{ 
			case 0: //����CookieΪ��������� 
			setcookie("username", $rs['username']); 
			break; 
			case 1: //����1�� 
			setcookie("username", $rs['username'], time()+24*60*60); 
			break; 
			case 2: //����30�� 
			setcookie("username", $rs['username'], time()+30*24*60*60); 
			break; 
			case 3: //����365�� 
			setcookie("username", $rs['username'], time()+365*24*60*60); 
			break; 
		} 

		header("location: main.php"); //�Զ���ת��main.php 
	}  
	

  }

echo "�û������������"; 
?>

<!--
	if($rs['userflag'] == 1 or $rs['userflag'] == 0){
 

		if($rs['userflag'] == 1) 
			echo "��ӭ����Ա".$_SESSION['username']."��¼ϵͳ"; 
		if($rs['userflag'] == 0) 
			echo "��ӭ�û�".$_SESSION['username']."��¼ϵͳ"; 
			
		echo "<a href='logout.php' href='logout.php'>ע��</a>"; 
			
	}
	else 
	{ 
		echo "��û��Ȩ�޷��ʱ�ҳ��"; 
	}  
	-->